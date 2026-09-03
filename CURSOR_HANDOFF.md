# Classic Cuts & Colors — Project Handoff (for Cursor AI)

> **Read this file first.** It is the single source of truth for where this project
> stands and how to continue. Work was done in Claude Code up to **2026-08-26**;
> from here on, continue in Cursor. Nothing below is a suggestion — it reflects the
> actual, working state of the repo.

---

## 1. What this project is

A **premium marketing website** for **Classic Cuts & Colors**, a hair salon in
**Eltham Village Shopping Centre, Melbourne (Australia)**. Goal: MNC-level quality —
secure, well-structured, optimized, responsive, SEO-friendly, Google PageSpeed 90+.

- **Design direction:** Bold, cinematic (Awwwards-style), feminine, welcoming.
- **Single light theme only. No dark mode.**
- **Palette:** baby-pink background + metallic-gold headings (tokens in §5).

---

## 2. Tech stack (LOCKED — do not substitute)

| Layer | Choice |
|---|---|
| Framework | **Laravel ^13.8** (Blade templates, no separate frontend framework) |
| PHP | **8.4.x** (Laravel 13 requires PHP 8.4.1+) |
| Styling | **Tailwind CSS v4** (`@tailwindcss/vite`, CSS-first via `@theme`) + custom CSS |
| Bundler | **Vite** (`laravel-vite-plugin`) |
| JS | **Vanilla JS**, one file, no libraries (progressive enhancement) |
| Fonts | Self-hosted via `laravel-vite-plugin/fonts` (Bunny): Playfair Display (display) + Instrument Sans (body) |
| DB | None used yet (site is fully static/data-driven from a config file) |
| Deploy | **Docker (FrankenPHP + Caddy)** on **Render.com** |
| Repo | GitHub: `BilalPixzealot/classiccutsandcolors`, branch **`main`** |
| Live URL | https://classic-cuts-and-colors.onrender.com |

### Local machine specifics (Windows)
- **PHP 8.4 binary is NOT the machine default.** Use the standalone one explicitly:
  - `D:/projects/php84/php.exe`  (machine default `php` is 8.1 — will NOT run this app)
- Node: v22.9.0
- Composer: run via the local phar → `php84 composer.phar ...` (in the parent folder `classic-cuts-and-colors/`)
- Project root (the Laravel app): `.../classic-cuts-and-colors/ccc-development/`

---

## 3. How to run locally

```bash
# from ccc-development/
# 1) Install deps (first time only)
D:/projects/php84/php.exe ../composer.phar install
npm install

# 2) Build front-end assets (REQUIRED after ANY edit to resources/css/app.css or resources/js/app.js)
npm run build          # production build
# or, for live dev with HMR:
npm run dev

# 3) Serve the app (keep this running in its own terminal)
D:/projects/php84/php.exe artisan serve --host=127.0.0.1 --port=8123
# → http://127.0.0.1:8123
```

**Important build rule:**
- Editing **`resources/css/app.css` or `resources/js/app.js` → you MUST `npm run build`** (or have `npm run dev` running) or you'll keep seeing the old version. This has bitten us before ("purana dikh raha hai" = unbuilt assets or browser cache; hard-refresh with `Ctrl+Shift+R`).
- Editing **Blade views or `config/salon.php` → NO build needed**, just refresh.
- Adding/replacing files in **`public/images/...` → NO build needed** (static assets served directly).

---

## 4. Architecture — how the site is built

**The whole site is data-driven from one config file.** Content lives in data, markup is thin.

```
ccc-development/
├── config/salon.php            ← ★ SINGLE SOURCE OF TRUTH for all content
│                                 (address, hours, pricelist, gallery, shop, reviews,
│                                  gift-card amounts, marquee, booking_url, etc.)
├── routes/web.php              ← all public routes (see §4.1)
├── app/Http/Controllers/PageController.php  ← one controller, one method per page
├── resources/
│   ├── css/app.css             ← ★ ALL styling (design tokens + every component). One file.
│   ├── js/app.js               ← ★ ALL behaviour (sticky nav, scroll-reveal, hero zoom, studio slider). One file.
│   └── views/
│       ├── components/
│       │   ├── layout.blade.php   ← <x-layout> master shell (head, SEO, JSON-LD, nav, footer)
│       │   └── book.blade.php      ← <x-book> "Book a chair" CTA button (see §7 booking_url)
│       ├── partials/
│       │   ├── nav.blade.php
│       │   ├── footer.blade.php
│       │   └── home/*.blade.php    ← home page sections (hero, marquee, statement, menu,
│       │                             work, studio, about, products, gift, reviews, visit)
│       ├── home.blade.php          ← @includes the home/ partials in order
│       ├── services.blade.php      ← price list, image-per-category (map at top of file)
│       ├── gallery.blade.php       ← "The Work" — reads config('salon.gallery')
│       ├── products.blade.php      ← "Shop"
│       ├── gift-cards.blade.php
│       ├── about.blade.php
│       └── visit.blade.php
└── public/images/              ← all served images (webp). gallery/ subfolder = The Work photos
```

