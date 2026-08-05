{{-- Fixed site header. Transparent over the hero, solid on sub-pages (see $solid). --}}
<nav class="nav {{ ($solid ?? false) ? 'nav--solid' : '' }}" id="nav">
    <a href="{{ route('home') }}" class="nav__brand" aria-label="Classic Cuts &amp; Colors — home">
        <img class="nav__logo" src="{{ asset('images/logo.png') }}" alt="Classic Cuts &amp; Colors" width="256" height="88">
    </a>

    {{-- Full menu shown, but only About & The Work are linked for now. --}}
    <div class="nav__links">
        <a href="{{ route('services') }}" @class(['is-active' => request()->routeIs('services')])>Services</a>
        <a href="{{ route('gallery') }}" @class(['is-active' => request()->routeIs('gallery')])>The Work</a>
        <a href="{{ route('about') }}" @class(['is-active' => request()->routeIs('about')])>About</a>
        <a href="{{ route('products') }}" @class(['is-active' => request()->routeIs('products')])>Shop</a>
        <span class="nav__na">Gift Cards</span>
        <span class="nav__na">Visit</span>
    </div>

    <x-book />
</nav>
