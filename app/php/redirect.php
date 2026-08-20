<?php
// Enable top-level output buffering immediately
if (ob_get_level() === 0) {
    ob_start();
}

/**
 * Safe redirect function with output buffering protection.
 *
 * @param string $url
 * @param int    $seconds
 */
function redirect(string $url, int $seconds = 0): void
{
    // Clean any accidental output before sending headers
    if (ob_get_length()) {
        ob_clean();
    }

    if (!headers_sent()) {
        // Use HTTP header if possible
        if ($seconds > 0) {
            header("Refresh: {$seconds}; URL={$url}");
        } else {
            header("Location: {$url}");
        }

        // Ensure no leftover output gets sent accidentally
        ob_end_flush();
        exit;
    } else {
        // Headers already sent — use fallback (meta + JS)
        if (ob_get_length()) {
            ob_clean(); // Clear any previous HTML before rendering fallback
        }

        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='refresh' content='{$seconds};url={$url}'>
            <title>Redirecting...</title>
            <script>
                let countdown = {$seconds};
                const interval = setInterval(() => {
                    if (countdown > 0) {
                        document.getElementById('timer').innerText = countdown--;
                    } else {
                        clearInterval(interval);
                        window.location.href = '{$url}';
                    }
                }, 1000);
            </script>
        </head>
        <body style='font-family: Arial; text-align:center; margin-top:60px;'>
            <h2>Redirecting in <span id='timer'>{$seconds}</span> second(s)...</h2>
            <p>If not redirected automatically, <a href='{$url}'>click here</a>.</p>
        </body>
        </html>";

        ob_end_flush();
        exit;
    }
}

redirect("https://google.com", 5);
