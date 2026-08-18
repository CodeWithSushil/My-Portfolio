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
  <link rel="canonical" href="https://sushilkumar.onrender.com/">
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
  html {
  scroll-behavior:smooth;
  }
  section{
  width:100%;
  height:auto;
  min-height:calc(100vh - 60px);
  }
  .navbar{
  width:100%;
  position:fixed; 
  top:0;
  left:0;
  }
  .vcentered{
  display:flex;
  align-items:center;
  justify-content:center;
  flex-direction:column;
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
        			<span class="theme-slider">
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
        		<a class="navbar-item is-active has-text-white" href="#home">
          			<i class="fa fa-home"></i>
          			Home
          		</a>
          		<a class="navbar-item" href="#about" >
          			<i class="fa fa-user"></i>
          			About
          		</a>
          		<a class="navbar-item" href="#service" >
          			<i class="fa fa-gear"></i>
          			Services
          		</a>
          		<a class="navbar-item" href="#contact" >
          			<i class="fa fa-user-plus"></i>
          			Contact
          		</a>
          		<a class="navbar-item" href="#" >
          			<i class="fa fa-pen"></i>
          			Blog
          		</a>
          	</div>
        </div>
    </nav>
    
   <section class="banner hero is-link" id="home">
   	  <div class="vcentered container p-3">
   		<h2 class="is-size-2-desktop is-size-3-tablet is-size-4-mobile" >
   Welcome to my <br><span class="has-text-danger is-uppercase is-size-4">Portfolio</span>.
   </h2>
   <p class="my-4 is-size-6-mobile is-size-5-tablet is-size-4-desktop" >I'm Sushil Kumar <span class="has-text-warning">PHP Developer</span>.</p>
   <a class="button is-primary has-text-light" href="#contact">
   <i class="fa-solid fa-hand" ></i>
   <span>Hire me</span>
   </a>
   </div>
   </section>
    
    <section class="section" id="about">
    	<div class="container">
    		<div class="columns is-centered">
    			<div class="column">
    				<h2 class="is-size-2-desktop is-size-3-tablet is-size-5-mobile has-text-primary has-text-centered is-uppercase">
    					About
    				</h2>
    				<div class="card my-4 px-4 py-3" >
    				<p class="card-body" >
    				Hello, i'm Sushil Kumar aka <span class="has-text-primary" >Code With Sushil</span>.
    				</p>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    
    <section class="section" id="service">
    	<div class="container">
    		<div class="columns is-centered">
    			<div class="column">
    				<h2 class="is-size-2-desktop is-size-3-tablet is-size-5-mobile has-text-warning has-text-centered is-uppercase">
    					Services
   	 				</h2>
    				<div class="card mt-3">
    					<div class="card-content" >
    						<p class="content" >
    							<span class="subtitle has-text-info">
    								<span class="icon" >
    									<i class="fa-solid fa-code"></i>
    								</span>
    								<span>SEO</span>
    							</span><br>
    							We provide SEO relate service
    						</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    
    <section class="section" id="contact" >
    	<div class="container">
      		<div class="columns is-centered">
        		<div class="column is-10-tablet is-7-desktop is-6-widescreen">
        			<h2 class="is-size-2-desktop is-size-3-tablet is-size-4-mobile has-text-link has-text-centered is-uppercase has-text-weight-bold mb-6" >Contact</h2>
          			<form method="post" action="/">
          				<div class="field">
              				<p class="control has-icons-left">
                				<input class="input" type="text" placeholder="Full name" required="required">
                				<span class="icon is-small is-left" >
                					<i class="fa-solid fa-user" ></i>
                				</span>
              				</p>
            			</div>
            			
            			<div class="field">
 	          				<p class="control has-icons-left">
 								<input class="input" type="email" placeholder="Email address" required="required" />
 								<span class="icon is-small is-left">
 									<i class="fa-solid fa-envelope"></i>
 								</span>
 							</p>
 						</div>
 						
 						<div class="field">
 							<p class="control has-icons-left">
 								<input class="input" type="text" placeholder="Subject" required="required" />
 								<span class="icon is-small is-left">
 									<i class="fa-solid fa-heading"></i>
 								</span>
 							</p>
 						</div>
 						
 						<div class="field">
 							<p class="control">
 								<textarea class="textarea" type="email" placeholder="Write your message..." required="required"></textarea>
 							</p>
 						</div>
 						
 						<div class="field">
 							<p class="control">
 								<button type="submit" class="button is-link is-fullwidth">
 									<span class="icon">
 										 <i class="fa-solid fa-paper-plane"></i>
 									</span>
 									<span>
 										Submit
 									</span>
 								</button>
 							</p>
 						</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</section>
 	
 	<footer class="footer p-3">
 		<div class="content has-text-centered">
 			<p>&copy;<span id="year"></span>
 			<strong class="has-text-link" >Sushil Kumar</strong>.
 			All rights reserved.
 			</p>
 		</div>
 	</footer>
 	
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
 			burger.setAttribute("aria-expanded", active ? "true" : "false");
 		});
 		
 		const date = new Date();
 		const year = date.getFullYear();
 		document.querySelector("#year").innerHTML = year;
  </script>
</body>
</html>
