<x-layout
    title="The Work"
    solid-nav
    description="Colour, smoothing and styling results from Classic Cuts & Colors, Eltham. Balayage, Nanoplasty, Hair Botox, keratin and updos.">

    @php $eyebrows = ['colour' => 'Colour', 'smoothing' => 'Smoothing & straightening', 'updos' => 'Styling & updos']; @endphp

    <section class="pagehead">
        <div class="container">
            <p class="eyebrow">Our work</p>
            <h1 class="gold pagehead__title">The work.</h1>
            <p class="pagehead__lead">Real results from our chairs: colour that grows out beautifully, smoothing treatments that tame the frizz, and finishing worth showing off. A glimpse of what walks out our door.</p>
            <div class="chips">
                <a class="chip is-active" href="#top">All work</a>
                <a class="chip" href="#colour">Colour</a>
                <a class="chip" href="#smoothing">Smoothing &amp; straightening</a>
                <a class="chip" href="#updos">Styling &amp; updos</a>
            </div>
        </div>
    </section>

    @foreach (config('salon.gallery_categories') as $key => $cat)
        <section class="catblock" id="{{ $key }}">
            <div class="container">
                <div class="bhead reveal">
                    <div>
                        <p class="eyebrow">{{ $eyebrows[$key] }}</p>
                        <h2>{{ $cat['label'] }}</h2>
                    </div>
                    <p>{{ $cat['blurb'] }}</p>
                </div>
                <div class="gwall">
                    @foreach (collect(config('salon.gallery'))->where('cat', $key) as $item)
                        <figure>
                            <img src="{{ asset('images/gallery/' . $item['img'] . '.webp') }}"
                                 alt="{{ $item['cap'] }} — hair by Classic Cuts &amp; Colors" loading="lazy">
                            <figcaption>{{ $item['cap'] }}</figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

    <section class="ctaband">
        <div class="container">
            <p class="eyebrow">Your turn</p>
            <h2 class="gold">Let's create yours.</h2>
            <p>Book a chair and tell us what you're after: colour, a smoothing treatment, or a fresh cut.</p>
            <a href="tel:{{ config('salon.phone_tel') }}" class="btn">Book a chair · {{ config('salon.phone') }}</a>
            <p class="note">A selection of recent work, with more added all the time. Photos shared with our clients' permission.</p>
        </div>
    </section>
</x-layout>
