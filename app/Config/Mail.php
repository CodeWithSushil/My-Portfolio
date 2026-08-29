<?php

declare(strict_types=1);

namespace App\Config;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use RuntimeException;

final class Mail
{
    private readonly string $host;
    private readonly int $port;
    private readonly string $username;
    private readonly string $password;
    private readonly string $encryption;
    private readonly string $fromAddress;
    private readonly string $fromName;
    private readonly int $timeout;

    public function __construct()
    {
        $this->host = $this->env('MAIL_HOST', '127.0.0.1');

        $this->port = (int) $this->env(
            'MAIL_PORT',
            '587'
        );

        $this->username = $this->env(
            'MAIL_USERNAME',
            ''
        );

        $this->password = $this->env(
            'MAIL_PASSWORD',
            ''
        );

        $this->encryption = strtolower(
            $this->env('MAIL_ENCRYPTION', 'tls')
        );

        $this->fromAddress = $this->env(
            'MAIL_FROM_ADDRESS',
            'noreply@example.com'
        );

        $this->fromName = $this->env(
            'MAIL_FROM_NAME',
            'MyApp'
        );

        $this->timeout = (int) $this->env(
            'MAIL_TIMEOUT',
            '30'
        );

        $this->validate();
    }

    /**
     * Create and configure PHPMailer.
     */
    public function getMailer(): PHPMailer
    {
        $mail = new PHPMailer(true);

        try {
            /*
             * SMTP configuration
             */
            $mail->isSMTP();

            $mail->Host = $this->host;
            $mail->Port = $this->port;

            $mail->SMTPAuth = $this->username !== '';

            if ($mail->SMTPAuth) {
                $mail->Username = $this->username;
                $mail->Password = $this->password;
            }

            /*
             * Encryption
             */
            match ($this->encryption) {
                'ssl', 'smtps' => $mail->SMTPSecure =
                    PHPMailer::ENCRYPTION_SMTPS,

                'tls', 'starttls' => $mail->SMTPSecure =
                    PHPMailer::ENCRYPTION_STARTTLS,

                'none', '' => null,

                default => throw new RuntimeException(
                    'Invalid MAIL_ENCRYPTION value.'
                ),
            };

            /*
             * Connection timeout
             */
            $mail->Timeout = $this->timeout;

            /*
             * Character encoding
             */
            $mail->CharSet = 'UTF-8';

            /*
             * Default sender
             */
            $mail->setFrom(
                $this->fromAddress,
                $this->fromName
            );

            /*
             * Do not expose SMTP debugging information
             * to application users.
             */
            $mail->SMTPDebug = 0;

            /*
             * HTML email by default.
             */
            $mail->isHTML(true);

            return $mail;
        } catch (Exception $e) {
            throw new RuntimeException(
                'Mail configuration failed.',
                0,
                $e
            );
        }
    }

    /**
     * Send an email.
     *
     * @param string|array<string> $to
     * @param string|array<string> $cc
     * @param string|array<string> $bcc
     */
    public function send(
        string|array $to,
        string $subject,
        string $body,
        string $plainText = '',
        string|array $cc = [],
        string|array $bcc = []
    ): bool {
        $mail = $this->getMailer();

        try {
            /*
             * Recipients
             */
            $this->addAddresses($mail, $to);

            /*
             * CC
             */
            $this->addAddresses(
                $mail,
                $cc,
                'cc'
            );

            /*
             * BCC
             */
            $this->addAddresses(
                $mail,
                $bcc,
                'bcc'
            );

            /*
             * Subject
             */
            $mail->Subject = $subject;

            /*
             * HTML body
             */
            $mail->Body = $body;

            /*
             * Plain-text fallback.
             */
            $mail->AltBody = $plainText !== ''
                ? $plainText
                : trim(strip_tags($body));

            return $mail->send();
        } catch (Exception $e) {
            throw new RuntimeException(
                'Unable to send email.',
                0,
                $e
            );
        }
    }

    /**
     * Add one or multiple email addresses.
     *
     * @param string|array<string> $addresses
     */
    private function addAddresses(
        PHPMailer $mail,
        string|array $addresses,
        string $type = 'to'
    ): void {
        if ($addresses === []) {
            return;
        }

        if (is_string($addresses)) {
            $addresses = [$addresses];
        }

        foreach ($addresses as $address) {
            if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
                throw new RuntimeException(
                    'Invalid email address.'
                );
            }

            match ($type) {
                'to' => $mail->addAddress($address),
                'cc' => $mail->addCC($address),
                'bcc' => $mail->addBCC($address),
                default => throw new RuntimeException(
                    'Invalid recipient type.'
                ),
            };
        }
    }

    /**
     * Read environment variables.
     *
     * Priority:
     *
     * 1. System environment
     * 2. $_ENV
     * 3. Default value
     */
    private function env(
        string $key,
        ?string $default = null
    ): string {
        /*
         * Hosting platforms, Docker, Render, etc.
         */
        if (function_exists('getenv')) {
            $value = getenv($key);

            if ($value !== false && $value !== '') {
                return $value;
            }
        }

        /*
         * phpdotenv / PHP environment.
         */
        if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
            return (string) $_ENV[$key];
        }

        return $default ?? '';
    }

    /**
     * Validate important configuration.
     */
    private function validate(): void
    {
        if ($this->host === '') {
            throw new RuntimeException(
                'MAIL_HOST is required.'
            );
        }

        if ($this->port < 1 || $this->port > 65535) {
            throw new RuntimeException(
                'MAIL_PORT must be between 1 and 65535.'
            );
        }

        if (
            !filter_var(
                $this->fromAddress,
                FILTER_VALIDATE_EMAIL
            )
        ) {
            throw new RuntimeException(
                'MAIL_FROM_ADDRESS is invalid.'
            );
        }

        if ($this->timeout < 1) {
            throw new RuntimeException(
                'MAIL_TIMEOUT must be greater than zero.'
            );
        }
    }
}
