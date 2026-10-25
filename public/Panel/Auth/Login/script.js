
    /* ----------------------------------------------------------
    ۱) تاگل نمایش/مخفی رمز عبور
    ---------------------------------------------------------- */
    (function passwordToggle() {
    const toggle = document.getElementById('passwordToggle');
    const input = document.getElementById('password');
    if (!toggle || !input) return;

    toggle.addEventListener('click', () => {
    const isVisible = toggle.classList.toggle('is-visible');
    input.type = isVisible ? 'text' : 'password';
    toggle.setAttribute('aria-label', isVisible ? 'مخفی کردن رمز عبور' : 'نمایش رمز عبور');
});
})();


