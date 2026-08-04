{{-- Fixed site header. Transparent over the hero, solid on sub-pages (see $solid). --}}
<nav class="nav {{ ($solid ?? false) ? 'nav--solid' : '' }}" id="nav">
    <a href="{{ route('home') }}" class="nav__brand" aria-label="Classic Cuts &amp; Colors — home">
        <img class="nav__logo" src="{{ asset('images/logo.png') }}" alt="Classic Cuts &amp; Colors" width="256" height="88">
    </a>

    <div class="nav__links">
        <a href="{{ route('about') }}" @class(['is-active' => request()->routeIs('about')])>About</a>
        <a href="{{ route('gallery') }}" @class(['is-active' => request()->routeIs('gallery')])>The Work</a>
    </div>

    <x-book />
</nav>
