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
  <link rel="icon" type="image/png"  href="favicon.ico" />
  <title>Sushil Kumar | Portfolio</title>  
  <!-- Bulma CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/1.0.4/css/bulma.min.css"/>  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"/>
  
  
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  
  <!-- Primary Meta Tags -->
  <meta name="description" content="Sushil Kumar aka Code With Sushil is a PHP Developer.">
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
  
  <style type="text/css">
  :root,
  [data-theme="light"] {
  --bg: #ffffff;
  --text: #171717;
  }
  
  [data-theme="dark"] {
  --bg: #111827;
  --text: #f9fafb;
  }
  
  body {
  background: var(--bg);
  color: var(--text);
  font-family: 'Inter', sans-serif;
  }
  
  .navbar-mobile-controls {
  display: flex;
  align-items: center;
  margin-left: auto;
  }
  
  /* Theme switch */
  .theme-switch {
  position: relative;
  display: inline-flex;
  align-items: center;
  width: 52px;
  height: 30px;
  margin-right: 0.5rem;
  cursor: pointer;
  }
  
  .theme-switch input {
  position: absolute;
  opacity: 0;
  pointer-events: none;
  }
  
  .theme-slider {
  position: relative;
  width: 100%;
  height: 100%;
  border-radius: 999px;
  background: #e5e7eb;
  transition: background 0.25s ease;
  }
  
  .theme-slider::before {
  content: "";
  position: absolute;
  width: 24px;
  height: 24px;
  top: 3px;
  left: 3px;
  border-radius: 50%;
  background: #fff;
  box-shadow: 0 2px 6px rgb(0 0 0 / 20%);
  transition: transform 0.25s ease;
  }
  
  .theme-icon {
  position: absolute;
  right: 5px;
  top: 6px;
  font-size: 14px;
  line-height: 22px;
  }
  
  /* Checked = dark */
  .theme-switch input:checked + .theme-slider {
  background: #374151;
  }
  
  .theme-switch input:checked + .theme-slider::before {
  transform: translateX(22px);
  }
  
  .theme-switch input:checked + .theme-slider .theme-icon {
  left: 5px;
  right: auto;
  }
  
  /* Keep hamburger beside switch */
  .navbar-burger {
  margin-left: 0 !important;
  }
  .banner{
  width:100%;
  height:100vh;
  background-image: url("https://picsum.photos/1980/1980");
  background-attachment:fixed;
  background-repeat:no-repeat;
  background-position:0 0;
  background-size:cover;
  padding:4rem 1rem;
  }
  </style>
</head>
<body class="is-family-primary" >
  <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item is-size-5 has-text-weight-bold is-uppercase has-text-link" href="#">
        <i class="fa fa-laptop-code"></i>
        Sushil Kumar    
      </a>
      
    <div class="navbar-mobile-controls" >
      <label class="theme-switch" aria-label="Toggle dark mode">
        <input type="checkbox" id="themeToggle">
        <span class="theme-slider" >
          <span class="theme-icon">
          <i class="fa-solid fa-sun" ></i>
          </span>
        </span>
      </label>
      
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  </div>
    
    <div id="navbarBasicExample" class="navbar-menu">      
      <div class="navbar-end">
        <a class="navbar-item is-active has-text-white" href="#">
          <i class="fa fa-home"></i>
          Home
        </a>        
        <a class="navbar-item">
          <i class="fa fa-user"></i>
          About
        </a>
        <a class="navbar-item">
        <i class="fa fa-gear"></i>
        Services
        </a>
        <a class="navbar-item">
        <i class="fa fa-user-plus"></i>
        Contact
        </a>
        <a class="navbar-item">
        <i class="fa fa-pen"></i>
        Blog
        </a>
      </div>
   </div>       
  </nav>
  
  <section class="banner hero is-link">
    <div class="container p-3">
      <h2 class="is-size-5-mobile is-size-3-desktop" >
      Welcome to my Portfolio website.
      </h2>
    </div>
  </section>
   
  <script>
  const themeToggle = document.getElementById("themeToggle");
  const html = document.documentElement;
  
  const savedTheme = localStorage.getItem("theme");
  
  if (savedTheme === "dark") {
  html.setAttribute("data-theme", "dark");
  themeToggle.checked = true;
  } else {
  html.setAttribute("data-theme", "light");
  }
  
  themeToggle.addEventListener("change", () => {
  const theme = themeToggle.checked ? "dark" : "light";
  
  html.setAttribute("data-theme", theme);
  localStorage.setItem("theme", theme);
  });
  
  const burger = document.querySelector(".navbar-burger");
  const menu = document.getElementById(burger.dataset.target);
  
  burger.addEventListener("click", () => {
  const active = burger.classList.toggle("is-active");
  
  menu.classList.toggle("is-active");
  
  burger.setAttribute(
  "aria-expanded",
  active ? "true" : "false"
  );
  });
  </script>
</body>
</html>
