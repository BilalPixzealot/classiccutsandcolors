<?php

namespace App\Http\Controllers;

/**
 * Serves the public marketing pages. Thin by design — all content lives in
 * config/salon.php and the Blade views, so there is no business logic here.
 */
class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function giftcards()
    {
        return view('gift-cards');
    }

    public function visit()
    {
        return view('visit');
    }

    public function products()
    {
        return view('products');
    }

    public function gallery()
    {
        return view('gallery');
    }

    /** XML sitemap — URLs stay in sync with the named routes. */
    public function sitemap()
    {
        $urls = [
            route('home'), route('services'), route('about'),
            route('gallery'), route('products'), route('giftcards'), route('visit'),
        ];
        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
              . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($urls as $url) {
            $xml .= '<url><loc>' . e($url) . '</loc><changefreq>monthly</changefreq></url>';
        }
        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }

    /** robots.txt — dynamic so the Sitemap line is always an absolute URL. */
    public function robots()
    {
        $body = "User-agent: *\nAllow: /\n\nSitemap: " . url('/sitemap.xml') . "\n";

        return response($body, 200, ['Content-Type' => 'text/plain']);
    }
}
