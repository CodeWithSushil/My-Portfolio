<?php

declare(strict_types=1);

function view(
    string $view,
    array $data = [],
    string $layout = 'main'
): void {
    $viewPath = __DIR__.'/../Views/Components/'.$view.'.php';

    if (! is_file($viewPath)) {
        throw new RuntimeException(
            "View [{$view}] does not exist."
        );
    }

    /*
     * Convert:
     *
     * ['title' => 'Home Page']
     *
     * into:
     *
     * $title = 'Home Page';
     */
    extract($data, EXTR_SKIP);

    /*
     * Render the requested view.
     */
    ob_start();

    require $viewPath;

    $content = ob_get_clean();

    /*
     * Render layout.
     */
    $layoutPath = __DIR__.'/../Views/Layouts/'.$layout.'.php';

    if (! is_file($layoutPath)) {
        throw new RuntimeException(
            "Layout [{$layout}] does not exist."
        );
    }

    require $layoutPath;
}

if (! function_exists('esc')) {
    /**
     * Escape a value for safe HTML output.
     */
    function esc(
        mixed $value,
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE,
        string $encoding = 'UTF-8'
    ): string {
        return htmlspecialchars(
            (string) $value,
            $flags,
            $encoding
        );
    }
}
