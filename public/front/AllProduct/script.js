    /* ----------------------------------------------------------
    ۱) هدر — کلاس is-scrolled
    ---------------------------------------------------------- */
    (function headerScroll() {
    const header = document.getElementById('siteHeader');
    if (!header) return;
    const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 40);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
})();

    /* ----------------------------------------------------------
    ۲) مدیریت یکپارچه‌ی مودال‌ها
    ---------------------------------------------------------- */
    const modals = {
    search:      document.getElementById('searchModal'),
    login:       document.getElementById('loginModal'),
    cartSidebar: document.getElementById('cartSidebar')
};

    function openModal(name) {
    const modal = modals[name];
    if (!modal) return;
    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    if (name === 'search') setTimeout(() => document.querySelector('.search-modal__input')?.focus(), 150);
}
    function closeModal(name) {
    const modal = modals[name];
    if (!modal) return;
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
}

    document.querySelectorAll('[data-modal]').forEach(btn => {
    btn.addEventListener('click', () => openModal(btn.dataset.modal));
});
    document.querySelectorAll('[data-close]').forEach(btn => {
    btn.addEventListener('click', () => closeModal(btn.dataset.close));
});

    document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
    Object.keys(modals).forEach(closeModal);
    closeMegaMenu();
}
});

    /* ----------------------------------------------------------
    ۳) مگامنو
    ---------------------------------------------------------- */
    const megaMenu = document.getElementById('megaMenu');
    const categoriesTrigger = document.getElementById('categoriesTrigger');
    let hoverTimer = null;

    function openMegaMenu() {
    megaMenu?.classList.add('is-open');
    categoriesTrigger?.setAttribute('aria-expanded', 'true');
}
    function closeMegaMenu() {
    megaMenu?.classList.remove('is-open');
    categoriesTrigger?.setAttribute('aria-expanded', 'false');
}

    categoriesTrigger?.addEventListener('click', e => {
    e.stopPropagation();
    megaMenu?.classList.contains('is-open') ? closeMegaMenu() : openMegaMenu();
});
    categoriesTrigger?.addEventListener('mouseenter', () => { clearTimeout(hoverTimer); openMegaMenu(); });
    categoriesTrigger?.addEventListener('mouseleave', () => { hoverTimer = setTimeout(closeMegaMenu, 200); });
    megaMenu?.addEventListener('mouseenter', () => clearTimeout(hoverTimer));
    megaMenu?.addEventListener('mouseleave', () => { hoverTimer = setTimeout(closeMegaMenu, 200); });
    document.addEventListener('click', e => {
    if (!megaMenu?.contains(e.target) && e.target !== categoriesTrigger) closeMegaMenu();
});

    /* ----------------------------------------------------------
    ۴) پرومو اسلایدر سینمایی
    ---------------------------------------------------------- */
    (function promoHeroSlider() {
    const slides = document.querySelectorAll('.promo-hero__slide');
    const dots = document.querySelectorAll('.promo-hero__dot');
    const prevBtn = document.getElementById('promoPrev');
    const nextBtn = document.getElementById('promoNext');
    const progressBar = document.getElementById('promoProgress');
    if (!slides.length) return;

    const DURATION = 6000;
    let current = 0, timer = null;

    const resetProgress = () => {
    if (!progressBar) return;
    progressBar.classList.remove('is-animating');
    void progressBar.offsetWidth;   // reflow برای ری‌استارت انیمیشن
    progressBar.classList.add('is-animating');
};

    const goTo = (i) => {
    current = (i + slides.length) % slides.length;
    slides.forEach((s, idx) => s.classList.toggle('is-active', idx === current));
    dots.forEach((d, idx) => d.classList.toggle('is-active', idx === current));
    resetProgress();
};

    const startAuto = () => {
    clearInterval(timer);
    timer = setInterval(() => goTo(current + 1), DURATION);
};

    prevBtn?.addEventListener('click', () => { goTo(current - 1); startAuto(); });
    nextBtn?.addEventListener('click', () => { goTo(current + 1); startAuto(); });
    dots.forEach((d, i) => d.addEventListener('click', () => { goTo(i); startAuto(); }));

    startAuto();
})();
