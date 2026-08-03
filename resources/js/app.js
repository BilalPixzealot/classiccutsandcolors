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
});
