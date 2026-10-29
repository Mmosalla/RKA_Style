    /* ----------------------------------------------------------
    ۱) منوی کاربر — تاگل با کلیک + بستن با کلیک بیرون
    (روی hover هم با CSS باز می‌شود)
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

    // کلیک بیرون → بستن
    document.addEventListener('click', (e) => {
    if (!user.contains(e.target)) {
    user.classList.remove('is-open');
    btn.setAttribute('aria-expanded', 'false');
}
});

    // ESC → بستن
    document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
    user.classList.remove('is-open');
    btn.setAttribute('aria-expanded', 'false');
}
});
})();
