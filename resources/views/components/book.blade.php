@props([
    'label' => 'Book a chair',
    'ghost' => false,
])

{{--
    Booking CTA. Points at the client's online booking URL (config salon.booking_url,
    set via SALON_BOOKING_URL env). Until that's provided it falls back to the Visit
    page so the button is always functional. Change the config value once and every
    "Book a chair" across the site updates.
--}}
@php $url = config('salon.booking_url'); @endphp

<a href="{{ $url ?: route('visit') }}"
   @if ($url) target="_blank" rel="noopener" @endif
   {{ $attributes->class(['btn', 'btn--ghost' => $ghost]) }}>{{ $label }}</a>
