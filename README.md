# Classic Cuts &amp; Colors

Marketing website for **Classic Cuts &amp; Colors**, a hair salon in Eltham Village Shopping Centre, Melbourne — cuts, colour &amp; balayage, and smoothing treatments (Nanoplasty, Hair Botox, formaldehyde-free keratin).

Built as a fast, SEO-friendly marketing site with room to grow into a multi-page site (Products, Gallery).

## Tech stack

- **Laravel 13** (PHP 8.4+)
- **Blade** templating — data-driven from `config/salon.php`
- **Tailwind CSS v4** + a custom design system (`resources/css/app.css`)
- **Vite** build, with self-hosted fonts (Playfair Display + Instrument Sans)
- Vanilla JS (no front-end framework) for a tiny payload

## Requirements

- PHP **8.4+** (Laravel 13 dependencies require 8.4.1+)
- Composer 2
- Node 18+ / npm

## Local setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run build        # or `npm run dev` for hot reload
php artisan serve
```

Then visit http://127.0.0.1:8000.

> Compiled assets (`public/build`) are git-ignored — run `npm run build` after cloning or on deploy.

## Project structure

```
app/Http/Controllers/PageController.php   Thin controllers (home / products / gallery)
config/salon.php                          Single source of truth for all site content
resources/views/
  components/layout.blade.php             Base layout: <head>, SEO meta, JSON-LD schema
  partials/nav.blade.php, footer.blade.php
  partials/home/*.blade.php               Home page sections (hero, menu, work, …)
  home.blade.php                          Home page
routes/web.php                            Routes + sitemap.xml + robots.txt
public/images/                            Optimised WebP imagery + logo
```

## SEO &amp; performance

- schema.org **HairSalon** structured data (name, address, opening hours, phone, rating)
- Open Graph / Twitter cards, canonical URLs
- Dynamic `robots.txt` and `sitemap.xml`
- WebP imagery, lazy loading, explicit `width`/`height` (no layout shift)
- `fetchpriority="high"` on the hero image for a fast LCP
- Self-hosted fonts, minified CSS/JS

## Content

All copy, pricing, hours, brands and testimonials live in **`config/salon.php`** — update there and every page reflects the change.
