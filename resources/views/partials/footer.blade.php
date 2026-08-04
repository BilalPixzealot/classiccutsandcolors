@php $salon = config('salon'); @endphp

<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <img class="footer__logo" src="{{ asset('images/logo.png') }}" alt="Classic Cuts &amp; Colors" width="256" height="88">

            <div class="footer__cols">
                <div class="footer__col">
                    <h4>Explore</h4>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('gallery') }}">The Work</a>
                </div>

                <div class="footer__col">
                    <h4>Visit</h4>
                    <p>{{ $salon['address']['line1'] }}</p>
                    <p>{{ $salon['address']['line2'] }}, {{ $salon['address']['locality'] }} {{ $salon['address']['region'] }} {{ $salon['address']['postcode'] }}</p>
                    <p>Undercover parking</p>
                </div>

                <div class="footer__col">
                    <h4>Hours</h4>
                    @foreach ($salon['hours']['display'] as $days => $time)
                        <p>{{ $days }}: {{ $time }}</p>
                    @endforeach
                </div>

                <div class="footer__col">
                    <h4>Contact</h4>
                    <a href="tel:{{ $salon['phone_tel'] }}">{{ $salon['phone'] }}</a>
                    <p>{{ $salon['locality'] ?? 'Eltham' }}, Victoria</p>
                </div>
            </div>
        </div>

        <div class="footer__bar">
            <span>&copy; {{ date('Y') }} {{ $salon['name'] }}, Eltham VIC</span>
            <span>Hair for all of Eltham · cuts, colour &amp; care</span>
        </div>
    </div>
</footer>
