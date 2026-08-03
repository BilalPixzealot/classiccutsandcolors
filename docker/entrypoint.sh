#!/bin/sh
set -e

# Ensure an application key exists. Prefer a real APP_KEY set on the host;
# otherwise generate an ephemeral one so the app can still boot.
if [ -z "$APP_KEY" ]; then
	echo "WARNING: APP_KEY not set — generating an ephemeral key. Set APP_KEY in your host env for stable sessions."
	APP_KEY="$(php artisan key:generate --show)"
	export APP_KEY
fi

# Cache config/routes/views now that runtime env vars are available.
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec frankenphp run --config /etc/caddy/Caddyfile
