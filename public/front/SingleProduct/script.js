/* ----------------------------------------------------------
۱) هدر — is-scrolled
---------------------------------------------------------- */
(function headerScroll() {
    const header = document.getElementById('siteHeader');
    if (!header) return;
    const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 40);
    window.addEventListener('scroll', onScroll, {passive: true});
    onScroll();
})();

/* ----------------------------------------------------------
۲) مودال‌ها (search + login + cartSidebar)
---------------------------------------------------------- */
const modals = {
    search: document.getElementById('searchModal'),
    login: document.getElementById('loginModal'),
    cartSidebar: document.getElementById('cartSidebar')
};

function openModal(name) {
    const modal = modals[name];
    if (!modal) return;
    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    if (name === 'search') setTimeout(() => document.querySelector('.search-modal__input')?.focus(), 150);
}

function closeModal(name) {
    const modal = modals[name];
    if (!modal) return;
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
}

document.querySelectorAll('[data-modal]').forEach(btn => {
    btn.addEventListener('click', () => openModal(btn.dataset.modal));
});
document.querySelectorAll('[data-close]').forEach(btn => {
    btn.addEventListener('click', () => closeModal(btn.dataset.close));
});

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        Object.keys(modals).forEach(closeModal);
        closeMegaMenu();
    }
});

/* ----------------------------------------------------------
۳) مگامنو
---------------------------------------------------------- */
const megaMenu = document.getElementById('megaMenu');
const categoriesTrigger = document.getElementById('categoriesTrigger');
let hoverTimer = null;

function openMegaMenu() {
    megaMenu?.classList.add('is-open');
    categoriesTrigger?.setAttribute('aria-expanded', 'true');
}

function closeMegaMenu() {
    megaMenu?.classList.remove('is-open');
    categoriesTrigger?.setAttribute('aria-expanded', 'false');
}

categoriesTrigger?.addEventListener('click', e => {
    e.stopPropagation();
    megaMenu?.classList.contains('is-open') ? closeMegaMenu() : openMegaMenu();
});
categoriesTrigger?.addEventListener('mouseenter', () => {
    clearTimeout(hoverTimer);
    openMegaMenu();
});
categoriesTrigger?.addEventListener('mouseleave', () => {
    hoverTimer = setTimeout(closeMegaMenu, 200);
});
megaMenu?.addEventListener('mouseenter', () => clearTimeout(hoverTimer));
megaMenu?.addEventListener('mouseleave', () => {
    hoverTimer = setTimeout(closeMegaMenu, 200);
});
document.addEventListener('click', e => {
    if (!megaMenu?.contains(e.target) && e.target !== categoriesTrigger) closeMegaMenu();
});

/* ----------------------------------------------------------
۴) گالری — تغییر تصویر با تامبنیل
---------------------------------------------------------- */
(function gallery() {
    const thumbs = document.querySelectorAll('.pdp-gallery__thumb');
    const mainImg = document.getElementById('mainProductImage');
    if (!thumbs.length || !mainImg) return;

    thumbs.forEach(thumb => {
        thumb.addEventListener('click', () => {
            thumbs.forEach(t => {
                t.classList.remove('is-active');
                t.setAttribute('aria-selected', 'false');
            });
            thumb.classList.add('is-active');
            thumb.setAttribute('aria-selected', 'true');
            mainImg.style.opacity = '0.4';
            const newSrc = thumb.dataset.img;
            const tempImg = new Image();
            tempImg.onload = () => {
                mainImg.src = newSrc;
                mainImg.style.opacity = '1';
            };
            tempImg.src = newSrc;
        });
    });
})();

/* ----------------------------------------------------------
۵) انتخاب رنگ
---------------------------------------------------------- */
(function colorSelector() {
    const colors = document.querySelectorAll('.pdp-color');
    const valueEl = document.querySelector('.pdp-option:has(.pdp-colors) .pdp-option__value strong');
    colors.forEach(btn => {
        btn.addEventListener('click', () => {
            colors.forEach(c => {
                c.classList.remove('is-active');
                c.setAttribute('aria-checked', 'false');
            });
            btn.classList.add('is-active');
            btn.setAttribute('aria-checked', 'true');
            if (valueEl) valueEl.textContent = btn.dataset.color || '';
        });
    });
})();

/* ----------------------------------------------------------
۶) انتخاب سایز
---------------------------------------------------------- */
(function sizeSelector() {
    const sizes = document.querySelectorAll('.pdp-size:not(:disabled)');
    sizes.forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.pdp-size').forEach(s => {
                s.classList.remove('is-active');
                s.setAttribute('aria-checked', 'false');
            });
            btn.classList.add('is-active');
            btn.setAttribute('aria-checked', 'true');
        });
    });
})();

