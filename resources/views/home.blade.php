{{--
    Home page — composed from small, single-responsibility section partials.
    Content is data-driven via config/salon.php (see partials).
--}}
<x-layout>
    @include('partials.home.hero')
    @include('partials.home.marquee')
    @include('partials.home.statement')
    @include('partials.home.menu')
    @include('partials.home.work')
    @include('partials.home.studio')
    @include('partials.home.about')
    @include('partials.home.products')
    @include('partials.home.gift')
    @include('partials.home.reviews')
    @include('partials.home.visit')
</x-layout>
