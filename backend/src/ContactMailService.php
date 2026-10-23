<?php

namespace Briefffly\Backend;

use Dotenv\Dotenv;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class ContactMailService
{
    private string $backendRoot;

    public function __construct(?string $backendRoot = null)
    {
        $this->backendRoot = $backendRoot ?? dirname(__DIR__);
        $this->loadEnv();
    }

    /**
     * @return array{name: string, email: string, subject: string, message: string}
     */
    public function validateContactPayload(array $payload): array
    {
        $name = trim((string) ($payload['name'] ?? ''));
        $email = trim((string) ($payload['email'] ?? ''));
        $subject = trim((string) ($payload['subject'] ?? ''));
        $message = trim((string) ($payload['message'] ?? ''));

        if ($name === '' || $email === '' || $subject === '' || $message === '') {
            throw new \InvalidArgumentException('name, email, subject, and message are required');
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('email must be valid');
        }

        return [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
        ];
    }

    /**
     * @param  array{name: string, email: string, subject: string, message: string}  $form
     * @return array{success: bool, message: string}
     */
    public function sendEmail(array $form): array
    {
        $templatePath = $this->backendRoot.'/email_templates/new_client_request.html';
        $htmlContent = file_get_contents($templatePath);

        $formattedMessage = $this->formatMessageForHtml($form['message']);

        $htmlContent = str_replace(
            ['{{name}}', '{{email}}', '{{subject}}', '{{message}}'],
            [$form['name'], $form['email'], $form['subject'], $formattedMessage],
            $htmlContent
        );

        $plainText = "
            New Client Request

            Name: {$form['name']}
            Email: {$form['email']}
            Subject: {$form['subject']}

            Client Enquiry:
            {$form['message']}
        ";

        $email = (new Email)
            ->from($_ENV['SMTP_USERNAME'])
            ->to($_ENV['CONTACT_RECEIVER'])
            ->subject('New Client Request - Briefffly')
            ->text($plainText)
            ->html($htmlContent);

        $this->mailer()->send($email);

        return [
            'success' => true,
            'message' => 'New client request email sent successfully',
        ];
    }

    /**
     * @param  array{name: string, email: string, subject: string, message: string}  $form
     * @return array{success: bool, message: string}
     */
    public function sendAutoReply(array $form): array
    {
        $plainText = "
            Hi {$form['name']},

            Thank you for contacting Briefffly!

            We have received your message successfully. Our team will review your request and get back to you as soon as possible.

            Best regards,
            Briefffly Team
        ";

        $formattedMessage = $this->formatMessageForHtml($form['message']);

        $templatePath = $this->backendRoot.'/email_templates/auto_reply.html';
        $htmlContent = file_get_contents($templatePath);

        $htmlContent = str_replace(
            ['{{name}}', '{{subject}}', '{{message}}'],
            [$form['name'], $form['subject'], $formattedMessage],
            $htmlContent
        );

        $email = (new Email)
            ->from($_ENV['SMTP_USERNAME'])
            ->to($form['email'])
            ->subject('Thank you for contacting Briefffly')
            ->text($plainText)
            ->html($htmlContent);

        $this->mailer()->send($email);

        return [
            'success' => true,
            'message' => 'Auto-reply email sent successfully',
        ];
    }

    private function formatMessageForHtml(string $message): string
    {
        return str_replace(
            ['&', '<', '>', "\n"],
            ['&amp;', '&lt;', '&gt;', '<br>'],
            $message
        );
    }

    private function loadEnv(): void
    {
        if ($this->env('SMTP_HOST') !== '') {
            return;
        }

        Dotenv::createImmutable($this->backendRoot)->safeLoad();
    }

    private function mailer(): Mailer
    {
        $host = $this->env('SMTP_HOST', '127.0.0.1');
        $port = (int) $this->env('SMTP_PORT', '587');
        $username = rawurlencode($this->env('SMTP_USERNAME'));
        $password = rawurlencode($this->env('SMTP_PASSWORD'));

        $dsn = "smtp://{$username}:{$password}@{$host}:{$port}?encryption=tls";

        return new Mailer(Transport::fromDsn($dsn));
    }

    private function env(string $key, string $default = ''): string
    {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);

        if ($value === false || $value === null) {
            return $default;
        }

        return (string) $value;
    }
}
