@php $salon = config('salon'); @endphp

{{-- Hero. The tall section gives scroll room; the sticky stage stays pinned
     while the camera "travels in" — a continuous zoom that crossfades through
     a few salon views (wide → closer → inside). See app.js hero scroll-zoom. --}}
<header class="hero" id="top">
    <div class="hero__stage">
        <div class="hero__media">
            <img class="hero__layer" src="{{ asset('images/salon-arched-row.webp') }}"
                 alt="Interior of Classic Cuts &amp; Colors hair salon in Eltham"
                 width="1429" height="1101" fetchpriority="high">
            <img class="hero__layer" src="{{ asset('images/salon-mirror-bar.webp') }}"
                 alt="" width="1448" height="1086" loading="lazy">
            <img class="hero__layer" src="{{ asset('images/salon-window.webp') }}"
                 alt="" width="1000" height="1333" loading="lazy">
        </div>
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
                    <x-book />
                    <a href="{{ route('services') }}" class="btn btn--ghost">See the price list</a>
                </div>
            </div>
        </div>

        <div class="hero__scroll" aria-hidden="true"></div>
    </div>
</header>
