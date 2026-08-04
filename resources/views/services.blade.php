<x-layout
    title="Services & Pricing"
    solid-nav
    description="Full price list for Classic Cuts & Colors, Eltham: cuts, colour, foils, balayage, smoothing treatments (Nanoplasty, Hair Botox, keratin), styling and packages.">

    <section class="pagehead">
        <div class="container">
            <p class="eyebrow">Services &amp; pricing</p>
            <h1 class="gold pagehead__title">The menu.</h1>
            <p class="pagehead__lead">Affordable, honest pricing across cuts, colour, smoothing treatments and everything after. Colour and smoothing services begin with a complimentary consultation so we get it right for your hair.</p>
        </div>
    </section>

    <section class="band" style="padding-top:clamp(20px,4vh,50px)">
        <div class="container">
            <div class="pricegroups">
                @foreach (config('salon.pricelist') as $group)
                    <div class="pricegroup reveal">
                        <h3>{{ $group['group'] }}</h3>
                        @foreach ($group['rows'] as $row)
                            <div class="pricerow">
                                <span class="name">{{ $row[0] }}</span>
                                <span class="price">{{ $row[1] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <p class="menu-note" style="margin-top:44px">Please note: a <b>$5 Saturday surcharge</b> applies to all bills, including products and services.</p>
        </div>
    </section>

    <section class="ctaband">
        <div class="container">
            <p class="eyebrow">Ready?</p>
            <h2 class="gold">Book your chair.</h2>
            <p>Tell us what you're after and we'll take care of the rest.</p>
            <x-book />
        </div>
    </section>
</x-layout>
