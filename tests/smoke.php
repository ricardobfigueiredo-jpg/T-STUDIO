<?php

declare(strict_types=1);

require dirname(__DIR__) . '/app/bootstrap.php';

$catalog = require dirname(__DIR__) . '/app/catalog.php';

if (count($catalog) !== 10) {
    throw new RuntimeException('Expected ten sample topics.');
}

if (count(array_unique(array_column($catalog, 'id'))) !== count($catalog)) {
    throw new RuntimeException('Duplicate topic identifiers.');
}

foreach ($catalog as $topic) {
    if (empty($topic['title']) || empty($topic['description'])) {
        throw new RuntimeException('Incomplete sample topic.');
    }
}

studio_log('INFO', 'catalog_smoke_test', ['count' => count($catalog)]);

$path = dirname(__DIR__) . '/logs/' . gmdate('Y-m-d') . '/log.txt';

if (!is_file($path)) {
    throw new RuntimeException('Log file was not created.');
}

echo "Catalog and logging smoke checks passed.\n";
