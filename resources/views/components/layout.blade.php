@props([
    'title' => null,
    'description' => null,
    'solidNav' => false,
])

@php
    $salon = config('salon');
    $pageTitle   = $title
        ? $title . ' — ' . $salon['name']
        : $salon['name'] . ' — Eltham Hair Salon, Colour & Smoothing Specialists';
    $metaDesc    = $description
        ?? 'A modern Eltham hair salon for cuts, expert colour and balayage, plus smoothing treatments (Nanoplasty, Hair Botox, keratin). Family friendly, undercover parking. Book your chair today.';
    $ogImage     = asset('images/salon-mirror-bar.webp');
    $canonical   = url()->current();

    // schema.org HairSalon structured data (rich results / local SEO).
    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'HairSalon',
        'name'     => $salon['name'],
        'image'    => $ogImage,
        'url'      => url('/'),
        'telephone'=> $salon['phone_e164'],
        'email'    => $salon['email'],
        'priceRange' => '$$',
        'address'  => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => $salon['address']['line1'] . ', ' . $salon['address']['line2'],
            'addressLocality' => $salon['address']['locality'],
            'addressRegion'   => $salon['address']['region'],
            'postalCode'      => $salon['address']['postcode'],
            'addressCountry'  => $salon['address']['country'],
        ],
        'openingHoursSpecification' => collect($salon['hours']['spec'])->map(fn ($s) => [
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => $s['days'],
            'opens'     => $s['opens'],
            'closes'    => $s['closes'],
        ])->all(),
        'aggregateRating' => [
            '@type'       => 'AggregateRating',
            'ratingValue' => $salon['rating']['value'],
            'reviewCount' => $salon['rating']['count'],
        ],
    ];
@endphp

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#F2DBE1">

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $metaDesc }}">
    <link rel="canonical" href="{{ $canonical }}">

    {{-- Open Graph / social sharing --}}
    <meta property="og:type" content="business.business">
    <meta property="og:site_name" content="{{ $salon['name'] }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDesc }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    {{-- Structured data for Google (local business rich results) --}}
    <script type="application/ld+json">@json($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('partials.nav', ['solid' => $solidNav])

    <main>
        {{ $slot }}
    </main>

    @include('partials.footer')
</body>
</html>
