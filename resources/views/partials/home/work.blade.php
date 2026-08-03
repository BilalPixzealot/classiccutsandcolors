<section class="band" id="results">
    <div class="container">
        <div class="sechead reveal">
            <div>
                <p class="eyebrow">Our work</p>
                <h2>The work.</h2>
            </div>
            <p>Colour, smoothing treatments and finishing straight from our chairs. A glimpse, with plenty more in the gallery.</p>
        </div>

        <div class="workgrid stagger">
            @foreach (config('salon.work') as $item)
                <figure class="wshot">
                    <img class="cover"
                         src="{{ asset('images/' . $item['img'] . '.webp') }}"
                         alt="{{ $item['caption'] }} — hair by Classic Cuts &amp; Colors"
                         width="760" height="1013" loading="lazy">
                    <figcaption>{{ $item['caption'] }}</figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
