<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="theme-color" content="#1F2A44" />
    <title>نتیجه پرداخت | آرکا</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('front/PaymentCallback/style.css')}}">
    <link rel="stylesheet" href="{{asset('Panel/Notifications/style.css')}}">
    <link rel="stylesheet" href="{{asset('Panel/Loader/style.css')}}">
    <link rel="stylesheet" href="{{asset('Favicon/favicon.svg')}}">
</head>
<body>

<!-- ============================================================
     SVG Sprite
     ============================================================ -->
<svg class="svg-sprite" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
    <symbol id="i-home" viewBox="0 0 24 24"><path d="M3 10l9-7 9 7v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10z"/><path d="M9 22V12h6v10"/></symbol>
    <symbol id="i-receipt" viewBox="0 0 24 24"><path d="M4 2v20l3-2 3 2 3-2 3 2 3-2 3 2V2z"/><path d="M9 8h6M9 12h6M9 16h3"/></symbol>
    <symbol id="i-arrow-left" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></symbol>
    <symbol id="i-arrow-right" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></symbol>
    <symbol id="i-check" viewBox="0 0 24 24"><path d="M5 12l5 5L20 7"/></symbol>
    <symbol id="i-x" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></symbol>
    <symbol id="i-shopping-bag" viewBox="0 0 24 24"><path d="M4 8h16v12H4V8z"/><path d="M8 8V6a4 4 0 018 0v2"/></symbol>
    <symbol id="i-refresh" viewBox="0 0 24 24"><path d="M21 12a9 9 0 11-3-6.7L21 8"/><path d="M21 3v5h-5"/></symbol>
    <symbol id="i-phone" viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3.1 19.5 19.5 0 01-6-6A19.8 19.8 0 012 4.2 2 2 0 014 2h3a2 2 0 012 1.7c.1 1 .4 2 .7 2.9a2 2 0 01-.5 2.1L8 10a16 16 0 006 6l1.3-1.2a2 2 0 012.1-.5c.9.3 1.9.6 2.9.7a2 2 0 011.7 2z"/></symbol>
    <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z"/><path d="M9 12l2 2 4-4"/></symbol>
    <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
    <symbol id="i-truck" viewBox="0 0 24 24"><rect x="1" y="6" width="15" height="11" rx="1"/><path d="M16 10h4l3 4v3h-7"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></symbol>
    <symbol id="i-calendar" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></symbol>
    <symbol id="i-hash" viewBox="0 0 24 24"><path d="M4 9h16M4 15h16M10 3L8 21M16 3l-2 18"/></symbol>
    <symbol id="i-credit-card" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/></symbol>
    <symbol id="i-info" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></symbol>
</svg>

<!-- ============================================================
     پس‌زمینه‌ی متحرک
     ============================================================ -->
<div class="bg-orbs" aria-hidden="true">
    <div class="orb orb--1"></div>
    <div class="orb orb--2"></div>
    <div class="orb orb--3"></div>
</div>

<!-- هاله‌ی رنگی بر اساس وضعیت -->
<div class="state-glow state-glow--success" id="stateGlow" aria-hidden="true"></div>

<!-- لایه‌ی کانفتی -->
<div class="confetti-layer" id="confettiLayer" aria-hidden="true"></div>

<!-- ============================================================
     هدر ساده
     ============================================================ -->


<!-- ============================================================
     نوار دمو — پیش‌نمایش موفق/ناموفق
     در پیاده‌سازی نهایی این نوار را حذف کنید.
     ============================================================ -->
{{--<div class="demo-bar" id="demoBar">--}}
{{--    <span class="demo-bar__label">پیش‌نمایش</span>--}}
{{--    <button class="demo-bar__btn is-active" data-preview-state="success">موفق</button>--}}
{{--    <button class="demo-bar__btn" data-preview-state="failed">ناموفق</button>--}}
{{--</div>--}}

<!-- ============================================================
     ناحیه‌ی اصلی نتیجه
     با تغییر data-state روی main، بین دو حالت جابه‌جا می‌شود.
     ============================================================ -->
{{$slot}}



<script src="{{asset('front/PaymentCallback/script.js')}}"></script>
<script src="{{asset('Panel/Notifications/script.js')}}"></script>
<script src="{{asset('Panel/Loader/script.js')}}"></script>
</body>
</html>
