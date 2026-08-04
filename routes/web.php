<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public site routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/the-work', [PageController::class, 'gallery'])->name('gallery');
Route::get('/shop', [PageController::class, 'products'])->name('products');
Route::get('/gift-cards', [PageController::class, 'giftcards'])->name('giftcards');
Route::get('/visit', [PageController::class, 'visit'])->name('visit');

// SEO endpoints (controller-backed so `php artisan route:cache` works in production).
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [PageController::class, 'robots']);
