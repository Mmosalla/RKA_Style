<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="theme-color" content="#1F2A44" />
    <title>{{$title}} | آرکا</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('front/SingleProduct/style.css')}}">
    <link rel="stylesheet" href="{{url('Panel/Loader/style.css')}}">
    <link rel="icon" type="image/svg+xml" href="{{url('Favicon/favicon.svg')}}" />


</head>
<body>

<!-- ============================================================
     SVG Sprite — همه‌ی آیکون‌ها
     ============================================================ -->
<svg class="svg-sprite" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
    <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.5-4.5"/></symbol>
    <symbol id="i-shirt" viewBox="0 0 24 24"><path d="M16 3l5 3-2 5-2-1v10H7V10l-2 1-2-5 5-3a4 4 0 008 0z"/></symbol>
    <symbol id="i-tshirt" viewBox="0 0 24 24"><path d="M8 3L4 5v3l2 1v11h12V9l2-1V5l-4-2a4 4 0 01-8 0z"/></symbol>
    <symbol id="i-pants" viewBox="0 0 24 24"><path d="M6 3h12l-1 18h-4l-1-9-1 9H7L6 3z"/></symbol>
    <symbol id="i-shoe" viewBox="0 0 24 24"><path d="M2 16h20v3H2z"/><path d="M2 16l3-9h4l2 4 4-2 6 4v3"/></symbol>
    <symbol id="i-hat" viewBox="0 0 24 24"><path d="M5 14a7 7 0 0114 0"/><path d="M2 14h20v2c0 2-4 3-10 3s-10-1-10-3v-2z"/></symbol>
    <symbol id="i-bag" viewBox="0 0 24 24"><path d="M4 8h16v12H4V8z"/><path d="M8 8V6a4 4 0 018 0v2"/></symbol>
    <symbol id="i-watch" viewBox="0 0 24 24"><circle cx="12" cy="12" r="6"/><path d="M12 6V4M12 20v-2M9 4h6M9 20h6"/></symbol>
    <symbol id="i-glasses" viewBox="0 0 24 24"><circle cx="6" cy="12" r="3"/><circle cx="18" cy="12" r="3"/><path d="M9 12h6"/></symbol>
    <symbol id="i-belt" viewBox="0 0 24 24"><rect x="2" y="9" width="20" height="6" rx="1"/><rect x="10" y="9" width="4" height="6" fill="currentColor"/></symbol>
    <symbol id="i-jacket" viewBox="0 0 24 24"><path d="M6 3h4l2 3 2-3h4v18H6V3z"/><path d="M12 6v15"/></symbol>
    <symbol id="i-sock" viewBox="0 0 24 24"><path d="M7 3h6v10c0 3 2 4 4 4s4 1 4 3-2 2-4 2H9c-2 0-3-1-3-3V3z"/></symbol>
    <symbol id="i-plus" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></symbol>
    <symbol id="i-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-7 8-7s8 3 8 7"/></symbol>
    <symbol id="i-cart" viewBox="0 0 24 24"><path d="M6 2l-2 5v13a2 2 0 002 2h12a2 2 0 002-2V7l-2-5H6z"/><path d="M4 7h16"/><path d="M16 11a4 4 0 01-8 0"/></symbol>
    <symbol id="i-x" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></symbol>
    <symbol id="i-grid" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></symbol>
    <symbol id="i-check" viewBox="0 0 24 24"><path d="M5 12l5 5L20 7"/></symbol>
    <symbol id="i-arrow-left" viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></symbol>
    <symbol id="i-arrow-right" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></symbol>
    <symbol id="i-star" viewBox="0 0 24 24"><path d="M12 2l3 7h7l-5.5 4.5 2 7L12 16l-5.5 4.5 2-7L3 9h7z"/></symbol>
    <symbol id="i-heart" viewBox="0 0 24 24"><path d="M12 21a2 2 0 01-1.4-.6L4.6 14a5 5 0 117.4-6.7 5 5 0 117.4 6.7l-6 6.4a2 2 0 01-1.4.6z"/></symbol>
    <symbol id="i-share" viewBox="0 0 24 24"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="M8.6 13.5l6.8 4M15.4 6.5l-6.8 4"/></symbol>
    <symbol id="i-truck" viewBox="0 0 24 24"><rect x="1" y="6" width="15" height="11" rx="1"/><path d="M16 10h4l3 4v3h-7"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></symbol>
    <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z"/><path d="M9 12l2 2 4-4"/></symbol>
    <symbol id="i-refresh" viewBox="0 0 24 24"><path d="M21 12a9 9 0 11-3-6.7L21 8"/><path d="M21 3v5h-5"/></symbol>
    <symbol id="i-headphones" viewBox="0 0 24 24"><path d="M3 18v-6a9 9 0 0118 0v6"/><path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"/></symbol>
    <symbol id="i-info" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></symbol>
    <symbol id="i-ruler" viewBox="0 0 24 24"><path d="M3 10h18v4H3z"/><path d="M7 10V8M12 10V8M17 10V8M7 14v2M12 14v2M17 14v2"/></symbol>
    <symbol id="i-tag" viewBox="0 0 24 24"><path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><circle cx="7" cy="7" r="1.5"/></symbol>
    <symbol id="i-layers" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></symbol>
    <symbol id="i-package" viewBox="0 0 24 24"><path d="M16 4l-4 2-4-2-4 2v14l4-2 4 2 4-2 4 2V6z"/><path d="M8 6v14M16 6v14"/></symbol>
    <symbol id="i-droplet" viewBox="0 0 24 24"><path d="M12 2.7L5.5 9.2a9 9 0 1012.9 0z"/></symbol>
    <symbol id="i-sun" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></symbol>
