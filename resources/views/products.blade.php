<x-layout
    title="Products"
    solid-nav
    description="Salon-quality hair care from Juuce, Pure and Sarah K, available in salon at Classic Cuts & Colors, Eltham.">

    <section class="pagehead">
        <div class="container">
            <p class="eyebrow">Retail · Take-home care</p>
            <h1 class="gold pagehead__title">The retail edit.</h1>
            <p class="pagehead__lead">Salon-quality hair care from the brands we trust. Take home the same products your stylist uses: organic, colour-safe and made to keep your cut and colour looking fresh. Full range and pricing available in salon.</p>
            <div class="chips">
                <a class="chip is-active" href="#top">All brands</a>
                @foreach (config('salon.shop') as $brand)
                    <a class="chip" href="#{{ $brand['id'] }}">{{ $brand['name'] }}</a>
                @endforeach
            </div>
        </div>
    </section>

    @foreach (config('salon.shop') as $brand)
        <section class="catblock" id="{{ $brand['id'] }}">
            <div class="container">
                <div class="bhead reveal">
                    <div>
                        <p class="eyebrow">{{ $brand['eyebrow'] }}</p>
                        <h2>{{ $brand['name'] }}</h2>
                    </div>
                    <p>{{ $brand['tag'] }}</p>
                </div>
                <div class="pgrid stagger">
                    @foreach ($brand['products'] as $i => $product)
                        <article class="pcard">
                            @if (!empty($product['img']))
                                <div class="pcard__img pcard__img--photo">
                                    <img src="{{ asset('images/' . $product['img'] . '.webp') }}" alt="{{ $product['name'] }} by {{ $brand['name'] }}" width="700" height="700" loading="lazy">
                                </div>
                            @else
                                <div class="pcard__img t{{ ($i % 4) + 1 }}"></div>
                            @endif
                            <div class="pcard__b">
                                <h3>{{ $product['name'] }}</h3>
                                <p>{{ $product['desc'] }}</p>
                                <span class="pcard__meta">Available in salon</span>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

    <section class="ctaband">
        <div class="container">
            <p class="eyebrow">Come in</p>
            <h2 class="gold">Not sure what suits your hair?</h2>
            <p>Ask your stylist and we'll match you to the right products for your cut, colour and routine.</p>
            <a href="tel:{{ config('salon.phone_tel') }}" class="btn">Call {{ config('salon.phone') }}</a>
            <p class="note">Product names are a preview of the ranges we stock. The full catalogue and pricing are always available to browse in salon.</p>
        </div>
    </section>
</x-layout>
