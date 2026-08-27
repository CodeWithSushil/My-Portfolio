<?php

declare(strict_types=1);

namespace App\Config;

use PDO;
use PDOException;
use RuntimeException;

final class Database
{
    private readonly string $driver;
    private readonly string $host;
    private readonly int $port;
    private readonly string $dbname;
    private readonly string $charset;
    private readonly string $username;
    private readonly string $password;

    public function __construct()
    {
        $this->driver = $this->env('DB_DRIVER', 'mysql');

        $this->host = $this->env(
            'DB_HOST',
            '127.0.0.1'
        );

        $this->port = (int) $this->env(
            'DB_PORT',
            '3306'
        );

        $this->dbname = $this->env(
            'DB_NAME',
            'MyApp'
        );

        $this->charset = $this->env(
            'DB_CHARSET',
            'utf8mb4'
        );

        $this->username = $this->env(
            'DB_USERNAME',
            'root'
        );

        $this->password = $this->env(
            'DB_PASSWORD',
            ''
        );
    }

    /**
     * Get a PDO database connection.
     */
    public function getConnection(): PDO
    {
        $dsn = sprintf(
            '%s:host=%s;port=%d;dbname=%s;charset=%s',
            $this->driver,
            $this->host,
            $this->port,
            $this->dbname,
            $this->charset
        );

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_STRINGIFY_FETCHES  => false,
        ];

        try {
            return new PDO(
                $dsn,
                $this->username,
                $this->password,
                $options
            );
        } catch (PDOException $e) {
            /*
             * Never expose the original exception directly
             * to the end user because it can contain sensitive
             * database information.
             */
            throw new RuntimeException(
                'Database connection failed.',
                0,
                $e
            );
        }
    }

    /**
     * Read an environment variable.
     *
     * Priority:
     * 1. Process environment
     * 2. $_ENV
     * 3. Default value
     */
    private function env(
        string $key,
        ?string $default = null
    ): string {
        /*
         * getenv() is the normal source for hosting/container
         * environment variables.
         */
        if (function_exists('getenv')) {
            $value = getenv($key);

            if ($value !== false && $value !== '') {
                return $value;
            }
        }

        /*
         * Fallback for environments where values are available
         * through the PHP $_ENV superglobal.
         */
        if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
            return (string) $_ENV[$key];
        }

        /*
         * Application fallback.
         */
        return $default ?? '';
    }
}
