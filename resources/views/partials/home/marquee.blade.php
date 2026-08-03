{{-- Decorative treatment ticker. Duplicated once for a seamless CSS loop. --}}
<div class="marquee" aria-hidden="true">
    <div class="marquee__track">
        @foreach (array_merge(config('salon.marquee'), config('salon.marquee')) as $term)
            <span>{{ $term }}</span>
        @endforeach
    </div>
</div>
