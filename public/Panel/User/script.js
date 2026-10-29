    /* ----------------------------------------------------------
    ۱) منوی کاربر — تاگل + بستن با کلیک بیرون / ESC
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
    ۲) مدیریت مودال‌ها — نقش
    ---------------------------------------------------------- */
    const modals = {
    roleModal: document.getElementById('roleModal')
};

    function openModal(name) {
    const modal = modals[name];
    if (!modal) return;
    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';
}
    function closeModal(name) {
    const modal = modals[name];
    if (!modal) return;
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
}

    /* دکمه‌های بازکننده — data-modal */
    document.querySelectorAll('[data-modal]').forEach(btn => {
    btn.addEventListener('click', () => openModal(btn.dataset.modal));
});
    /* دکمه‌های بستن — data-close */
    document.querySelectorAll('[data-close]').forEach(btn => {
    btn.addEventListener('click', () => closeModal(btn.dataset.close));
});

    /* ESC — بستن مودال */
    document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
    Object.keys(modals).forEach(closeModal);
}
});
