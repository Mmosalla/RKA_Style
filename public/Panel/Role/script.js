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
    ۲) مودال انتساب مجوز — باز/بسته + شمارنده
    ---------------------------------------------------------- */
    (function permissionsModal() {
    const modal = document.getElementById('permModal');
    const roleNameEl = document.getElementById('permRoleName');
    const countEl = document.getElementById('permSelectedCount');
    if (!modal) return;

    const updateCount = () => {
    const total = modal.querySelectorAll('.perm-checkbox input[type="checkbox"]').length;
    const checked = modal.querySelectorAll('.perm-checkbox input[type="checkbox"]:checked').length;
    if (countEl) {
    countEl.textContent = checked.toLocaleString('fa-IR');
}
};

    const open = (roleName) => {
    if (roleNameEl) roleNameEl.textContent = roleName || '—';
    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    updateCount();
};

    const close = () => {
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
};

    // دکمه‌های انتساب
    document.querySelectorAll('[data-action="open-permissions"]').forEach(btn => {
    btn.addEventListener('click', () => {
    open(btn.dataset.roleName || '');
});
});

    // بستن با کلیک روی backdrop یا دکمه‌ی بستن
    modal.querySelectorAll('[data-action="close-permissions"]').forEach(btn => {
    btn.addEventListener('click', close);
});

    // ESC
    document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('is-open')) close();
});

    // شمارنده‌ی زنده — هر تغییر چک‌باکس
    modal.querySelectorAll('.perm-checkbox input[type="checkbox"]').forEach(input => {
    input.addEventListener('change', updateCount);
});

    // مقدار اولیه
    updateCount();
})();

