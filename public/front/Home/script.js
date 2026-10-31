
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
    ۲) اسلایدر Hero
    ---------------------------------------------------------- */
    (function heroSlider() {
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');
    const prevBtn = document.getElementById('sliderPrev');
    const nextBtn = document.getElementById('sliderNext');
    if (!slides.length) return;

    let current = 0, timer = null;
    const goTo = (i) => {
    current = (i + slides.length) % slides.length;
    slides.forEach((s, idx) => s.classList.toggle('is-active', idx === current));
    dots.forEach((d, idx) => d.classList.toggle('is-active', idx === current));
};
    const startAuto = () => { clearInterval(timer); timer = setInterval(() => goTo(current + 1), 6500); };

    prevBtn?.addEventListener('click', () => { goTo(current - 1); startAuto(); });
    nextBtn?.addEventListener('click', () => { goTo(current + 1); startAuto(); });
    dots.forEach((d, i) => d.addEventListener('click', () => { goTo(i); startAuto(); }));
    startAuto();
})();

    /* ----------------------------------------------------------
    ۳) مدیریت یکپارچه‌ی مودال‌ها
    کلیدهای modals دقیقاً با مقادیر data-modal و data-close در HTML یکسان‌اند:
    search | login | cartSidebar
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
    if (name === 'search') setTimeout(() => document.getElementById('searchInput')?.focus(), 150);
}
    function closeModal(name) {
    const modal = modals[name];
    if (!modal) return;
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
}

    /* همه‌ی دکمه‌های بازکننده — data-modal */
    document.querySelectorAll('[data-modal]').forEach(btn => {
    btn.addEventListener('click', () => openModal(btn.dataset.modal));
});
    /* همه‌ی دکمه‌ها/backdrop های بستن — data-close */
    document.querySelectorAll('[data-close]').forEach(btn => {
    btn.addEventListener('click', () => closeModal(btn.dataset.close));
});

    /* ESC — بستن همه و مگامنو */
    document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
    Object.keys(modals).forEach(closeModal);
    closeMegaMenu();
}
});

    /* ----------------------------------------------------------
    ۴) مگامنو
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
    ۵) اسکرول افقی محصولات با wheel
    ---------------------------------------------------------- */
    document.querySelectorAll('.products-row').forEach(row => {
    row.addEventListener('wheel', (e) => {
        if (Math.abs(e.deltaY) > Math.abs(e.deltaX) && row.scrollWidth > row.clientWidth) {
            e.preventDefault();
            row.scrollLeft += e.deltaY;
        }
    }, { passive: false });
});

    /* ----------------------------------------------------------
    ۶) اسلایدر «اینسایران» — ۵ اسلاید با افکت زوم ملایم
    ---------------------------------------------------------- */
    (function brandSlider() {
    const slides = document.querySelectorAll('.brand-slide');
    const dots = document.querySelectorAll('.brand-dot');
    const prevBtn = document.getElementById('brandPrev');
    const nextBtn = document.getElementById('brandNext');
    if (!slides.length) return;

    let current = 0, timer = null;
    const goTo = (i) => {
    current = (i + slides.length) % slides.length;
    slides.forEach((s, idx) => s.classList.toggle('is-active', idx === current));
    dots.forEach((d, idx) => d.classList.toggle('is-active', idx === current));
};
    const startAuto = () => { clearInterval(timer); timer = setInterval(() => goTo(current + 1), 5000); };

    prevBtn?.addEventListener('click', () => { goTo(current - 1); startAuto(); });
    nextBtn?.addEventListener('click', () => { goTo(current + 1); startAuto(); });
    dots.forEach((d, i) => d.addEventListener('click', () => { goTo(i); startAuto(); }));
    startAuto();
})();
