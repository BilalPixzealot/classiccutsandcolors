@php
    // Intrinsic image sizes (prevents layout shift / satisfies Lighthouse).
    $dim = ['brand-juuce' => [800, 1208], 'brand-pure' => [800, 1158], 'brand-sarah' => [454, 341]];
@endphp

<section class="band" id="products">
    <div class="container">
        <div class="sechead reveal">
            <div>
                <p class="eyebrow">The retail edit</p>
                <h2>Take the salon home.</h2>
            </div>
            <p>Salon-quality care from the brands we trust: Juuce, Pure and Sarah. Organic, colour-safe, and always available in salon.</p>
        </div>

        <div class="brandgrid stagger">
            @foreach (config('salon.brands') as $brand)
                <div class="brand">
                    <img class="cover"
                         src="{{ asset('images/' . $brand['img'] . '.webp') }}"
                         alt="{{ $brand['name'] }} hair care range"
                         width="{{ $dim[$brand['img']][0] }}" height="{{ $dim[$brand['img']][1] }}"
                         loading="lazy">
                    <div class="brand__body">
                        <h3>{{ $brand['name'] }}</h3>
                        <p>{{ $brand['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
