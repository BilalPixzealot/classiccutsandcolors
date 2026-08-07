<x-layout
    title="Services & Pricing"
    solid-nav
    description="Full price list for Classic Cuts & Colors, Eltham: women's, men's and kids' cuts, colour, foils, balayage, smoothing treatments (Nanoplasty, Hair Botox, keratin), styling and packages.">

    <section class="pagehead">
        <div class="container">
            <p class="eyebrow">Services &amp; pricing</p>
            <h1 class="gold pagehead__title">The menu.</h1>
            <p class="pagehead__lead">Affordable, honest pricing across cuts, colour, smoothing treatments and everything after. Colour and smoothing services begin with a complimentary consultation, so we get it right for your hair.</p>
            <div class="chips">
                <a class="chip is-active" href="#top">All</a>
                @foreach (config('salon.pricelist') as $cat)
                    <a class="chip" href="#{{ $cat['id'] }}">{{ $cat['chip'] }}</a>
                @endforeach
            </div>
        </div>
    </section>

    @foreach (config('salon.pricelist') as $cat)
        <section class="svc-cat" id="{{ $cat['id'] }}">
            <div class="container">
                <div class="svc-cat__head reveal">
                    <h2>{{ $cat['group'] }}</h2>
                </div>

                @if (count($cat['subs']) === 1 && empty($cat['subs'][0]['title']))
                    {{-- Single, untitled group → two-column rows --}}
                    <div class="rows2 reveal">
                        @foreach ($cat['subs'][0]['rows'] as $row)
                            <div class="pricerow"><span class="name">{{ $row[0] }}</span><span class="price">{{ $row[1] }}</span></div>
                        @endforeach
                    </div>
                @else
                    <div class="svc-subs">
                        @foreach ($cat['subs'] as $sub)
                            <div class="svc-sub reveal">
                                @if (!empty($sub['title']))
                                    <h3 class="svc-sub__title">{{ $sub['title'] }}</h3>
                                @endif
                                @foreach ($sub['rows'] as $row)
                                    <div class="pricerow"><span class="name">{{ $row[0] }}</span><span class="price">{{ $row[1] }}</span></div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endforeach

    <section class="band" style="padding-top:clamp(30px,5vh,60px)">
        <div class="container">
            <div class="infobox reveal">
                <h3>Good to know</h3>
                <ul>
                    <li>Complimentary consultations are included with all colour and smoothing treatments to ensure the best results for your hair.</li>
                    <li>A $5 Saturday surcharge applies to all bills, including products and services.</li>
                </ul>
            </div>
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