</svg>

<!-- ============================================================
     پس‌زمینه‌ی متحرک
     ============================================================ -->
<div class="bg-orbs" aria-hidden="true">
    <div class="orb orb--1"></div>
    <div class="orb orb--2"></div>
    <div class="orb orb--3"></div>
</div>

<!-- ============================================================
     هدر
     ============================================================ -->
<livewire:home::header />

<!-- ============================================================
     مگامنو
     ============================================================ -->
<livewire:home::mega-menu />

<!-- ============================================================
     مودال جستجو — کلید یکسان: "search"
     ============================================================ -->
<livewire:home::search />
<!-- ============================================================


     سایدبار سبد خرید — کلید یکسان: "cartSidebar"
     ============================================================ -->
<livewire:home::aside />

<!-- ============================================================
     بخش اصلی PDP
     ============================================================ -->
{{$slot}}

<!-- ============================================================
     محصولات مشابه
     ============================================================ -->
<section class="pdp-similar">
    <div class="container">
        <header class="section-header">
            <h2 class="section-header__title">محصولات مشابه</h2>
            <a href="#" class="section-header__link">مشاهده همه ←</a>
        </header>

        <div class="products-grid">

            <!-- ۱ -->
            <article class="product-card">
                <div class="product-card__media">
                    <svg><use href="#i-shirt"/></svg>
                    <span class="product-card__badge">جدید</span>
                    <span class="discount-badge discount-badge--mid">۲۰٪</span>
                </div>
                <div class="product-card__body">
                    <span class="product-card__cat">پیراهن</span>
                    <h3 class="product-card__title">پیراهن آستین‌بلند سفید</h3>
                    <div class="product-card__footer">
                        <div class="product-card__prices">
                            <span class="product-card__price-old">۵۲۰,۰۰۰</span>
                            <span class="product-card__price-new product-card__price-new--discounted">۴۱۶,۰۰۰<small> ت</small></span>
                        </div>
                        <button class="product-card__add" aria-label="افزودن"><svg><use href="#i-plus"/></svg></button>
                    </div>
                </div>
            </article>

            <!-- ۲ -->
            <article class="product-card">
                <div class="product-card__media">
                    <svg><use href="#i-shirt"/></svg>
                    <span class="discount-badge discount-badge--low">۱۵٪</span>
                </div>
                <div class="product-card__body">
                    <span class="product-card__cat">پیراهن</span>
                    <h3 class="product-card__title">پیراهن آبی روشن</h3>
                    <div class="product-card__footer">
                        <div class="product-card__prices">
                            <span class="product-card__price-old">۴۸۰,۰۰۰</span>
                            <span class="product-card__price-new product-card__price-new--discounted">۴۰۸,۰۰۰<small> ت</small></span>
                        </div>
                        <button class="product-card__add" aria-label="افزودن"><svg><use href="#i-plus"/></svg></button>
                    </div>
                </div>
            </article>

            <!-- ۳ -->
            <article class="product-card">
                <div class="product-card__media">
                    <svg><use href="#i-tshirt"/></svg>
                </div>
                <div class="product-card__body">
                    <span class="product-card__cat">تی‌شرت</span>
                    <h3 class="product-card__title">تی‌شرت پنبه‌ای مشکی</h3>
                    <div class="product-card__footer">
                        <div class="product-card__prices">
                            <span class="product-card__price-new">۲۸۰,۰۰۰<small> ت</small></span>
                        </div>
                        <button class="product-card__add" aria-label="افزودن"><svg><use href="#i-plus"/></svg></button>
                    </div>
                </div>
            </article>

            <!-- ۴ -->
            <article class="product-card">
                <div class="product-card__media">
                    <svg><use href="#i-shirt"/></svg>
                    <span class="product-card__badge">پرفروش</span>
                    <span class="discount-badge discount-badge--high">۳۰٪</span>
                </div>
                <div class="product-card__body">
                    <span class="product-card__cat">پیراهن</span>
                    <h3 class="product-card__title">پیراهن طرح‌دار سرمه‌ای</h3>
                    <div class="product-card__footer">
                        <div class="product-card__prices">
                            <span class="product-card__price-old">۶۵۰,۰۰۰</span>
                            <span class="product-card__price-new product-card__price-new--discounted">۴۵۵,۰۰۰<small> ت</small></span>
                        </div>
                        <button class="product-card__add" aria-label="افزودن"><svg><use href="#i-plus"/></svg></button>
                    </div>
                </div>
            </article>

            <!-- ۵ -->
            <article class="product-card">
                <div class="product-card__media">
                    <svg><use href="#i-jacket"/></svg>
                </div>
                <div class="product-card__body">
                    <span class="product-card__cat">کت</span>
                    <h3 class="product-card__title">کت تک کرم</h3>
                    <div class="product-card__footer">
                        <div class="product-card__prices">
                            <span class="product-card__price-new">۱,۲۵۰,۰۰۰<small> ت</small></span>
                        </div>
                        <button class="product-card__add" aria-label="افزودن"><svg><use href="#i-plus"/></svg></button>
                    </div>
                </div>
            </article>

            <!-- ۶ -->
            <article class="product-card">
                <div class="product-card__media">
                    <svg><use href="#i-shirt"/></svg>
                    <span class="discount-badge discount-badge--mid">۲۲٪</span>
                </div>
                <div class="product-card__body">
                    <span class="product-card__cat">پیراهن</span>
                    <h3 class="product-card__title">پیراهن کتان زیتونی</h3>
                    <div class="product-card__footer">
                        <div class="product-card__prices">
                            <span class="product-card__price-old">۵۰۰,۰۰۰</span>
                            <span class="product-card__price-new product-card__price-new--discounted">۳۹۰,۰۰۰<small> ت</small></span>
                        </div>
                        <button class="product-card__add" aria-label="افزودن"><svg><use href="#i-plus"/></svg></button>
                    </div>
                </div>
            </article>

        </div>
    </div>
</section>

<!-- ============================================================
     فوتر
     ============================================================ -->
<livewire:home::footer />

<!-- ============================================================
     ناوبری موبایل
     ============================================================ -->
<livewire:home::nav />

<script src="{{asset('front/Home/script.js')}}"></script>
<script src="{{asset('front/SingleProduct/script.js')}}"></script>

</body>
</html>
