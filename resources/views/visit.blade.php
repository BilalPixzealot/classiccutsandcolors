@php $salon = config('salon'); $a = $salon['address']; @endphp

<x-layout
    title="Visit"
    solid-nav
    description="Visit Classic Cuts & Colors inside Eltham Village Shopping Centre, three shops from Coles, with undercover parking. Address, hours and contact details.">

    <section class="pagehead">
        <div class="container">
            <p class="eyebrow">Visit us</p>
            <h1 class="gold pagehead__title">Come and see us.</h1>
            <p class="pagehead__lead">You'll find us inside Eltham Village Shopping Centre, three shops from Coles, with undercover parking right at the door.</p>
        </div>
    </section>

    <section class="band" style="padding-top:clamp(20px,4vh,50px)">
        <div class="container split">
            <div class="split__media reveal">
                <iframe class="map"
                        src="https://maps.google.com/maps?q={{ urlencode($a['line2'] . ', ' . $a['locality'] . ' ' . $a['region'] . ' ' . $a['postcode']) }}&output=embed"
                        title="Map to Classic Cuts &amp; Colors, Eltham" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="reveal">
                <p class="eyebrow">Find us</p>
                <h2>In the heart of Eltham Village.</h2>
                <div class="visit__info">
                    <div class="vrow"><span>Where</span><b>{{ $a['line1'] }}<br>{{ $a['line2'] }}, {{ $a['locality'] }} {{ $a['region'] }} {{ $a['postcode'] }}</b></div>
                    <div class="vrow"><span>Parking</span><b>Undercover parking, three shops from Coles</b></div>
                    <div class="vrow"><span>Phone</span><b><a href="tel:{{ $salon['phone_tel'] }}">{{ $salon['phone'] }}</a></b></div>
                    <div class="vrow"><span>Email</span><b><a href="mailto:{{ $salon['email'] }}">{{ $salon['email'] }}</a></b></div>
                    <div class="vrow"><span>Hours</span><b>@foreach ($salon['hours']['display'] as $days => $time){{ $days }}: {{ $time }}@if (!$loop->last)<br>@endif @endforeach</b></div>
                </div>
                <div class="hero__actions" style="margin-top:26px">
                    <x-book />
                    <a href="tel:{{ $salon['phone_tel'] }}" class="btn btn--ghost">Call {{ $salon['phone'] }}</a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
