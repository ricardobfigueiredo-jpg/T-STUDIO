# T Studio architecture

T Studio is a personal editorial workspace for planning, reviewing and producing multimedia content. It uses a modular PHP application, a planned MySQL persistence layer and future Python media workers.

## Editorial workflow

Workspace → category → topic → story → hook and CTA variants → format-specific storyboard → production → review → library.

Approved production manifests should be immutable, versioned and traceable to their source story. Hooks capture attention; calls to action direct audience behavior. Carousel and video formats share verified facts but have independent layouts and scripts.

## Runtime boundaries

The PHP application owns editorial state, job metadata and authorization. Future Python workers retrieve approved media jobs through authenticated HTTP endpoints. Media files live outside the database. Processing and callback delivery have separate retry policies. The project uses external AI services for editorial content; it does not plan to train or host models.

The initial demonstration uses browser-local editorial state. MySQL integration, worker execution and external providers are not implemented yet. Never expose a writable unauthenticated API or the project root as a web document root.

## Design direction

Espresso, roast, caramel, cream and ivory. Warm cinematic color grading, editorial typography and realistic, rights-cleared photography are preferred. Conceptual illustrations must not be presented as documentary evidence. Preserve distinct video, narration, music and caption tracks.

## Diagnostics

Daily UTC JSON Lines logs at logs/YYYY-MM-DD/log.txt, outside the public directory. Log request identifiers and operation outcomes; do not log credentials, personal data or raw private payloads. Central worker ingestion, retention and protected diagnostics remain future tasks.
