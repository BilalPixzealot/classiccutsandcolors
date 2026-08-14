/**
 * Front-end enhancements for the marketing site.
 * Kept intentionally tiny (vanilla JS, no libraries) to protect page speed.
 * All behaviour is progressive: the page is fully usable without JS.
 */

// Flag that JS is available so CSS can safely hide-then-reveal elements.
document.documentElement.classList.add('js');

document.addEventListener('DOMContentLoaded', () => {
    // 1. Sticky-nav state — solidify the header once the user scrolls off the hero.
    const nav = document.getElementById('nav');
    if (nav) {
        const onScroll = () => nav.classList.toggle('is-stuck', window.scrollY > 40);
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // 2. Scroll-reveal — fade sections in as they enter the viewport.
    const revealables = document.querySelectorAll('.reveal, .stagger');
    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in');
                        io.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.12, rootMargin: '0px 0px -8% 0px' }
        );
        revealables.forEach((el) => io.observe(el));
    } else {
        revealables.forEach((el) => el.classList.add('in'));
    }

    // 3. Hero scroll-zoom — the image zooms "into" the salon as you scroll,
    //    while the intro copy fades away. Skipped for reduced-motion users.
    const hero = document.getElementById('top');
    const heroPhoto = hero && hero.querySelector('.hero__photo');
    const heroInner = hero && hero.querySelector('.hero__inner');
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (hero && heroPhoto && !reduce) {
        let ticking = false;
        const update = () => {
            ticking = false;
            const total = hero.offsetHeight - window.innerHeight;
            const scrolled = Math.min(Math.max(-hero.getBoundingClientRect().top, 0), total);
            const p = total > 0 ? scrolled / total : 0; // 0 → 1 through the hero
            heroPhoto.style.transform = 'scale(' + (1.05 + p * 0.5).toFixed(3) + ')';
            // Keep the copy readable; only ease it out right at the end.
            if (heroInner) heroInner.style.opacity = (p < 0.72 ? 1 : Math.max(0, 1 - (p - 0.72) / 0.28)).toFixed(3);
        };
        const onScroll = () => {
            if (!ticking) { ticking = true; requestAnimationFrame(update); }
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll, { passive: true });
        update();
    }
});