### 4.1 Routes → pages
| URL | name | Controller method | View |
|---|---|---|---|
| `/` | home | `home()` | `home.blade.php` |
| `/services` | services | `services()` | `services.blade.php` |
| `/the-work` | gallery | `gallery()` | `gallery.blade.php` |
| `/shop` | products | `products()` | `products.blade.php` |
| `/gift-cards` | giftcards | `giftcards()` | `gift-cards.blade.php` |
| `/about` | about | `about()` | `about.blade.php` |
| `/visit` | visit | `visit()` | `visit.blade.php` |
| `/sitemap.xml` | sitemap | `sitemap()` | (XML, controller-backed) |
| `/robots.txt` | — | `robots()` | (text, controller-backed) |

> SEO endpoints are controller-backed on purpose so `php artisan route:cache` works in production.

---

## 5. Design system (match this exactly for any new UI)

Defined as CSS variables at the top of `resources/css/app.css`:

```css
--ground:    #F2DBE1;   /* page background (baby pink) */
--surface:   #F7E6EA;   /* raised surface */
--surface-2: #ECD0D8;
--ink:       #3E2A31;   /* primary text */
--ink-soft:  #86636D;   /* secondary text */
--ink-faint: #B8969F;
--line:      #EFD6DD;   /* hairlines */
--accent:    #B0862F;   /* gold accent (eyebrows, links) */
--container: 1260px;
```

- **Fonts:** headings (`h1–h3`) use `--font-display` **Playfair Display** (weight 400, high-contrast serif); body uses `--font-body` **Instrument Sans**. Both self-hosted (do NOT add Google Fonts `<link>`s — fonts come through Vite/Bunny in `vite.config.js`).
- **Gold headings:** add class `.gold` to a display heading to get the metallic-gold gradient text. (It has a `padding-bottom` fix to avoid descender clipping — keep that.)
- **Section label:** `.eyebrow` (uppercase, letter-spaced, gold).
- **Reveal on scroll:** add class `.reveal` (or `.stagger`) to any element — `app.js` IntersectionObserver fades it in.
- **Images:** premium look uses `.cover` (absolute, `object-fit:cover`) inside a fixed-ratio box; rounded corners + `--shadow`.
- **CTA button:** always use the `<x-book />` component for "Book a chair" (never hardcode the link — see §7).

---

## 6. What's DONE (page by page)

**All pages built, styled, responsive, and live-verified.** Highlights:

- **Home** (`home.blade.php` + `partials/home/*`):
  - **Cinematic scroll-zoom hero** — a sticky 150vh stage; on scroll it does one continuous zoom that crossfades through several interior salon views (wide → closer → inside), then hands off to the next section; copy fades out near the end. Logic is block 3 in `app.js`; markup in `partials/home/hero.blade.php`. Respects `prefers-reduced-motion`.
    - ⚠️ Known limitation: we only have **interior** photos, so the hero is a crossfade-zoom of interior views. The client wanted a literal "street → walk into salon → inside" journey (ref: a barber-shop TikTok). That needs an actual **exterior/walk-in video or exterior photos** from the client — not yet provided.
  - Marquee, statement, service menu, work teaser, **"Inside the studio" = luxury slider** (swipe on touch + prev/next arrows; scroll-snap; block 4 in `app.js`), about, products, gift, reviews, visit.
  - The old **home video section was removed** (per client).
- **Services** (`services.blade.php`): premium price list. Split hero + one **alternating image-per-category** layout. Category → image map is a `$catImg` array at the **top of the file**. Categories: women, men, kids, colour, treatments, styling, packages. Each pulls from `config('salon.pricelist')`. "Good to know" infobox + "Why us" feature section + CTA.
  - Category order (locked by client): **Women → Colour → Treatments → Styling → Men → Kids → Packages**.
  - Recent: added Perm + Chemical straightening rows to Treatments; Colour "Additional colour" shows `$15+`.
  - Each of the 5 main categories now uses a **dedicated high-res photo**: `svc-women / svc-men / svc-colour / svc-treatments / svc-styling .webp` (retina, max 1400px). Kids & Packages still use `salon-window` / `salon-arched-row`.
- **The Work** (`gallery.blade.php`): grid of results, grouped into 3 categories (colour / smoothing / updos) via `config('salon.gallery')` (`g01`–`g24` in `public/images/gallery/`). 11 of the 24 photos were recently replaced with client-supplied privacy-edited (background-softened) versions.
- **Shop, Gift Cards, About, Visit:** all built and linked in nav + footer.
  - Gift Cards: real logo used; "Purchase a gift" button removed — only "Enquire in salon" remains.
  - Visit: email = `contact@classiccutsandcolors.com.au`; hours show "Mon to Wed: 9am – 5pm".
