<?php

declare(strict_types=1);

require dirname(__DIR__) . '/app/bootstrap.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

$action = $_GET['action'] ?? 'health';
$status = 200;

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $status = 405;
    header('Allow: GET');
    $result = ['error' => 'method_not_allowed'];
} elseif ($action === 'health') {
    $result = [
        'status' => 'ok',
        'version' => '0.1.0',
        'mode' => 'demo',
        'request_id' => $GLOBALS['request_id'],
    ];
} else {
    $status = 404;
    $result = ['error' => 'not_found'];
}

http_response_code($status);

studio_log('INFO', 'api_response', [
    'action' => $action === 'health' ? 'health' : 'unknown',
    'status' => $status,
]);

echo json_encode($result, JSON_THROW_ON_ERROR);
