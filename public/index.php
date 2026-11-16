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
    <link rel="stylesheet" href="assets/studio.css">
    <script defer src="assets/studio.js"></script>
</head>
<body>
    <aside>
        <div class="brand">T Studio<small>EDITORIAL WORKSPACE</small></div>
        <nav id="nav" aria-label="Studio navigation"></nav>
        <p class="foot">v0.1.0 · Local demo</p>
    </aside>
    <main>
        <header>
            <div>
                <small>CONTENT STUDIO / WORKSPACE</small>
                <h1 id="heading">Editorial Dashboard</h1>
            </div>
            <button id="new" hidden>+ New item</button>
        </header>
        <p class="notice">Demo workspace · Browser-local data. No AI calls or publishing.</p>
        <section id="view" aria-live="polite"></section>
    </main>
    <dialog id="editor">
        <form id="editform">
            <h2 id="dialogtitle"></h2>
            <div id="fields"></div>
            <div class="actions">
                <button type="button" class="secondary" id="close">Cancel</button>
                <button type="submit">Save</button>
            </div>
        </form>
    </dialog>
</body>
</html>
