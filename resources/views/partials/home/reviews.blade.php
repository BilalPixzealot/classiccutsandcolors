<section class="band">
    <div class="container">
        <div class="reviews reveal">
            <div class="reviews__head">
                <div>
                    <p class="eyebrow">Kind words</p>
                    <h2>Loved by Eltham locals.</h2>
                </div>
                <div class="reviews__badge"><b>★ {{ config('salon.rating.value') }}</b> average · Google reviews</div>
            </div>

            <div class="quote-grid stagger">
                @foreach (config('salon.reviews') as $review)
                    <blockquote class="quote">
                        <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
                        <p>&ldquo;{{ $review['quote'] }}&rdquo;</p>
                        <cite>{{ $review['name'] }}</cite>
                    </blockquote>
                @endforeach
            </div>
        </div>
    </div>
</section>
