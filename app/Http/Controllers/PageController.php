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

    public function products()
    {
        return view('products');
    }

    public function gallery()
    {
        return view('gallery');
    }
}
