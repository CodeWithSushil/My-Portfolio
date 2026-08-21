<?php

declare(strict_types=1);

namespace App\Router;

use Closure;
use InvalidArgumentException;
use ReflectionException;
use ReflectionMethod;
use RuntimeException;
use Throwable;

final class Router
{
    /**
     * @var list<array{
     *     method: string,
     *     url: string,
     *     action: callable|string,
     *     name: ?string
     * }>
     */
    private array $routes = [];

    /**
     * Supported HTTP methods.
     */
    private const METHODS = [
        'GET',
        'POST',
        'PUT',
        'PATCH',
        'DELETE',
        'OPTIONS',
        'HEAD',
    ];

    /**
     * Register a route.
     */
    private function add(
        string $method,
        string $url,
        callable|string $action,
        ?string $name = null
    ): static {
        $method = strtoupper(trim($method));

        if (!in_array($method, self::METHODS, true)) {
            throw new InvalidArgumentException(
                "Unsupported HTTP method: {$method}"
            );
        }

        $url = $this->normalizePath($url);

        if ($url === '') {
            throw new InvalidArgumentException('Route URL cannot be empty.');
        }

        if (!is_callable($action) && !(
            is_string($action) &&
            str_contains($action, '@')
        )) {
            throw new InvalidArgumentException(
                'Route action must be a callable or Controller@method string.'
            );
        }

        $this->routes[] = [
            'method' => $method,
            'url'    => $url,
            'action' => $action,
            'name'   => $name,
        ];

        return $this;
    }

    public function get(
        string $url,
        callable|string $action,
        ?string $name = null
    ): static {
        return $this->add('GET', $url, $action, $name);
    }

    public function post(
        string $url,
        callable|string $action,
        ?string $name = null
    ): static {
        return $this->add('POST', $url, $action, $name);
    }

    public function put(
        string $url,
        callable|string $action,
        ?string $name = null
    ): static {
        return $this->add('PUT', $url, $action, $name);
    }

    public function patch(
        string $url,
        callable|string $action,
        ?string $name = null
    ): static {
        return $this->add('PATCH', $url, $action, $name);
    }

    public function delete(
        string $url,
        callable|string $action,
        ?string $name = null
    ): static {
        return $this->add('DELETE', $url, $action, $name);
    }

    public function options(
        string $url,
        callable|string $action,
        ?string $name = null
    ): static {
        return $this->add('OPTIONS', $url, $action, $name);
    }

    public function head(
        string $url,
        callable|string $action,
        ?string $name = null
    ): static {
        return $this->add('HEAD', $url, $action, $name);
    }

    /**
     * Dispatch the current HTTP request.
     */
    public function dispatch(): mixed
    {
        $method = strtoupper(
            trim((string)($_SERVER['REQUEST_METHOD'] ?? 'GET'))
        );

        if (!in_array($method, self::METHODS, true)) {
            $this->abort(405, 'Method Not Allowed');
        }

        $uri = (string)($_SERVER['REQUEST_URI'] ?? '/');

        $path = parse_url($uri, PHP_URL_PATH);

        if (!is_string($path)) {
            $this->abort(400, 'Bad Request');
        }

        $path = $this->normalizePath($path);

        $methodMatched = false;

        foreach ($this->routes as $route) {
            /*
             * HEAD requests are allowed to use GET routes.
             */
            $routeMethodMatches =
                $route['method'] === $method ||
                ($method === 'HEAD' && $route['method'] === 'GET');

            if (!$routeMethodMatches) {
                continue;
            }

            $methodMatched = true;

            $pattern = $this->compileRoute($route['url']);

            $result = preg_match(
                $pattern,
                $path,
                $matches
            );

            if ($result === false) {
                throw new RuntimeException(
                    'Invalid route pattern.'
                );
            }

            if ($result !== 1) {
                continue;
            }

            array_shift($matches);

            /*
             * URL-decode route parameters.
             */
            $parameters = array_map(
                static fn(string $value): string => rawurldecode($value),
                $matches
            );

            return $this->execute(
                $route['action'],
                $parameters
            );
        }

        if ($methodMatched) {
            $this->abort(404, 'Page Not Found');
        }

        /*
         * A route exists for the path but not for this HTTP method.
         */
        if ($this->pathExists($path)) {
            $this->abort(405, 'Method Not Allowed');
        }

        $this->abort(404, 'Page Not Found');
    }

