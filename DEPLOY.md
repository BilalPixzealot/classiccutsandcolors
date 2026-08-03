# Deployment

This is a **PHP / Laravel** app, so it needs a PHP-capable host — **not** Vercel
(Vercel only runs Node/static sites). The repo ships a production `Dockerfile`
(FrankenPHP + Caddy), so any Docker-based host works: **Render, Railway, Fly.io,
DigitalOcean App Platform**, etc.

No database is required — sessions and cache use the filesystem.

## Required environment variables (set on the host)

| Key | Value |
|-----|-------|
| `APP_KEY` | Run `php artisan key:generate --show` locally and paste the `base64:...` value |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_URL` | Your live URL, e.g. `https://classiccutsandcolors.onrender.com` |
| `SESSION_DRIVER` | `file` |
| `CACHE_STORE` | `file` |
| `QUEUE_CONNECTION` | `sync` |
| `LOG_CHANNEL` | `stderr` |

Generate the key locally first:

```bash
php artisan key:generate --show
```

## Option A — Render (Docker, has a free tier)

1. Push this repo to GitHub (already done).
2. Render dashboard → **New +** → **Blueprint** → pick this repo.
   Render reads `render.yaml` and provisions a Docker web service.
   *(Or: New + → Web Service → Docker → this repo.)*
3. Add the env vars above (at minimum `APP_KEY` and `APP_URL`).
4. Deploy. First build takes a few minutes (Composer + `npm run build`).

## Option B — Railway

1. Railway → **New Project** → **Deploy from GitHub repo** → this repo.
2. Railway auto-detects the `Dockerfile` and builds it.
3. Under **Variables**, add the env vars above.
4. Under **Settings → Networking**, generate a public domain.

## Custom domain

Point `classiccutsandcolors.com.au` at the host (CNAME/A record per the host's
instructions), then update `APP_URL` to the custom domain and redeploy.

## Local Docker test (optional)

```bash
docker build -t ccc .
docker run -p 8080:8080 -e APP_KEY="base64:...": -e APP_URL=http://localhost:8080 ccc
# visit http://localhost:8080
```
