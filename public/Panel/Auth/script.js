
    (function mobileInput() {
    const mobile = document.getElementById('mobile');
    if (!mobile) return;
    mobile.addEventListener('input', (e) => {
    e.target.value = e.target.value.replace(/\D/g, '').slice(0, 11);
});
})();

    (function otpBehavior() {
        const inputs = Array.from(document.querySelectorAll('.otp-input'));
        if (!inputs.length) return;

        // به‌روزرسانی کلاس is-filled بر اساس مقدار
        const updateFilled = (input) => {
            input.classList.toggle('is-filled', input.value.length > 0);
        };

        inputs.forEach((input, i) => {
            // فقط عدد قبول کن
            input.addEventListener('input', (e) => {
                const val = e.target.value.replace(/\D/g, '');
                e.target.value = val;
                updateFilled(e.target);
                if (val && i < inputs.length - 1) {
                    inputs[i + 1].focus();
                }
            });

            // Backspace: اگر خالی بود برگرد به قبلی
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !input.value && i > 0) {
                    inputs[i - 1].focus();
                    inputs[i - 1].value = '';
                    updateFilled(inputs[i - 1]);
                }
                // Arrow keys
                if (e.key === 'ArrowLeft' && i > 0) {
                    e.preventDefault();
                    inputs[i - 1].focus();
                }
                if (e.key === 'ArrowRight' && i < inputs.length - 1) {
                    e.preventDefault();
                    inputs[i + 1].focus();
                }
            });

            // Paste: توزیع خودکار
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

            // Focus اولیه
            input.addEventListener('focus', () => {
                input.select();
            });
        });
    })();
