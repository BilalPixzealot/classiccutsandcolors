{{-- Fixed site header. Transparent over the hero, solidifies on scroll (see app.js). --}}
<nav class="nav" id="nav">
    <a href="#top" class="nav__brand" aria-label="Classic Cuts &amp; Colors — home">
        <img class="nav__logo" src="{{ asset('images/logo.png') }}" alt="Classic Cuts &amp; Colors" width="256" height="88">
    </a>

    {{-- Single-page demo: all nav items scroll within the home page. --}}
    <div class="nav__links">
        <a href="#services">Services</a>
        <a href="#results">The Work</a>
        <a href="#about">About</a>
        <a href="#products">Shop</a>
        <a href="#gift">Gift Cards</a>
        <a href="#visit">Visit</a>
    </div>

    <a href="tel:{{ config('salon.phone_tel') }}" class="btn">Book a chair</a>
</nav>
