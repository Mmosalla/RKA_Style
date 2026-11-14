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
    ۲) کانفتی — فقط در حالت موفق اجرا می‌شود
    (توابع ساده و سبک — برای پیاده‌سازی نهایی می‌توانید حذف کنید)
    ---------------------------------------------------------- */
    const confettiLayer = document.getElementById('confettiLayer');
    const confettiColors = ['#C6A758', '#E8DCC8', '#6CCF9E', '#4A5FA8', '#F4E9C8'];

    function clearConfetti() {
    if (!confettiLayer) return;
    while (confettiLayer.firstChild) {
    confettiLayer.removeChild(confettiLayer.firstChild);
}
}

    function spawnConfetti(count = 30) {
    clearConfetti();
    if (!confettiLayer) return;
    const frag = document.createDocumentFragment();
    for (let i = 0; i < count; i++) {
    const piece = document.createElement('span');
    piece.className = 'confetti-piece';
    const size = 6 + Math.random() * 8;
    piece.style.width = size + 'px';
    piece.style.height = (size * (0.8 + Math.random() * 0.8)) + 'px';
    piece.style.left = (Math.random() * 100) + '%';
    piece.style.background = confettiColors[Math.floor(Math.random() * confettiColors.length)];
    piece.style.borderRadius = Math.random() > 0.5 ? '50%' : '2px';
    piece.style.animationDuration = (2.8 + Math.random() * 2) + 's';
    piece.style.animationDelay = (Math.random() * 1.2) + 's';
    piece.style.setProperty('--x-offset', (Math.random() * 200 - 100) + 'px');
    piece.style.setProperty('--rotation', (360 + Math.random() * 720) + 'deg');
    frag.appendChild(piece);
}
    confettiLayer.appendChild(frag);
}

    /* ----------------------------------------------------------
    ۳) تغییر وضعیت بین موفق و ناموفق
    ---------------------------------------------------------- */
    const resultMain = document.getElementById('resultMain');
    const stateGlow  = document.getElementById('stateGlow');
    const demoBtns   = document.querySelectorAll('[data-preview-state]');

    function setState(state) {
    if (!resultMain) return;
    resultMain.dataset.state = state;

    // کلاس is-active روی view برای ری‌استارت انیمیشن‌های reveal
    resultMain.querySelectorAll('.result-view').forEach(v => {
    v.classList.toggle('is-active', v.dataset.view === state);
});

    // هاله‌ی رنگی پس‌زمینه
    if (stateGlow) {
    stateGlow.classList.toggle('state-glow--success', state === 'success');
    stateGlow.classList.toggle('state-glow--failed',  state === 'failed');
}

    // کانفتی فقط در موفق
    if (state === 'success') {
    setTimeout(spawnConfetti, 200);
} else {
    clearConfetti();
}

    // دکمه‌های نوار دمو
    demoBtns.forEach(b => b.classList.toggle('is-active', b.dataset.previewState === state));
}

    demoBtns.forEach(btn => {
    btn.addEventListener('click', () => setState(btn.dataset.previewState));
});

    /* مقدار اولیه — کانفتی روی حالت موفق */
    spawnConfetti(30);
