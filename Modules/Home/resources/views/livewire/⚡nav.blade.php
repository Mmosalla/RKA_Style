<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <nav class="mobile-nav" id="mobileNav">
        <a href="#" class="mobile-nav__item is-active">
            <svg viewBox="0 0 24 24"><path d="M3 10l9-7 9 7v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10z"/><path d="M9 22V12h6v10"/></svg>
            <span>خانه</span>
        </a>
        <a href="#categories" class="mobile-nav__item">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
            <span>دسته‌ها</span>
        </a>
        <button class="mobile-nav__item" data-modal="search">
            <svg><use href="#i-search"/></svg>
            <span>جستجو</span>
        </button>
        <button class="mobile-nav__item" data-modal="cartSidebar">
            <svg><use href="#i-cart"/></svg>
            <span>سبد خرید</span>
            <span class="cart-badge">2</span>
        </button>
        <button class="mobile-nav__item" data-modal="login">
            <svg><use href="#i-user"/></svg>
            <span>پروفایل</span>
        </button>
    </nav>
</div>
