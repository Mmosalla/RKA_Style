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
۲) همگام‌سازی Color Picker با Hex Input
---------------------------------------------------------- */
(function colorPickerSync() {
    const native = document.getElementById('colorPickerNative');
    const hexInput = document.getElementById('colorCode');
    const pickerBtn = document.getElementById('colorPickerBtn');
    const previewSwatch = document.getElementById('livePreviewSwatch');
    const previewCode = document.getElementById('livePreviewCode');
    if (!native || !hexInput) return;

    const normalizeHex = (val) => {
        if (!val) return '';
        let h = String(val).trim().replace(/^#+/, '');
        if (h.length === 3) h = h.split('').map(c => c + c).join('');
        return h.slice(0, 6).toUpperCase();
    };

    const isValidHex = (h) => /^[0-9A-F]{6}$/i.test(h);

    const updateAll = (hex, source) => {
        const normalized = normalizeHex(hex);
        const valid = isValidHex(normalized);
        const finalHex = valid ? `#${normalized}` : '#C6A758';

        // color picker پیش‌فرض
        if (valid) {
            native.value = finalHex;
            pickerBtn.style.setProperty('--picker-color', finalHex);
        }

        // پیش‌نمایش زنده
        if (previewSwatch) previewSwatch.style.setProperty('--preview-color', finalHex);
        if (previewCode) previewCode.textContent = valid ? finalHex : '—';
    };

    // وقتی کاربر رنگ رو از پیکر انتخاب می‌کنه
    native.addEventListener('input', (e) => {
        const hex = e.target.value.replace('#', '').toUpperCase();
        hexInput.value = hex;
        updateAll(hex, 'picker');
        // trigger Livewire input event
        hexInput.dispatchEvent(new Event('input', {bubbles: true}));
    });

    // وقتی کاربر توی hex تایپ می‌کنه
    hexInput.addEventListener('input', (e) => {
        const cleaned = e.target.value.replace(/[^0-9A-Fa-f]/g, '').toUpperCase().slice(0, 6);
        if (e.target.value !== cleaned) e.target.value = cleaned;
        updateAll(cleaned, 'input');
    });

    // مقدار اولیه (اگه از Livewire اومده باشه)
    if (hexInput.value) updateAll(hexInput.value, 'init');
})();
