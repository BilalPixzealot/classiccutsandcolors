<x-layout
    title="Gift Cards"
    solid-nav
    description="Gift cards for Classic Cuts & Colors, Eltham. Treat someone to a cut, colour or salon credit. Beautifully presented and redeemable on any service or product.">

    <section class="pagehead">
        <div class="container">
            <p class="eyebrow">Gift Cards</p>
            <h1 class="gold pagehead__title">The gift of good hair.</h1>
            <p class="pagehead__lead">Treat someone to the salon: a cut, a colour, or simply credit to spend however they like. Beautifully presented, ready in minutes, and always a welcome surprise.</p>
        </div>
    </section>

    <section class="band" style="padding-top:clamp(20px,4vh,50px)">
        <div class="container split">
            <div class="gift__stage reveal" aria-hidden="true">
                <div class="giftcard gc-back">
                    <div class="gc-top"><img class="gc-logo gc-logo--sm" src="{{ asset('images/logo.png') }}" alt=""><span class="gc-chip"></span></div>
                    <div><div class="gc-label">Gift Card</div></div>
                </div>
                <div class="giftcard gc-front">
                    <div class="gc-top">
                        <img class="gc-logo" src="{{ asset('images/logo.png') }}" alt="Classic Cuts &amp; Colors">
                        <span class="gc-chip"></span>
                    </div>
                    <div>
                        <div class="gc-label">The gift of good hair</div>
                        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-top:8px">
                            <span class="gc-amt">$100</span>
                            <span class="gc-name">Eltham</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reveal">
                <p class="eyebrow">Any amount</p>
                <h2>Choose an amount, we'll do the rest.</h2>
                <p>Gift cards can be used on any service or take-home product in salon. Pop in or get in touch to purchase one.</p>
                <div class="amounts">
                    @foreach (config('salon.giftcard.amounts') as $amount)
                        <span class="amount tnum">${{ $amount }}</span>
                    @endforeach
                    <span class="amount">Custom</span>
                </div>
                <div class="hero__actions">
                    <x-book label="Purchase a gift" />
                    <a href="{{ route('visit') }}" class="btn btn--ghost">Enquire in salon</a>
                </div>
            </div>
        </div>
    </section>

    <section class="band" style="padding-top:0">
        <div class="container">
            <div class="sechead reveal">
                <h2>How it works</h2>
                <p>Three easy steps to gift great hair.</p>
            </div>
            <div class="steps stagger">
                <div class="step"><b>1</b><h3>Choose an amount</h3><p>Pick a value, or let them spend it however they like.</p></div>
                <div class="step"><b>2</b><h3>Beautifully presented</h3><p>We'll prepare the gift card for you, ready in minutes.</p></div>
                <div class="step"><b>3</b><h3>Redeem in salon</h3><p>Use it on any service or take-home product.</p></div>
            </div>
        </div>
    </section>

    <section class="ctaband">
        <div class="container">
            <p class="eyebrow">Give good hair</p>
            <h2 class="gold">Purchase a gift card.</h2>
            <p>Get in touch and we'll have one ready for you.</p>
            <x-book label="Purchase a gift" />
        </div>
    </section>
</x-layout>
