<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="theme-color" content="#1F2A44" />
    <title>تکمیل خرید | آرکا</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('front/Cart/style.css')}}">
    <link rel="stylesheet" href="{{asset('Panel/Notifications/style.css')}}">
    <link rel="stylesheet" href="{{asset('Panel/Loader/style.css')}}">
    <link rel="stylesheet" href="{{asset('Favicon/favicon.svg')}}">
</head>
<body>

<!-- ============================================================
     SVG Sprite
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
    <symbol id="i-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-7 8-7s8 3 8 7"/></symbol>
    <symbol id="i-cart" viewBox="0 0 24 24"><path d="M6 2l-2 5v13a2 2 0 002 2h12a2 2 0 002-2V7l-2-5H6z"/><path d="M4 7h16"/><path d="M16 11a4 4 0 01-8 0"/></symbol>
    <symbol id="i-x" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></symbol>
    <symbol id="i-grid" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></symbol>
    <symbol id="i-truck" viewBox="0 0 24 24"><rect x="1" y="6" width="15" height="11" rx="1"/><path d="M16 10h4l3 4v3h-7"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></symbol>
    <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
    <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z"/><path d="M9 12l2 2 4-4"/></symbol>
    <symbol id="i-map-pin" viewBox="0 0 24 24"><path d="M12 2C8 2 5 5 5 9c0 5 7 13 7 13s7-8 7-13c0-4-3-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></symbol>
    <symbol id="i-store" viewBox="0 0 24 24"><path d="M3 9l2-6h14l2 6"/><path d="M3 9v10a1 1 0 001 1h16a1 1 0 001-1V9"/><path d="M3 9h18"/><path d="M9 22V12h6v10"/></symbol>
    <symbol id="i-lock" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></symbol>
    <symbol id="i-refresh" viewBox="0 0 24 24"><path d="M21 12a9 9 0 11-3-6.7L21 8"/><path d="M21 3v5h-5"/></symbol>
    <symbol id="i-arrow-left" viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></symbol>
    <symbol id="i-arrow-right" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></symbol>
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


     Hero صفحه
     ============================================================ -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="مسیر">
            <a href="{{route('home')}}">خانه</a>
            <span class="breadcrumb__sep">/</span>
            <span class="breadcrumb__current">سبد خرید خرید</span>
        </nav>
    </div>
</section>

<!-- ============================================================
     شاخص مراحل
     ============================================================ -->
{{--<section class="steps-section">--}}
{{--    <div class="container">--}}
{{--        <div class="steps" role="tablist">--}}
{{--            <div class="step is-active">--}}
{{--                <div class="step__num">۱</div>--}}
{{--                <span class="step__label">سبد خرید</span>--}}
{{--            </div>--}}
{{--            <div class="step__line"></div>--}}
{{--            <div class="step">--}}
{{--                <div class="step__num">۲</div>--}}
{{--                <span class="step__label">اطلاعات ارسال</span>--}}
{{--            </div>--}}
{{--            <div class="step__line"></div>--}}
{{--            <div class="step">--}}
{{--                <div class="step__num">۳</div>--}}
{{--                <span class="step__label">پرداخت</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- ============================================================
     Layout اصلی
     ============================================================ -->
{{$slot}}

<!-- ============================================================
     فوتر
     ============================================================ -->
<livewire:home::footer />

<!-- ============================================================
     ناوبری موبایل
     ============================================================ -->
<livewire:home::nav />

<script src="{{asset('front/Cart/script.js')}}"></script>
<script src="{{asset('Panel/Notifications/script.js')}}"></script>
<script src="{{asset('Panel/Loader/script.js')}}"></script>
</body>
</html>
