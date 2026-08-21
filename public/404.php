<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>404 - Page Not Found</title>

    <meta
        name="description"
        content="The page you are looking for could not be found."
    >

    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css"
    >
     <link rel="stylesheet" href="./assets/css/app.css"
  ll>
    <link rel="stylesheet" href="responsive.css"
    >
</head>

<body>

<section class="error-page">

    <main class="error-content">

        <p class="error-code" aria-label="404">
            404
        </p>

        <h1 class="title error-title">
            Page Not Found
        </h1>

        <p class="error-description">
            Sorry, the page you're looking for doesn't exist,
            has been moved, or the URL may be incorrect.
        </p>

        <div class="error-actions">

            <a
                href="/"
                class="button home-button"
            >
                🏠 Back to Home
            </a>

            <button
                type="button"
                class="button back-button"
                onclick="history.back()"
            >
                ← Go Back
            </button>

        </div>

    </main>

    <footer class="error-footer">
        &copy; <?= date('Y') ?> Sushil Kumar — All rights reserved.
    </footer>

</section>

</body>
</html>
