# syntax=docker/dockerfile:1

# ---------------------------------------------------------------------------
# Stage 1 — Build front-end assets (Vite + Tailwind + self-hosted fonts)
# Debian-based Node (glibc) so the Rolldown/Vite native binding resolves.
# ---------------------------------------------------------------------------
FROM node:20-slim AS assets
WORKDIR /app
COPY package.json package-lock.json vite.config.js ./
# `npm install` (not `npm ci`) re-resolves platform-native optional deps,
# side-stepping the npm optional-dependency bug (npm/cli#4828) for Rolldown/Vite.
RUN npm install --no-audit --no-fund
COPY resources ./resources
COPY public ./public
RUN npm run build

# ---------------------------------------------------------------------------
# Stage 2 — PHP runtime (FrankenPHP = Caddy + PHP, HTTP/2, production-grade)
# ---------------------------------------------------------------------------
FROM dunglas/frankenphp:1-php8.4
WORKDIR /app

# Composer + required PHP extensions
RUN install-php-extensions @composer intl opcache zip gd

# Application source (see .dockerignore for exclusions)
COPY . .
# Compiled assets from stage 1
COPY --from=assets /app/public/build ./public/build

# Production PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Writable runtime directories
RUN chmod -R 775 storage bootstrap/cache

# Server config + entrypoint
COPY docker/Caddyfile /etc/caddy/Caddyfile
COPY docker/entrypoint.sh /usr/local/bin/entrypoint
RUN chmod +x /usr/local/bin/entrypoint

# gVisor-based runtimes (e.g. Render) refuse to exec a binary that carries Linux
# file capabilities. We bind to a high $PORT, so those caps aren't needed —
# re-copying the binary strips them (cp does not preserve file capabilities).
RUN cp -f /usr/local/bin/frankenphp /usr/local/bin/frankenphp.nocap \
    && mv -f /usr/local/bin/frankenphp.nocap /usr/local/bin/frankenphp \
    && chmod 0755 /usr/local/bin/frankenphp

ENV APP_ENV=production \
    APP_DEBUG=false
EXPOSE 8080
ENTRYPOINT ["entrypoint"]