- **SEO/perf done:** HairSalon JSON-LD schema, OG tags, dynamic `sitemap.xml` + `robots.txt`, WebP images, lazy loading, width/height on imgs, `fetchpriority` on hero, minified assets via Vite.

See `git log` for the full history — commit messages are descriptive.

---

## 7. Conventions & rules to follow (important)

1. **Content goes in `config/salon.php`, not hardcoded in views.** If you add a price, a gallery image, a review, etc., add it to the config and let the Blade loop render it.
2. **One CSS file (`app.css`), one JS file (`app.js`).** Keep the design-token system; reuse existing component classes before inventing new ones. Match the surrounding code style.
3. **JS must stay tiny and library-free**, progressive (page works with JS off).
4. **"Book a chair" links** come from `config('salon.booking_url')` via the `<x-book />` component. It reads env `SALON_BOOKING_URL`. **Currently `null` → falls back to `/visit`.** When the client gives their real booking link, set `SALON_BOOKING_URL` in `.env` (and in Render env vars) — no code change needed.
5. **Images:** convert to **WebP**, keep them reasonably sized (gallery = 640×853; service category = ~1400px long side), `loading="lazy"` except above-the-fold. Original/source images are kept under `../data/img/` (outside the repo).
6. **After editing CSS/JS → `npm run build`.** After editing Blade/config → just refresh. (See §3.)
7. Don't add a dark mode. Don't add Google Fonts `<link>`s. Don't introduce a JS framework.

---

## 8. Deploy

- **Hosting:** Render.com, Docker runtime, `render.yaml` blueprint in repo. `Dockerfile` builds FrankenPHP (PHP 8.4) + runs `npm install && npm run build`.
- **To deploy:** push to `main` → Render auto-builds & redeploys.
  ```bash
  git push origin main
  ```
- Env on Render: `APP_KEY`, `APP_URL` are set in the Render dashboard (not synced from repo). `SALON_BOOKING_URL` should be added there once known.
- **Known deploy gotchas already solved (don't re-break):**
  - Dockerfile strips file capabilities off the `frankenphp` binary (Render/gVisor rejects caps → "Operation not permitted" 126). Keep that `RUN cp ... ` step.
  - `AppServiceProvider` forces HTTPS + `trustProxies(at:'*')` in production (fixes mixed-content on Render). Keep it.
  - Dockerfile uses `npm install` (not `npm ci`) to allow the rolldown win/linux binding to resolve.

---

## 9. PENDING / TODO (start here)

1. **⚠️ Unpushed local commits.** The last few commits (studio slider, The Work photo swap, Services category photos) are committed **locally** — confirm they're pushed:
   ```bash
   git push origin main
   ```
   The live site won't show the latest work until this is pushed.
2. **The Work — 3 leftover images** the client supplied that did NOT match any existing gallery photo (different clothing/pose than anything on the site): a standing long-wavy-hair coat shot, a black-hoodie side shot, and a polka-dot-top shot. **Decision needed from client:** add them as NEW gallery items, replace specific slots, or drop them. (Source files are in `../data/img/blur images/`.)
3. **Services — Kids & Packages** categories still use generic salon photos; no dedicated photo was supplied. Ask client if they want specific ones.
4. **Booking link:** get the client's real booking URL → set `SALON_BOOKING_URL`. Until then all CTAs fall back to `/visit`.
5. **Hero "street→salon→inside" effect:** only achievable literally if the client provides an **exterior/walk-in video or exterior photos**. Current hero is the best crossfade-zoom possible with interior-only photos.
6. **Staging:** none provisioned yet (Dev + Prod only).

---

## 10. Quick reference — where things live

| I want to change... | Edit this |
|---|---|
| Any text/price/hours/address/reviews | `config/salon.php` |
| Colors, spacing, any component style | `resources/css/app.css` → then `npm run build` |
| Scroll/interaction behaviour | `resources/js/app.js` → then `npm run build` |
| Page layout/markup | the matching `resources/views/*.blade.php` |
| Home sections & order | `resources/views/home.blade.php` + `partials/home/` |
| Which photo a Services category shows | `$catImg` map at top of `resources/views/services.blade.php` |
| The Work photos | `public/images/gallery/g01–g24.webp` + `config('salon.gallery')` |
| "Book a chair" destination | env `SALON_BOOKING_URL` (via `<x-book />`) |
| Nav / footer links | `resources/views/partials/nav.blade.php` / `footer.blade.php` |

---

*Handoff generated 2026-08-26. If anything here disagrees with the code, the code wins — but please update this file.*
