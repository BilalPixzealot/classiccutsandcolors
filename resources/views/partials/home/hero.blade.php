@php $salon = config('salon'); @endphp

<header class="hero" id="top">
    {{-- Above-the-fold hero image: eager + high priority for a fast LCP. --}}
    <img class="hero__photo cover"
         src="{{ asset('images/salon-mirror-bar.webp') }}"
         alt="Interior of Classic Cuts &amp; Colors hair salon in Eltham"
         width="1448" height="1086" fetchpriority="high">
    <div class="hero__scrim" aria-hidden="true"></div>
    <div class="grain" aria-hidden="true"></div>

    <div class="hero__inner">
        <div class="container">
            <p class="eyebrow hero__eyebrow load">{{ $salon['tagline'] }}</p>

            <h1 class="hero__title">
                <span class="load d1" style="display:block">Cut clean,</span>
                <span class="ital load d2">coloured to last.</span>
            </h1>

            <div class="hero__row">
                <p class="hero__lead load d3">A modern Eltham salon for every head of hair: men, women, young adults and kids. Expert colour, considered cuts, and organic JUUCE care.</p>
                <div class="hero__meta load d4">
                    <span><i class="dot"></i> 3 shops from Coles</span>
                    <span><i class="dot"></i> Undercover parking</span>
                </div>
            </div>

            <div class="hero__actions load d5">
                <a href="tel:{{ $salon['phone_tel'] }}" class="btn">Book a chair</a>
                <a href="#services" class="btn btn--ghost">See the price list</a>
            </div>
        </div>
    </div>
</header>
