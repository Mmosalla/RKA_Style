const Noty = (function() {
    'use strict';

    /* ---- SVG icons for modals (drawn) ---- */
    const icons = {
        success: `<svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="50" cy="50" r="45" class="noty-svg-circle"/>
          <path d="M 30 52 L 44 66 L 72 36" class="noty-svg-path noty-svg-path--check"/>
        </svg>`,
        error: `<svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="50" cy="50" r="45" class="noty-svg-circle"/>
          <path d="M 36 36 L 64 64" class="noty-svg-path noty-svg-path--x1"/>
          <path d="M 64 36 L 36 64" class="noty-svg-path noty-svg-path--x2"/>
        </svg>`,
        warning: `<svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="50" cy="50" r="45" class="noty-svg-circle"/>
          <path d="M 50 30 L 50 58" class="noty-svg-path noty-svg-path--line"/>
          <circle cx="50" cy="70" r="4" class="noty-svg-dot"/>
        </svg>`,
        info: `<svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="50" cy="50" r="45" class="noty-svg-circle"/>
          <circle cx="50" cy="32" r="4" class="noty-svg-dot" style="animation-delay: 0.55s;"/>
          <path d="M 50 44 L 50 70" class="noty-svg-path noty-svg-path--line"/>
        </svg>`,
        question: `<svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="50" cy="50" r="45" class="noty-svg-circle"/>
          <path d="M 38 40 Q 38 28 50 28 Q 62 28 62 40 Q 62 48 50 54 L 50 60" class="noty-svg-path noty-svg-path--question"/>
          <circle cx="50" cy="72" r="3.5" class="noty-svg-dot"/>
        </svg>`,
        delete: `<svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="50" cy="50" r="45" class="noty-svg-circle"/>
          <path d="M 50 28 L 78 72 L 22 72 Z" class="noty-svg-path noty-svg-path--triangle"/>
          <path d="M 50 46 L 50 58" class="noty-svg-path noty-svg-path--exclaim"/>
          <circle cx="50" cy="65" r="2.5" class="noty-svg-dot"/>
        </svg>`,
    };

    /* ---- SVG icons for toasts ---- */
    const toastIcons = {
        success: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12l5 5L20 7"/></svg>',
        error: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6L6 18M6 6l12 12"/></svg>',
        warning: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 9v4M12 17h.01"/><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>',
        info: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>',
    };

    /* ---- state ---- */
    let modalCount = 0;

    /* =========================================================
       fire({...}) — هسته‌ی اصلی
       ========================================================= */
    function fire(options = {}) {
        return new Promise((resolve) => {
            const styleMap = {
                success: 'success',
                error: 'danger',
                warning: 'warning',
                info: 'primary',
                question: 'primary',
                delete: 'danger',
            };

            const opts = {
                icon: 'info',
                title: '',
                text: '',
                html: '',
                confirmText: 'تأیید',
                cancelText: 'انصراف',
                showCancel: false,
                confirmStyle: styleMap[options.icon] || 'primary',
                ...options,
            };

            const overlay = document.createElement('div');
            overlay.className = 'noty-overlay';
            overlay.innerHTML = `
            <div class="noty-modal noty-modal--${opts.icon}" role="alertdialog" aria-modal="true">
              <div class="noty-icon noty-icon--${opts.icon}">
                ${icons[opts.icon] || icons.info}
              </div>
              ${opts.title ? `<h3 class="noty-title">${opts.title}</h3>` : ''}
              ${opts.text ? `<p class="noty-text">${opts.text}</p>` : ''}
              ${opts.html ? `<div class="noty-html">${opts.html}</div>` : ''}
              <div class="noty-actions">
                ${opts.showCancel ? `<button type="button" class="noty-btn noty-btn--cancel">${opts.cancelText}</button>` : ''}
                <button type="button" class="noty-btn noty-btn--confirm noty-btn--${opts.confirmStyle}">${opts.confirmText}</button>
              </div>
            </div>
          `;

            document.body.appendChild(overlay);
            modalCount++;
            if (modalCount === 1) document.body.style.overflow = 'hidden';

            requestAnimationFrame(() => overlay.classList.add('is-open'));

            const close = (result) => {
                overlay.classList.remove('is-open');
                overlay.classList.add('is-closing');
                document.removeEventListener('keydown', escHandler);
                setTimeout(() => {
                    overlay.remove();
                    modalCount--;
                    if (modalCount === 0) document.body.style.overflow = '';
                    resolve(result);
                }, 280);
            };

            overlay.querySelector('.noty-btn--confirm').addEventListener('click', () => close(true));
            const cancelBtn = overlay.querySelector('.noty-btn--cancel');
            if (cancelBtn) cancelBtn.addEventListener('click', () => close(false));

            overlay.addEventListener('click', (e) => {
                if (e.target === overlay) close(false);
            });

            const escHandler = (e) => {
                if (e.key === 'Escape') close(false);
            };
            document.addEventListener('keydown', escHandler);
        });
    }

    /* =========================================================
       toast({...}) — اعلان کوچک
       ========================================================= */
    function toast(options = {}) {
        const { type = 'info', message = '', duration = 3500 } = options;

        let container = document.querySelector('.noty-toast-container');
        if (!container) {
            container = document.createElement('div');
            container.className = 'noty-toast-container';
            document.body.appendChild(container);
        }

        const toast = document.createElement('div');
        toast.className = `noty-toast noty-toast--${type}`;
        toast.innerHTML = `
          <div class="noty-toast__icon">${toastIcons[type] || toastIcons.info}</div>
          <div class="noty-toast__content">
            <div class="noty-toast__message">${message}</div>
          </div>
          <button type="button" class="noty-toast__close" aria-label="بستن">×</button>
          <div class="noty-toast__progress" style="--noty-duration: ${duration}ms"></div>
        `;

        container.appendChild(toast);
        requestAnimationFrame(() => toast.classList.add('is-visible'));

        const close = () => {
            toast.classList.remove('is-visible');
            toast.classList.add('is-closing');
            setTimeout(() => toast.remove(), 350);
        };

        const timer = setTimeout(close, duration);
        toast.querySelector('.noty-toast__close').addEventListener('click', () => {
            clearTimeout(timer);
            close();
        });
    }

    /* =========================================================
       API عمومی
       ========================================================= */
    return {
        fire,
        toast,
        success: (opts = {}) => fire({ ...opts, icon: 'success', confirmText: opts.confirmText || 'عالی' }),
        error: (opts = {}) => fire({ ...opts, icon: 'error', confirmText: opts.confirmText || 'متوجه شدم' }),
        warning: (opts = {}) => fire({ ...opts, icon: 'warning', confirmText: opts.confirmText || 'باشه' }),
        info: (opts = {}) => fire({ ...opts, icon: 'info', confirmText: opts.confirmText || 'باشه' }),
        confirm: (opts = {}) => fire({ ...opts, icon: 'question', showCancel: true }),
        delete: (opts = {}) => fire({
            ...opts,
            icon: 'delete',
            showCancel: true,
            confirmText: opts.confirmText || 'بله، حذف کن',
            cancelText: opts.cancelText || 'انصراف',
        }),
    };
})();



