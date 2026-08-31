<x-layout
    title="About"
    solid-nav
    description="With over two decades of expertise, Classic Cuts & Colors is a modern, welcoming hair salon in Eltham Village: expert colour, considered cuts and smoothing treatments, with organic JUUCE and Pure care for every head of hair.">

    {{-- Page header --}}
    <section class="pagehead">
        <div class="container">
            <p class="eyebrow">About the salon</p>
            <h1 class="gold pagehead__title">Hair for everyone, in the heart of Eltham.</h1>
            <p class="pagehead__lead">With over two decades of expertise, Classic Cuts &amp; Colors is a modern, welcoming hair studio inside Eltham Village Shopping Centre. We offer expert colour, considered cuts, and smoothing treatments with organic JUUCE and Pure care for every head of hair.</p>
        </div>
    </section>

    {{-- Story --}}
    <section class="band" style="padding-top:clamp(30px,5vh,60px)">
        <div class="container split">
            <div class="split__media reveal">
                <img class="cover" src="{{ asset('images/salon-arched-row.webp') }}" alt="Inside Classic Cuts &amp; Colors salon" width="1429" height="1101" loading="lazy">
            </div>
            <div class="reveal">
                <p class="eyebrow">Our story</p>
                <h2>A lovely, modern space, three shops from Coles.</h2>
                <p>We welcome you to our light, modern salon inside Eltham Village Shopping Centre, three shops from Coles, with undercover parking right at the door. It is the kind of place you can settle into.</p>
                <p>Every one of our hairdressers is experienced in cutting, expert in colour, and creative in styling for any occasion. We listen first, then create a look that suits you and your lifestyle, for men, ladies, young adults and children alike.</p>
                <div class="factstrip">
                    <div class="fact"><b>All ages</b><span>Men · Women · Kids</span></div>
                    <div class="fact"><b>Organic</b><span>JUUCE care</span></div>
                    <div class="fact"><b>Eltham</b><span>Village Centre</span></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Values --}}
    <section class="band" style="padding-top:0">
        <div class="container">
            <div class="sechead reveal">
                <h2>What we are about</h2>
                <p>Honest, expert hair care in a friendly, relaxed salon.</p>
            </div>
            <div class="values stagger">
                <div class="value">
                    <h3>Expert colour</h3>
                    <p>Balayage, foils, lived-in colour and fashion tones, built to grow out beautifully.</p>
                </div>
                <div class="value">
                    <h3>Considered cuts</h3>
                    <p>From restyles to trims, for men, women, young adults and kids.</p>
                </div>
                <div class="value">
                    <h3>Smoothing specialists</h3>
                    <p>Nanoplasty, Hair Botox and formaldehyde-free keratin for frizz-free, glossy hair.</p>
                </div>
                <div class="value">
                    <h3>Organic care</h3>
                    <p>JUUCE: Australian-made, organic products we use in salon and you can take home.</p>
                </div>
                <div class="value">
                    <h3>For all ages</h3>
                    <p>A friendly, family salon where everyone feels welcome in the chair.</p>
                </div>
                <div class="value">
                    <h3>Easy to visit</h3>
                    <p>Eltham Village Shopping Centre, three shops from Coles, with undercover parking.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Reused sections --}}
    @include('partials.home.studio')
    @include('partials.home.visit')
</x-layout>
