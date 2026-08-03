<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public site routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/shop', [PageController::class, 'products'])->name('products');
Route::get('/the-work', [PageController::class, 'gallery'])->name('gallery');

// SEO: XML sitemap (kept in-code so URLs stay in sync with named routes).
Route::get('/sitemap.xml', function () {
    $urls = [route('home'), route('products'), route('gallery')];
    $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
          . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($urls as $url) {
        $xml .= '<url><loc>' . e($url) . '</loc><changefreq>monthly</changefreq></url>';
    }
    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

// SEO: robots.txt (dynamic so the Sitemap line is always an absolute URL).
Route::get('/robots.txt', function () {
    $body = "User-agent: *\nAllow: /\n\nSitemap: " . url('/sitemap.xml') . "\n";

    return response($body, 200, ['Content-Type' => 'text/plain']);
});
