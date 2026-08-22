<!doctype html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sushil Kumar | Full Stack PHP Developer</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="index, follow">
  <meta name="theme-color" content="#FF2D20">
  <meta http-equiv="X-Content-Type-Options" content="nosniff">
  <meta http-equiv="Permissions-Policy" content="interest-cohort=()">


  <meta name="description" content="Sushil Kumar | Full Stack PHP/Laravel Developer, Freelancer, open source contributor, content creator" />
  <meta name="author" content="Sushil Kumar">

<meta property="og:title" content="Sushil Kumar | Full Stack PHP Developer">
<meta property="og:site_name" content="Sushilkumar">
<meta property="og:url" content="https://sushilkumar.onrender.com">
<meta property="og:description" content="Sushil Kumar | Full Stack PHP/Laravel Developer, Freelancer, open source contributor, content creator ">
<meta property="og:type" content="website">
<meta property="og:image" content="https://sushilkumar.onrender/assets/images/master.webp">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Sushil Kumar | Full Stack PHP Developer">
<meta name="twitter:site" content="@sushilkumar">
<meta name="twitter:description" content="Sushil Kumar | Full Stack PHP/Laravel Developer, Freelancer, open source contributor, content creator ">
<meta name="twitter:image" content="https://sushilkumar.onrender.com/assets/images/master.webp">
<meta name="twitter:image:alt" content="Sushil Kumar, PHP Developer, Full Stack">

<!-- Structured Data -->
<script type="application/ld+json">
{
	"@context": "https://schema.org",
   	"@graph": [
   	{
    	"@type": "Person",
        "@id": "https://sushilkumar.onrender.com/#person",
        "name": "Sushil Kumar",
        "url": "https://sushilkumar.onrender.com/",
        "jobTitle": "Full Stack PHP Developer",
        "description": "Full Stack PHP developer, freelancer, open source contributor, YouTuber and educator.",
        "knowsAbout": [
        	"PHP",
            "JavaScript",
   			"SQL",
   			"REST API",
   			"Laravel",
   			"Vue.js",
   			"jQuery",
  			"Bootstrap",
   			"Bulma",
   			"SQLite",
   			"PostgreSQL",
   			"MySQL",
   			"Docker",
   			"GitHub Actions"
   		],
   		"sameAs": [
   			"https://github.com/CodeWithSushil",
   			"https://x.com/CodeSushil",
   			"https://www.youtube.com/@Code-With-Sushil",
   			"https://pinkary.com/@CodeWithSushil",
   			"https://mastodon.social/@CodeWithSushil",
   			"https://bsky.app/profile/codewithsushil.bsky.social",
   			"https://instagram.com/CodeWithSushil"
   		]
   	},
   	{
   		"@type": "WebSite",
   		"@id": "https://sushilkumar.onrender.com/#website",
   		"url": "https://sushilkumar.onrender.com/",
   		"name": "Sushil Kumar",
   		"description": "Portfolio of Sushil Kumar, Full Stack PHP Developer.",
   		"publisher": {
   			"@id": "https://sushilkumar.onrender.com/#person"
   		},
   		"inLanguage": "en-IN"
   	},
   	{
   		"@type": "WebPage",
   		"@id": "https://sushilkumar.onrender.com/#webpage",
   		"url": "https://sushilkumar.onrender.com/",
   		"name": "Sushil Kumar - Full Stack PHP Developer",
   		"description": "Portfolio website of Sushil Kumar, a Full Stack PHP developer, freelancer and open source contributor.",
   		"isPartOf": {
   			"@id": "https://sushilkumar.onrender.com/#website"
   		},
   		"about": {
   			"@id": "https://sushilkumar.onrender.com/#person"
   		},
   		"inLanguage": "en-IN"
   	}
	]
}
</script>

<link rel="icon" href="/favicon.png" type="image/png" sizes="128x128">
<link rel="apple-touch-icon" href="/favicon.png">
 
<link rel="canonical" href="https://sushilkumar.onrender.com/">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"/> 

<link rel="stylesheet" crossorigin href="/assets/css/app.css">
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
