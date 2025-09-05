# Citem Core

A Laravel application with Docker support.

## Quick Start

1) Start the app
```bash
docker-compose up -d --build
```

2) Open in browser
- http://localhost:8000

Notes
- On startup, the container runs: `key:generate`, `migrate --seed`, and serves on port 8000.
- Database from host: localhost:3307 (user: user, pass: password, db: mydb).

Common
- Logs: `docker-compose logs --tail=200 app`
- Shell: `docker-compose exec app sh`
- Stop: `docker-compose down`