const NotyCart = (function() {
    'use strict';

    let counter = 0;

    function cart(options = {}) {
        const {
            title = 'به سبد اضافه شد',
            productName = '',
            price = '',
            quantity = 1,
            badgeText = null,
            duration = 4000,
        } = options;

        // حذف قبلی (اگر وجود داشت)
        const existing = document.querySelector('.noty-cart.is-visible');
        if (existing) {
            existing.classList.remove('is-visible');
            existing.classList.add('is-closing');
            setTimeout(() => existing.remove(), 400);
        }

        // ID یکتا برای SVG defs
        const uid = 'notycart-' + (++counter) + '-' + Math.random().toString(36).slice(2, 6);

        // متن بج: پیش‌فرض +N، یا badgeText دلخواه
        const finalBadge = badgeText != null ? badgeText : '+' + quantity;

        // المان اصلی
        const el = document.createElement('div');
        el.className = 'noty-cart';
        el.setAttribute('role', 'status');
        el.setAttribute('aria-live', 'polite');
        el.innerHTML = `
          <div class="noty-cart__inner" style="--noty-duration: ${duration}ms">
            <div class="noty-cart__shimmer"></div>

            <div class="noty-cart__icon-wrap">
              <svg class="noty-cart__svg" viewBox="0 0 80 80" aria-hidden="true">
                <defs>
                  <clipPath id="${uid}-clip">
                    <path d="M 18 28 L 62 28 L 55 52 L 25 52 Z"/>
                  </clipPath>
                  <linearGradient id="${uid}-grad" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stop-color="#F4E9C8"/>
                    <stop offset="100%" stop-color="#C6A758"/>
                  </linearGradient>
                </defs>

                <g class="noty-cart__cart-icon">
                  <!-- پس‌زمینه‌ی داخل سبد -->
                  <path d="M 18 28 L 62 28 L 55 52 L 25 52 Z" fill="rgba(31,42,68,0.5)"/>

                  <!-- محصول (clip شده به داخل سبد) -->
                  <g clip-path="url(#${uid}-clip)">
                    <g class="noty-cart__product">
                      <rect x="36" y="32" width="14" height="14" rx="2.5" fill="url(#${uid}-grad)"/>
                      <path d="M 38 35 L 48 35" stroke="rgba(255,255,255,0.4)" stroke-width="1" stroke-linecap="round"/>
                    </g>
                  </g>

                  <!-- بدنه‌ی سبد (روی محصول) -->
                  <path d="M 18 28 L 62 28 L 55 52 L 25 52 Z"
                        fill="none" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"/>

                  <!-- چرخ‌ها -->
                  <circle cx="30" cy="60" r="4" fill="none" stroke="currentColor" stroke-width="2.4"/>
                  <circle cx="52" cy="60" r="4" fill="none" stroke="currentColor" stroke-width="2.4"/>

                  <!-- دسته -->
                  <path d="M 8 14 L 18 28" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
                </g>
              </svg>

              <span class="noty-cart__badge">${finalBadge}</span>
            </div>

            <div class="noty-cart__content">
              <div class="noty-cart__title">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M5 12l5 5L20 7"/>
                </svg>
                ${title}
              </div>
              ${productName ? `<div class="noty-cart__product-name">${productName}</div>` : ''}
              <div class="noty-cart__meta">
                <span class="noty-cart__qty">${quantity} عدد</span>
                ${price ? `<span class="noty-cart__price">${price}<small> تومان</small></span>` : ''}
              </div>
            </div>

            <button type="button" class="noty-cart__close" aria-label="بستن">×</button>

            <div class="noty-cart__progress" style="--noty-duration: ${duration}ms"></div>
          </div>
        `;

        document.body.appendChild(el);
        requestAnimationFrame(() => el.classList.add('is-visible'));

        // بستن
        let closed = false;
        const close = () => {
            if (closed) return;
            closed = true;
            el.classList.remove('is-visible');
            el.classList.add('is-closing');
            setTimeout(() => el.remove(), 400);
        };

        const timer = setTimeout(close, duration);
        el.querySelector('.noty-cart__close').addEventListener('click', () => {
            clearTimeout(timer);
            close();
        });

        return { close };
    }

    return { cart };
})();
