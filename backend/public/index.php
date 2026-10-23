<?php

declare(strict_types=1);

use Briefffly\Backend\ContactMailService;

require dirname(__DIR__).'/vendor/autoload.php';

header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$service = new ContactMailService(dirname(__DIR__));

try {
    if ($method === 'GET' && $path === '/') {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Briefffly backend is running']);
        exit;
    }

    if ($method === 'POST' && in_array($path, ['/send-email', '/send-auto-reply'], true)) {
        $payload = json_decode(file_get_contents('php://input') ?: '', true);
        if (! is_array($payload)) {
            throw new InvalidArgumentException('Invalid JSON body');
        }

        $form = $service->validateContactPayload($payload);

        $result = $path === '/send-email'
            ? $service->sendEmail($form)
            : $service->sendAutoReply($form);

        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    http_response_code(404);
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Not found']);
} catch (InvalidArgumentException $exception) {
    http_response_code(422);
    header('Content-Type: application/json');
    echo json_encode(['message' => $exception->getMessage()]);
} catch (Throwable $exception) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Server error']);
}