    /**
     * Convert:
     *
     * /user/{id}
     *
     * into:
     *
     * #^/user/([^/]+)$#
     */
    private function compileRoute(string $route): string
    {
        $route = $this->normalizePath($route);

        $segments = explode('/', trim($route, '/'));

        $regex = [];

        foreach ($segments as $segment) {
            if ($segment === '') {
                continue;
            }

            /*
             * Dynamic parameter:
             *
             * {id}
             * {username}
             * {post_id}
             */
            if (preg_match(
                '/^\{([a-zA-Z_][a-zA-Z0-9_]*)\}$/',
                $segment,
                $matches
            ) === 1) {
                $regex[] = '(?P<' . $matches[1] . '>[^/]+)';
                continue;
            }

            /*
             * Escape static route segments so characters such as
             * ".", "+", "?", "(" etc. cannot affect the regex.
             */
            $regex[] = preg_quote($segment, '#');
        }

        if ($regex === []) {
            return '#^/$#D';
        }

        return '#^/' . implode('/', $regex) . '/?$#D';
    }

    /**
     * Execute route action.
     *
     * Supports:
     *
     * Closure
     * function
     * [$controller, 'method']
     * Controller@method
     */
    private function execute(
        callable|string $action,
        array $parameters
    ): mixed {
        if (is_string($action)) {
            $action = $this->resolveController($action);
        }

        if (!is_callable($action)) {
            throw new RuntimeException(
                'Route action is not callable.'
            );
        }

        /*
         * call_user_func_array() is not required.
         *
         * PHP 8+ supports argument unpacking.
         */
        return $action(...$parameters);
    }

    /**
     * Resolve Controller@method.
     */
    private function resolveController(string $action): callable
    {
        [$controller, $method] = array_pad(
            explode('@', $action, 2),
            2,
            null
        );

        if (
            !is_string($controller) ||
            !is_string($method) ||
            $controller === '' ||
            $method === ''
        ) {
            throw new InvalidArgumentException(
                'Invalid controller action. Expected Controller@method.'
            );
        }

        /*
         * Only allow a simple controller class name here.
         *
         * This prevents arbitrary namespace/class strings from being
         * passed through the route definition.
         */
        if (!preg_match(
            '/^[A-Za-z_][A-Za-z0-9_]*$/',
            $controller
        )) {
            throw new InvalidArgumentException(
                'Invalid controller name.'
            );
        }

        /*
         * Restrict method names to valid PHP identifiers.
         */
        if (!preg_match(
            '/^[A-Za-z_][A-Za-z0-9_]*$/',
            $method
        )) {
            throw new InvalidArgumentException(
                'Invalid controller method name.'
            );
        }

        $class = 'App\\Controllers\\' . $controller;

        if (!class_exists($class)) {
            throw new RuntimeException(
                "Controller [{$class}] not found."
            );
        }

        $instance = new $class();

        if (!method_exists($instance, $method)) {
            throw new RuntimeException(
                "Controller method [{$class}@{$method}] not found."
            );
        }

        /*
         * Security:
         * prevent calling private/protected/static methods accidentally.
         */
        try {
            $reflection = new ReflectionMethod($instance, $method);
        } catch (ReflectionException $e) {
            throw new RuntimeException(
                'Unable to inspect controller method.',
                previous: $e
            );
        }

        if (!$reflection->isPublic() || $reflection->isStatic()) {
            throw new RuntimeException(
                "Controller method [{$class}@{$method}] is not accessible."
            );
        }

        return [$instance, $method];
    }

    /**
     * Check whether any route exists for a path.
     */
    private function pathExists(string $path): bool
    {
        foreach ($this->routes as $route) {
            $pattern = $this->compileRoute($route['url']);

            if (preg_match($pattern, $path) === 1) {
                return true;
            }
        }

        return false;
    }

    /**
     * Normalize request/route paths.
     */
    private function normalizePath(string $path): string
    {
        $path = trim($path);

        if ($path === '') {
            return '/';
        }

        /*
         * Remove duplicate slashes.
         */
        $path = preg_replace(
            '#/+#',
            '/',
            $path
        );

        if (!is_string($path)) {
            throw new RuntimeException(
                'Unable to normalize route path.'
            );
        }

        /*
         * Always begin with "/".
         */
        if ($path[0] !== '/') {
            $path = '/' . $path;
        }

        /*
         * Prevent path traversal.
         */
        $decoded = rawurldecode($path);

        if (
            str_contains($decoded, "\0") ||
            preg_match('#(?:^|/)\.\.(?:/|$)#', $decoded) === 1
        ) {
            $this->abort(400, 'Bad Request');
        }

        /*
         * Keep root as "/".
         */
        if ($path !== '/') {
            $path = rtrim($path, '/');
        }

        return $path;
    }

    /**
     * Stop request execution with a controlled HTTP error.
     */
    private function abort(
        int $status,
        string $message
    ): never {
        http_response_code($status);

        /*
         * Do not expose internal exception details.
         */
        if (!headers_sent()) {
            header('Content-Type: text/plain; charset=UTF-8');
            header('X-Content-Type-Options: nosniff');
            header('Cache-Control: no-store');
        }

        exit($message);
    }
}
