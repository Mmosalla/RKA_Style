<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <header class="site-header" id="siteHeader">
        <div class="site-header__inner">
            <div class="header-slogan">پوشش <span>برتر</span></div>

            <nav class="header-nav">
                <button class="header-nav__item header-nav__item--categories" id="categoriesTrigger" aria-haspopup="true" aria-expanded="false">دسته‌بندی</button>
                <a href="#products" class="header-nav__item">محصولات</a>
            </nav>

            <div class="header-brand">
                <!-- جستجو — با data-modal="search" -->
                <button class="icon-btn" data-modal="search" aria-label="جستجو">
                    <svg><use href="#i-search"/></svg>
                </button>
                <!-- ورود -->
                <button class="icon-btn" data-modal="login" aria-label="ورود به حساب">
                    <svg><use href="#i-user"/></svg>
                </button>
                <!-- سبد خرید — data-modal="cartSidebar" -->
                <button class="icon-btn" data-modal="cartSidebar" aria-label="سبد خرید">
                    <svg><use href="#i-cart"/></svg>
                    <span class="cart-badge">2</span>
                </button>
                <a href="/" class="logo">آرکا<span>.</span></a>
            </div>
        </div>
    </header>
</div>
