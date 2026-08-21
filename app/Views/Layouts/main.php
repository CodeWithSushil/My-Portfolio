<!doctype html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#FF2D20">
  <meta http-equiv="X-Content-Type-Options" content="nosniff">
  <meta http-equiv="Permissions-Policy" content="interest-cohort=()">
  <meta name="robots" content="index, follow" />
  <link rel="icon" type="image/png" sizes="16x16"  href="favicon.ico" />
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="48x48" href="/assets/images/favicon-48x48.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="192x192" href="/assets/images/android-chrome-192x192.png" />
  <link rel="icon" type="image/png" sizes="512x512" href="/assets/images/android-chrome-512x512.png" />
  <link rel="manifest" href="/site.webmanifest" />
  <meta name="description" content="<?= esc($description ?? "Sushil Kumar is full stack PHP and Laravel developer")?>">
  <title> <?= esc($title ?? 'Sushil Kumar | Full Stack PHP Developer');?></title>
  <!-- Bulma CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/1.0.4/css/bulma.min.css"/>  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"/>
  
  
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  
  <!-- Primary Meta Tags -->
  <meta name="author" content="Sushil Kumar">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="profile">
  <meta property="og:url" content="https://sushilkumar.onrender.com/">
  <meta property="og:title" content="Sushil Kumar | Portfolio">
  <meta property="og:description" content="Sushil Kumar aka Code With Sushil is a PHP Developer.">
  <meta property="og:image" content="https://sushilkumar.onrender.com/og/master.png">
  <meta property="og:image:secure_url" content="https://sushilkumar.onrender.com/og/master.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="Sushil Kumar, PHP Developer">
  <meta property="og:site_name" content="Sushil Kumar">
  <meta property="og:locale" content="en_US">
  <meta property="profile:first_name" content="Sushil">
  <meta property="profile:last_name" content="Kumar">
  
  <!-- Twitter / X -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@CodeSushil">
  <meta name="twitter:creator" content="@CodeSushil">
  <meta name="twitter:url" content="https://sushilkumar.onrender.com/">
  <meta name="twitter:title" content="Sushil Kumar | Portfolio">
  <meta name="twitter:description" content="Sushil Kumar aka Code With Sushil is a PHP Developer.">
  <meta name="twitter:image" content="https://sushilkumar.onrender.com/og/master.png">
  <meta name="twitter:image:src" content="https://sushilkumar.onrender.com/og/master.png">
  <meta name="twitter:image:alt" content="Sushil Kumar, PHP Developer">
  <link rel="canonical" href="https://sushilkumar.onrender.com/">
  <link rel="stylesheet" href="/assets/css/app.css">
  <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
<?php require(__DIR__ ."/../Components/navbar.php"); ?>

<main>
<?php
//echo $content;

  require(__DIR__ ."/../Components/home.php");

  require(__DIR__ ."/../Components/about.php");

  require(__DIR__ ."/../Components/skills.php");
  
  require(__DIR__ ."/../Components/projects.php");
  
  require(__DIR__ ."/../Components/experience.php");
  
  require(__DIR__ ."/../Components/services.php");
  
  require(__DIR__ ."/../Components/contact.php");
?>
</main>

<?php require(__DIR__ ."/../Components/footer.php"); ?>

<noscript>Update</noscript>
<script src="/assets/js/app.js"></script>
</body>
</html>
