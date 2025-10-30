<!doctype html>
<html>
<head><meta charset="utf-8"><title>Error</title></head>
<body>
  <h2>Oops — something went wrong</h2>
  <p><?php echo htmlspecialchars($_GET['e'] ?? 'Unknown error'); ?></p>
  <p><a href="contact.php">Back to contact form</a></p>
</body>
</html>
