<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $message = $_POST['message'];

  // Store in SQLite
  // ../database/portfolio.sqlite
  $dbPath = 'database/portfolio.sqlite';
  $db = new PDO('sqlite:database.db');
  $stmt = $db->prepare('INSERT INTO messages (name, message, created_at) VALUES (?, ?, datetime("now"))');
  $stmt->execute([$name, $message]);

  // Trigger n8n webhook (optional)
 // $webhook = 'https://n8n.yourdomain.com/webhook/contact';
//  @file_get_contents($webhook . '?name=' . urlencode($name));
  
  echo "Thank you for contacting me!";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Contact</title></head>
<body>
  <h1>Contact Me</h1>
  <form method="POST">
    <input type="text" name="name" placeholder="Your name" required>
    <textarea name="message" placeholder="Your message" required></textarea>
    <button type="submit">Send</button>
  </form>
</body>
</html>
