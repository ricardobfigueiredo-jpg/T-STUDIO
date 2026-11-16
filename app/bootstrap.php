<?php

declare(strict_types=1);

function studio_log(string $level, string $event, array $context = []): void
{
    static $writing = false;

    if ($writing) {
        return;
    }

    $writing = true;

    try {
        $directory = dirname(__DIR__) . '/logs/' . gmdate('Y-m-d');

        if (!is_dir($directory) && !@mkdir($directory, 0700, true) && !is_dir($directory)) {
            error_log('T Studio: log directory unavailable');
            return;
        }

        $record = [
            'timestamp' => gmdate('c'),
            'level' => $level,
            'component' => 'php',
            'request_id' => $GLOBALS['request_id'] ?? null,
            'event' => $event,
            'context' => $context,
        ];

        $line = json_encode(
            $record,
            JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE | JSON_THROW_ON_ERROR
        );

        if (@file_put_contents($directory . '/log.txt', $line . PHP_EOL, FILE_APPEND | LOCK_EX) === false) {
            error_log('T Studio: log write failed');
        }
    } catch (Throwable $exception) {
        error_log('T Studio: logger failed');
    } finally {
        $writing = false;
    }
}

$GLOBALS['request_id'] = bin2hex(random_bytes(12));

ini_set('display_errors', '0');

set_exception_handler(function (Throwable $exception): void {
    studio_log('ERROR', 'unhandled_exception', [
        'class' => get_class($exception),
        'file' => basename($exception->getFile()),
        'line' => $exception->getLine(),
    ]);

    if (!headers_sent()) {
        http_response_code(500);
    }

    echo 'Unexpected error. Reference: ' . htmlspecialchars($GLOBALS['request_id'], ENT_QUOTES, 'UTF-8');
});

set_error_handler(function (int $severity, string $message, string $file, int $line): bool {
    if (!(error_reporting() & $severity)) {
        return false;
    }

    studio_log('WARNING', 'php_error', [
        'severity' => $severity,
        'file' => basename($file),
        'line' => $line,
    ]);

    return true;
});

register_shutdown_function(function (): void {
    $error = error_get_last();
    $fatalTypes = [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR];

    if ($error !== null && in_array($error['type'], $fatalTypes, true)) {
        studio_log('ERROR', 'fatal_error', [
            'type' => $error['type'],
            'file' => basename($error['file']),
            'line' => $error['line'],
        ]);
    }
});
