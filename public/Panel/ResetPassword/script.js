
(function otpBehavior() {
    const inputs = Array.from(document.querySelectorAll('#resetOtpGroup .otp-input'));
    if (!inputs.length) return;

    const updateFilled = (input) => {
        input.classList.toggle('is-filled', input.value.length > 0);
    };

    inputs.forEach((input, i) => {
        input.addEventListener('input', (e) => {
            const val = e.target.value.replace(/\D/g, '');
            e.target.value = val;
            updateFilled(e.target);
            if (val && i < inputs.length - 1) {
                inputs[i + 1].focus();
            }
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !input.value && i > 0) {
                inputs[i - 1].focus();
                inputs[i - 1].value = '';
                updateFilled(inputs[i - 1]);
            }
            if (e.key === 'ArrowLeft' && i > 0) {
                e.preventDefault();
                inputs[i - 1].focus();
            }
            if (e.key === 'ArrowRight' && i < inputs.length - 1) {
                e.preventDefault();
                inputs[i + 1].focus();
            }
        });

        input.addEventListener('paste', (e) => {
            e.preventDefault();
            const text = (e.clipboardData || window.clipboardData).getData('text').replace(/\D/g, '');
            if (!text) return;
            const chars = text.slice(0, inputs.length - i).split('');
            chars.forEach((ch, idx) => {
                const target = inputs[i + idx];
                if (target) {
                    target.value = ch;
                    updateFilled(target);
                }
            });
            const next = Math.min(i + chars.length, inputs.length - 1);
            inputs[next].focus();
        });

        input.addEventListener('focus', () => input.select());
    });
})();

    /* ----------------------------------------------------------
    ۲) شماره همراه — فقط عدد و حداکثر ۱۱ رقم
    ---------------------------------------------------------- */
    (function mobileInput() {
    const mobile = document.getElementById('resetMobile');
    if (!mobile) return;
    mobile.addEventListener('input', (e) => {
    e.target.value = e.target.value.replace(/\D/g, '').slice(0, 11);
});
})();

    /* ----------------------------------------------------------
    ۳) تاگل نمایش/مخفی رمز عبور — پشتیبانی از چند فیلد
    ---------------------------------------------------------- */
    (function passwordToggles() {
    const toggles = document.querySelectorAll('.password-toggle[data-toggle-for]');
    toggles.forEach(toggle => {
    const targetId = toggle.dataset.toggleFor;
    const input = document.getElementById(targetId);
    if (!input) return;
    toggle.addEventListener('click', () => {
    const isVisible = toggle.classList.toggle('is-visible');
    input.type = isVisible ? 'text' : 'password';
    toggle.setAttribute('aria-label', isVisible ? 'مخفی کردن رمز عبور' : 'نمایش رمز عبور');
});
});
})();



