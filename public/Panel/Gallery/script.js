
    /* ----------------------------------------------------------
    ۱) منوی کاربر
    ---------------------------------------------------------- */
    (function userMenu() {
    const user = document.getElementById('adminUser');
    if (!user) return;
    const btn = user.querySelector('.admin-user__btn');
    if (!btn) return;

    btn.addEventListener('click', (e) => {
    e.stopPropagation();
    const isOpen = user.classList.toggle('is-open');
    btn.setAttribute('aria-expanded', String(isOpen));
});

    document.addEventListener('click', (e) => {
    if (!user.contains(e.target)) {
    user.classList.remove('is-open');
    btn.setAttribute('aria-expanded', 'false');
}
});

    document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
    user.classList.remove('is-open');
    btn.setAttribute('aria-expanded', 'false');
}
});
})();

    /* ----------------------------------------------------------
    ۲) Drag & Drop روی دراپ‌زون
    (فقط برای بازخورد بصری — Livewire خودش آپلود رو مدیریت می‌کنه)
    ---------------------------------------------------------- */
    (function dragDropVisual() {
    const zone = document.getElementById('uploadZone');
    if (!zone) return;

    ['dragenter', 'dragover'].forEach(evt => {
    zone.addEventListener(evt, (e) => {
    e.preventDefault();
    e.stopPropagation();
    zone.classList.add('is-dragover');
});
});

    ['dragleave', 'drop'].forEach(evt => {
    zone.addEventListener(evt, (e) => {
    e.preventDefault();
    e.stopPropagation();
    if (evt === 'dragleave' && zone.contains(e.relatedTarget)) return;
    zone.classList.remove('is-dragover');
});
});
})();
