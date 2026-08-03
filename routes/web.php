<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public site routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/shop', [PageController::class, 'products'])->name('products');
Route::get('/the-work', [PageController::class, 'gallery'])->name('gallery');

// SEO endpoints (controller-backed so `php artisan route:cache` works in production).
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [PageController::class, 'robots']);
