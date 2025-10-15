<?php
$db = new PDO('sqlite:database/portfolio.sqlite');
$articles = $db->query('SELECT * FROM articles ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Portfolio</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <header>
    <h1>Welcome to My Portfolio</h1>
    <nav>
      <a href="/">Home</a>
      <a href="/about.php">About</a>
      <a href="/articles.php">Articles</a>
      <a href="/contact.php">Contact</a>
    </nav>
  </header>
  <main>
    <h2>Latest Articles</h2>
    <ul>
      <?php foreach($articles as $a): ?>
        <li><strong><?= htmlspecialchars($a['title']) ?></strong> — <?= htmlspecialchars($a['created_at']) ?></li>
      <?php endforeach; ?>
    </ul>
  </main>
</body>
</html>
