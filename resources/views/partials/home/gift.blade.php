<section class="band" id="gift">
    <div class="container gift">
        <div class="reveal">
            <p class="eyebrow">Gift Cards</p>
            <h2>The gift of good hair.</h2>
            <p>Treat someone to the salon: a cut, a colour, or simply credit to spend however they like. Beautifully presented, ready in minutes, and always a welcome surprise.</p>
            <div class="hero__actions" style="margin-top:4px">
                <x-book label="Purchase a gift" />
                <a href="{{ route('visit') }}" class="btn btn--ghost">Enquire in salon</a>
            </div>
        </div>

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
    </div>
</section>
