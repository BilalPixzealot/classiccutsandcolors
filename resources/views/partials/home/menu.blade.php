<section class="band" id="services">
    <div class="container">
        <div class="sechead reveal">
            <h2>The Menu</h2>
            <p>Affordable, honest pricing across cuts, colour and everything after. Full price list in salon.</p>
        </div>

        <div class="svc-list stagger">
            @foreach (config('salon.services') as $service)
                <a class="svc" href="tel:{{ config('salon.phone_tel') }}">
                    <span class="svc__swatch {{ $service['swatch'] }}"></span>
                    <span class="svc__name">{{ $service['name'] }}</span>
                    <span class="svc__desc">{{ $service['desc'] }}</span>
                    <span class="svc__price tnum">from <b>${{ $service['from'] }}</b></span>
                </a>
            @endforeach
        </div>

        <p class="menu-note reveal">Please note: a <b>$5 Saturday surcharge</b> applies to all bills, including products and services.</p>
    </div>
</section>
