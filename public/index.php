<?php

declare(strict_types=1);

require dirname(__DIR__) . '/app/bootstrap.php';

studio_log('INFO', 'dashboard_view');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>T Studio | Editorial workspace</title>
</head>
<body>
    <main>
        <h1>T Studio</h1>
        <p>Editorial workspace — development foundation.</p>
        <a href="api.php?action=health">API health</a>
    </main>
</body>
</html>
