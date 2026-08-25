<section class="band" id="studio">
    <div class="container">
        <div class="sechead sechead--center reveal">
            <p class="eyebrow">The space</p>
            <h2>Inside the studio</h2>
        </div>
    </div>

    {{-- Luxury slider — swipe on touch, arrows on desktop (see app.js). --}}
    <div class="studio-slider reveal">
        <button class="slider__nav slider__prev" type="button" aria-label="Previous image">&lsaquo;</button>

        <div class="slider__track">
            <figure class="slide">
                <img src="{{ asset('images/salon-window.webp') }}" alt="Styling station by the window" width="1000" height="1333" loading="lazy">
                <figcaption>By the window</figcaption>
            </figure>
            <figure class="slide">
                <img src="{{ asset('images/salon-mirror-bar.webp') }}" alt="Row of arched-mirror styling stations" width="1448" height="1086" loading="lazy">
                <figcaption>The mirror bar</figcaption>
            </figure>
            <figure class="slide">
                <img src="{{ asset('images/salon-stations.webp') }}" alt="Styling stations and product shelves" width="891" height="1766" loading="lazy">
                <figcaption>Styling stations</figcaption>
            </figure>
            <figure class="slide">
                <img src="{{ asset('images/salon-arched-row.webp') }}" alt="Arched-mirror row with backlit shelving" width="1429" height="1101" loading="lazy">
                <figcaption>Arched-mirror row</figcaption>
            </figure>
        </div>

        <button class="slider__nav slider__next" type="button" aria-label="Next image">&rsaquo;</button>
    </div>
</section>