/* ----------------------------------------------------------
۷) تعداد + / -
---------------------------------------------------------- */
(function qtyCounter() {
    const valueEl = document.getElementById('qtyValue');
    const decBtn = document.querySelector('[data-qty-action="dec"]');
    const incBtn = document.querySelector('[data-qty-action="inc"]');
    if (!valueEl) return;

    const toFa = n => String(n).replace(/\d/g, d => '۰۱۲۳۴۵۶۷۸۹'[d]);
    let qty = 1;

    const update = () => {
        valueEl.textContent = toFa(qty);
        decBtn.disabled = qty <= 1;
        incBtn.disabled = qty >= 10;
    };

    decBtn?.addEventListener('click', () => {
        if (qty > 1) {
            qty--;
            update();
        }
    });
    incBtn?.addEventListener('click', () => {
        if (qty < 10) {
            qty++;
            update();
        }
    });
    update();
})();

/* ----------------------------------------------------------
۸) تب‌های توضیحات/مشخصات
---------------------------------------------------------- */
(function tabs() {
    const tabBtns = document.querySelectorAll('.pdp-tab');
    const panels = document.querySelectorAll('.pdp-tab-panel');
    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            tabBtns.forEach(b => {
                b.classList.remove('is-active');
                b.setAttribute('aria-selected', 'false');
            });
            btn.classList.add('is-active');
            btn.setAttribute('aria-selected', 'true');
            panels.forEach(p => p.classList.remove('is-active'));
            document.getElementById(btn.dataset.tab)?.classList.add('is-active');
        });
    });
})();

/* ----------------------------------------------------------
۹) انیمیشن افزودن به سبد خرید
- تغییر متن دکمه
- پرواز آیکون محصول به سبد
- پالس روی سبد
- Toast موفقیت
---------------------------------------------------------- */
const addToCartBtn = document.getElementById('addToCartBtn');
const headerCartIcon = document.querySelector('.header-cart-icon');
const cartBadge = document.getElementById('cartBadge');

// ذخیره HTML اولیه دکمه
const originalBtnHTML = addToCartBtn ? addToCartBtn.innerHTML : '';

// Toast
function showToast(message) {
    let container = document.querySelector('.toast-container');
    if (!container) {
        container = document.createElement('div');
        container.className = 'toast-container';
        document.body.appendChild(container);
    }
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML = `
        <div class="toast__icon"><svg><use href="#i-check"/></svg></div>
        <span>${message}</span>
      `;
    container.appendChild(toast);
    setTimeout(() => toast.remove(), 3200);
}

// افزودن کلاس loading روی دکمه + ریست پس از ۱.۲ ثانیه
function setButtonLoading(isLoading) {
    if (!addToCartBtn) return;
    if (isLoading) {
        addToCartBtn.classList.add('is-loading');
        addToCartBtn.innerHTML = '<svg><use href="#i-check"/></svg><span>در حال افزودن...</span>';
    } else {
        addToCartBtn.classList.remove('is-loading');
        addToCartBtn.innerHTML = originalBtnHTML;
    }
}

// پرواز محصول به سبد
function flyToCart() {
    if (!addToCartBtn || !headerCartIcon) return;

    const btnRect = addToCartBtn.getBoundingClientRect();
    const cartRect = headerCartIcon.getBoundingClientRect();

    const startX = btnRect.left + btnRect.width / 2;
    const startY = btnRect.top + btnRect.height / 2;
    const endX = cartRect.left + cartRect.width / 2;
    const endY = cartRect.top + cartRect.height / 2;

    // ساخت المان شناور
    const fly = document.createElement('div');
    fly.className = 'flying-product';
    fly.innerHTML = '<svg><use href="#i-shirt"/></svg>';
    fly.style.left = (startX - 30) + 'px';
    fly.style.top = (startY - 30) + 'px';
    document.body.appendChild(fly);

    // محاسبه مسیر پرواز
    const dx = endX - startX;
    const dy = endY - startY;

    // استفاده از Web Animations API
    const anim = fly.animate([
        {transform: 'translate(0, 0) scale(1) rotate(0deg)', opacity: 1},
        {transform: `translate(${dx * 0.5}px, ${dy - 80}px) scale(1.15) rotate(180deg)`, opacity: 1, offset: 0.4},
        {transform: `translate(${dx}px, ${dy}px) scale(0.2) rotate(360deg)`, opacity: 0.4}
    ], {
        duration: 750,
        easing: 'cubic-bezier(0.5, 0, 0.75, 0)'
    });

    anim.onfinish = () => {
        fly.remove();
        // پالس روی آیکون سبد
        if (headerCartIcon) {
            headerCartIcon.classList.add('is-pulsing');
            setTimeout(() => headerCartIcon.classList.remove('is-pulsing'), 700);
        }
        // افزایش بصری badge (فقط نمایشی)
        if (cartBadge) {
            const current = parseInt(cartBadge.textContent, 10) || 0;
            cartBadge.textContent = String(current + 1);
            cartBadge.style.transform = 'scale(1.4)';
            setTimeout(() => cartBadge.style.transform = 'scale(1)', 300);
        }
        // Toast
        showToast('محصول به سبد خرید اضافه شد');
        // پایان حالت لودینگ دکمه
        setButtonLoading(false);
    };
}

// اتصال به کلیک
addToCartBtn?.addEventListener('click', () => {
    if (addToCartBtn.classList.contains('is-loading')) return;
    setButtonLoading(true);
    // تاخیر کوچک برای دیده‌شدن تغییر متن، بعد پرواز
    setTimeout(flyToCart, 300);
});
