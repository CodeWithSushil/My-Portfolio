<?php
// send.php
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

// Load .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Config from env
$dbHost = $_ENV['DB_HOST'] ?? '127.0.0.1';
$dbName = $_ENV['DB_NAME'] ?? '';
$dbUser = $_ENV['DB_USER'] ?? '';
$dbPass = $_ENV['DB_PASS'] ?? '';
$dbCharset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';

$smtpHost = $_ENV['SMTP_HOST'] ?? '';
$smtpPort = (int)($_ENV['SMTP_PORT'] ?? 587);
$smtpUser = $_ENV['SMTP_USER'] ?? '';
$smtpPass = $_ENV['SMTP_PASS'] ?? '';
$smtpFrom = $_ENV['SMTP_FROM'] ?? $smtpUser;
$smtpFromName = $_ENV['SMTP_FROM_NAME'] ?? 'Website';

$uploadDir = rtrim(__DIR__ . '/' . ($_ENV['UPLOAD_DIR'] ?? 'uploads'), '/');
$maxUploadSize = (int)($_ENV['MAX_UPLOAD_SIZE'] ?? 2097152); // default 2MB
$allowedUploadTypes = explode(',', $_ENV['ALLOWED_UPLOAD_TYPES'] ?? 'application/pdf,image/jpeg,image/png');

$recapSecret = $_ENV['RECAPTCHA_SECRET_KEY'] ?? '';

// Ensure uploads dir exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Helper: send to error page
function redirectWithError(string $msg) {
    // Could log error server-side
    header('Location: error.php?e=' . urlencode($msg));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectWithError('Invalid request method.');
}

// Basic sanitization
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');
$recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

// Validate required
if ($name === '' || $email === '' || $message === '') {
    redirectWithError('Please fill required fields.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirectWithError('Invalid email address.');
}

// Validate reCAPTCHA (server-side)
if ($recapSecret) {
    $verify = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . urlencode($recapSecret) .
        "&response=" . urlencode($recaptchaResponse) .
        "&remoteip=" . urlencode($_SERVER['REMOTE_ADDR'])
    );
    $json = json_decode($verify, true);
    if (!isset($json['success']) || $json['success'] !== true) {
        redirectWithError('reCAPTCHA verification failed.');
    }
}

// Handle file upload
$attachmentStored = null;
$attachmentOriginal = null;

if (!empty($_FILES['attachment']) && $_FILES['attachment']['error'] !== UPLOAD_ERR_NO_FILE) {
    $file = $_FILES['attachment'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        redirectWithError('File upload error.');
    }
    if ($file['size'] > $maxUploadSize) {
        redirectWithError('Attachment exceeds size limit.');
    }
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    if (!in_array($mime, $allowedUploadTypes, true)) {
        redirectWithError('File type not allowed.');
    }
    // create a safe filename
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $basename = bin2hex(random_bytes(8)); // random name
    $filename = $basename . ($ext ? '.' . $ext : '');
    $targetPath = $uploadDir . '/' . $filename;
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        redirectWithError('Failed to save attachment.');
    }
    // Prevent execution: create .htaccess in uploads (see additional security below)
    $attachmentStored = $filename;
    $attachmentOriginal = basename($file['name']);
}

// Insert into DB
$dsn = "mysql:host={$dbHost};dbname={$dbName};charset={$dbCharset}";
try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    redirectWithError('Database connection failed.');
}

$sql = "INSERT INTO contact_messages 
    (name, email, phone, subject, message, ip, user_agent, attachment, attachment_original)
    VALUES (:name, :email, :phone, :subject, :message, :ip, :ua, :attachment, :attachment_original)";

$stmt = $pdo->prepare($sql);
try {
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone ?: null,
        ':subject' => $subject ?: null,
        ':message' => $message,
        ':ip' => $_SERVER['REMOTE_ADDR'] ?? null,
        ':ua' => $_SERVER['HTTP_USER_AGENT'] ?? null,
        ':attachment' => $attachmentStored,
        ':attachment_original' => $attachmentOriginal,
    ]);
} catch (PDOException $e) {
    // optionally unlink uploaded file on error
    if ($attachmentStored && file_exists($uploadDir . '/' . $attachmentStored)) {
        @unlink($uploadDir . '/' . $attachmentStored);
    }
    redirectWithError('Failed to save message.');
}

// Send email with PHPMailer
try {
    $mail = new PHPMailer(true);
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUser;
    $mail->Password = $smtpPass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $smtpPort;

    // Email headers
    $mail->setFrom($smtpFrom, $smtpFromName);
    $mail->addAddress($smtpFrom, $smtpFromName); // send to site owner (same as SMTP_FROM)
    $mail->addReplyTo($email, $name);

    if ($attachmentStored) {
        $mail->addAttachment($uploadDir . '/' . $attachmentStored, $attachmentOriginal ?? $attachmentStored);
    }

    $mail->isHTML(true);
    $mail->Subject = "Contact form: " . ($subject ?: 'New message from website');
    $body = "<h3>New message from contact form</h3>";
    $body .= "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
    $body .= "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
    if ($phone) $body .= "<p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>";
    if ($subject) $body .= "<p><strong>Subject:</strong> " . htmlspecialchars($subject) . "</p>";
    $body .= "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>";
    $body .= "<p><small>IP: " . ($_SERVER['REMOTE_ADDR'] ?? '') . "</small></p>";
    $mail->Body = $body;

    $mail->send();
} catch (Exception $e) {
    // If email fails, we still keep DB record. Optionally log $mail->ErrorInfo
    redirectWithError('Message saved but failed to send email: ' . $mail->ErrorInfo);
}

// Redirect to success page
header('Location: success.php');
exit;
