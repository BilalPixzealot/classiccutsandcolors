@php $salon = config('salon'); $a = $salon['address']; @endphp

<section class="band" id="visit">
    <div class="container visit">
        <div class="reveal">
            <p class="eyebrow">Come in</p>
            <h2>Ready when you are.</h2>
            <div class="hero__actions" style="margin-top:8px">
                <a href="tel:{{ $salon['phone_tel'] }}" class="btn">Book a chair</a>
                <a href="tel:{{ $salon['phone_tel'] }}" class="btn btn--ghost">Call {{ $salon['phone'] }}</a>
            </div>
        </div>

        <div class="visit__info reveal">
            <div class="vrow"><span>Where</span><b>{{ $a['line1'] }}<br>{{ $a['line2'] }}, {{ $a['locality'] }} {{ $a['region'] }} {{ $a['postcode'] }} · undercover parking</b></div>
            <div class="vrow"><span>Phone</span><b><a href="tel:{{ $salon['phone_tel'] }}">{{ $salon['phone'] }}</a></b></div>
            <div class="vrow"><span>Hours</span><b>Mon–Wed 9–5 · Thu 9–5:30<br>Fri 9–5 · Sat 9–4 · Sun closed</b></div>
            <div class="vrow"><span>Booking</span><b>Reserve your appointment online or contact our team for personalised scheduling.</b></div>
        </div>
    </div>
</section>
