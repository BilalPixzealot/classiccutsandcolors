@php
    // One image per pricing category (alternates left/right down the page).
    $catImg = [
        'women'      => 'work-balayage',
        'men'        => 'salon-mirror-bar',
        'kids'       => 'salon-window',
        'colour'     => 'work-honey',
        'treatments' => 'work-glass-hair',
        'styling'    => 'work-updo',
        'packages'   => 'salon-arched-row',
    ];
@endphp

<x-layout
    title="Services & Pricing"
    solid-nav
    description="Women's, men's and kids' cuts, colour, foils, balayage, smoothing treatments (Nanoplasty, Hair Botox, keratin), styling and packages at Classic Cuts & Colors, Eltham. Full price list.">

    {{-- Hero — split text + arched image --}}
    <section class="band" style="padding-top:150px">
        <div class="container split">
            <div class="reveal">
                <p class="eyebrow">Services &amp; pricing</p>
                <h1 class="gold" style="font-size:clamp(2.4rem,5.5vw,4.4rem);line-height:1.03;margin:16px 0 22px">Considered hair, honestly priced.</h1>
                <p style="color:var(--ink-soft);max-width:46ch;margin:0 0 28px">From a classic cut to lived-in colour and smoothing treatments, every service begins with a listen, and for colour and smoothing, a complimentary consultation to get it right for your hair.</p>
                <x-book />
            </div>
            <div class="split__media arch reveal">
                <img class="cover" src="{{ asset('images/salon-window.webp') }}" alt="Inside Classic Cuts &amp; Colors salon" width="1000" height="1333" loading="lazy">
            </div>
        </div>
    </section>

    {{-- Price list — each category is an alternating image + list --}}
    <section class="band band--surface" id="pricing">
        <div class="container">
            <div class="sechead sechead--center reveal">
                <p class="eyebrow">The price list</p>
                <h2>Every service, every price.</h2>
            </div>
            <div class="chips" style="justify-content:center;margin:0 0 12px">
                @foreach (config('salon.pricelist') as $cat)
                    <a class="chip" href="#{{ $cat['id'] }}">{{ $cat['chip'] }}</a>
                @endforeach
            </div>
        </div>

        @foreach (config('salon.pricelist') as $cat)
            <div class="svc-cat @if ($loop->iteration % 2 === 0) svc-cat--alt @endif" id="{{ $cat['id'] }}">
                <div class="container">
                    <div class="svc-cat__grid">
                        <div class="svc-cat__media reveal">
                            <img class="cover" src="{{ asset('images/' . $catImg[$cat['id']] . '.webp') }}" alt="{{ $cat['group'] }} at Classic Cuts &amp; Colors" loading="lazy">
                        </div>

                        <div class="svc-cat__body reveal">
                            <div class="svc-cat__head"><h2>{{ $cat['group'] }}</h2></div>

                            @if (count($cat['subs']) === 1 && empty($cat['subs'][0]['title']))
                                <div class="rows2">
                                    @foreach ($cat['subs'][0]['rows'] as $row)
                                        <div class="pricerow"><span class="name">{{ $row[0] }}</span><span class="price">{{ $row[1] }}</span></div>
                                    @endforeach
                                </div>
                            @else
                                <div class="svc-subs">
                                    @foreach ($cat['subs'] as $sub)
                                        <div class="svc-sub">
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
                    </div>
                </div>
            </div>
        @endforeach

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

    {{-- Why us — image + feature list --}}
    <section class="band">
        <div class="container split">
            <div class="split__media arch reveal">
                <img class="cover" src="{{ asset('images/salon-stations.webp') }}" alt="Styling stations at Classic Cuts &amp; Colors" width="891" height="1766" loading="lazy">
            </div>
            <div class="reveal">
                <p class="eyebrow">Why Classic Cuts &amp; Colors</p>
                <h2 style="font-size:clamp(2rem,4.5vw,3.4rem);line-height:1.05;margin-bottom:26px">Expertise you can see and feel.</h2>
                <div class="feature-list">
                    <div class="feature"><span class="feature__mark">&#10022;</span><div><h3>Complimentary consultations</h3><p>Every colour and smoothing service starts with a consult, so the result suits you and your lifestyle.</p></div></div>
                    <div class="feature"><span class="feature__mark">&#10022;</span><div><h3>Organic JUUCE care</h3><p>Australian-made, organic products used in the chair and available to take home.</p></div></div>
                    <div class="feature"><span class="feature__mark">&#10022;</span><div><h3>Experienced &amp; expert</h3><p>A team experienced in cutting, expert in colour and creative in styling for any occasion.</p></div></div>
                    <div class="feature"><span class="feature__mark">&#10022;</span><div><h3>Smoothing specialists</h3><p>Nanoplasty, Hair Botox and formaldehyde-free keratin for smooth, glossy, low-effort hair.</p></div></div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="ctaband">
        <div class="container">
            <p class="eyebrow">Ready?</p>
            <h2 class="gold">Book your chair.</h2>
            <p>Tell us what you're after and we'll take care of the rest.</p>
            <x-book />
        </div>
    </section>
</x-layout>
