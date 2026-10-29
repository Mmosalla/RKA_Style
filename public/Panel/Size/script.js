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
    ۲) پیش‌نمایش زنده chip سایز
    ---------------------------------------------------------- */
    (function sizeLivePreview() {
    const input = document.getElementById('sizeValue');
    const chip = document.getElementById('sizeLiveChip');
    if (!input || !chip) return;

    const updateChip = () => {
    const val = (input.value || '').trim();
    if (val) {
    chip.textContent = val.slice(0, 5);
    chip.classList.remove('is-empty');
} else {
    chip.textContent = '?';
    chip.classList.add('is-empty');
}
};

    input.addEventListener('input', updateChip);
    updateChip();
})();
