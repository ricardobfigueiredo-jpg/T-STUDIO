# T Studio

T Studio is a personal editorial workspace for planning and reviewing multimedia content. It helps organize categories, topics, stories, hooks, calls to action and production storyboards.

Built with PHP, HTML, CSS and JavaScript. MySQL migrations are included as a proposed persistence model; Python media workers are planned.

## Run locally

Requirements: PHP 8.1 or newer and a modern web browser.

From the repository root:

```sh
php -S 127.0.0.1:8080 -t public
```

Open http://127.0.0.1:8080. The PHP development server is intended for local testing, not public deployment. Keep the project root, logs, configuration and database scripts outside the public document root.

## Current prototype

- Category and topic CRUD with a curated sample coffee catalog.
- Story drafts and editorial approval.
- Story-linked hook and CTA variants.
- Story-specific storyboard and proportional video timing preview.
- Brand palette and daily PHP diagnostic logging.
- Read-only health and sample catalog endpoints.

Editorial data is stored in the current browser; clearing browser storage removes it. No model calls, media rendering, production publishing, user authentication or MySQL persistence are enabled. Photographic assets and private prompts are not included.

## API

- GET /api.php?action=health
- GET /api.php?action=topics

## Tests

```sh
php tests/smoke.php
node --check public/assets/studio.js
```

The latter command requires Node.js only for optional syntax checking, not for running the application.

## Further work

See [ROADMAP.md](ROADMAP.md) and [architecture](docs/ARCHITECTURE.md).

## License

MIT. See [LICENSE](LICENSE).
