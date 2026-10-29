<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>
    <meta name="theme-color" content="#1F2A44"/>
    <title>داشبورد مدیریت | آرکا</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('Panel/Dashboard/style.css')}}">
    <link rel="stylesheet" href="{{asset('Panel/Category/style.css')}}">
    <link rel="stylesheet" href="{{url('Panel/Loader/style.css')}}">
    <link rel="icon" type="image/svg+xml" href="{{url('Favicon/favicon.svg')}}" />
</head>
<body>

<!-- ============================================================
     SVG Sprite
     ============================================================ -->
<svg class="svg-sprite" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
    <symbol id="i-user" viewBox="0 0 24 24">
        <circle cx="12" cy="8" r="4"/>
        <path d="M4 21c0-4 4-7 8-7s8 3 8 7"/>
    </symbol>
    <symbol id="i-settings" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="3"/>
        <path
            d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 11-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 110-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 114 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 110 4h-.09a1.65 1.65 0 00-1.51 1z"/>
    </symbol>
    <symbol id="i-logout" viewBox="0 0 24 24">
        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
        <path d="M16 17l5-5-5-5M21 12H9"/>
    </symbol>
    <symbol id="i-home" viewBox="0 0 24 24">
        <path d="M3 10l9-7 9 7v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10z"/>
        <path d="M9 22V12h6v10"/>
    </symbol>
    <symbol id="i-package" viewBox="0 0 24 24">
        <path d="M16 4l-4 2-4-2-4 2v14l4-2 4 2 4-2 4 2V6z"/>
        <path d="M8 6v14M16 6v14"/>
    </symbol>
    <symbol id="i-shopping-bag" viewBox="0 0 24 24">
        <path d="M6 2l-2 5v13a2 2 0 002 2h12a2 2 0 002-2V7l-2-5H6z"/>
        <path d="M4 7h16"/>
        <path d="M16 11a4 4 0 01-8 0"/>
    </symbol>
    <symbol id="i-users" viewBox="0 0 24 24">
        <circle cx="9" cy="8" r="4"/>
        <path d="M2 21c0-4 3-7 7-7s7 3 7 7"/>
        <path d="M22 12c0-2-1.5-3.5-3.5-3.5S15 10 15 12"/>
    </symbol>
    <symbol id="i-wallet" viewBox="0 0 24 24">
        <path d="M3 6v14a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 01-2-2 2 2 0 012-2h14v4"/>
        <circle cx="17" cy="14" r="1.5" fill="currentColor"/>
    </symbol>
    <symbol id="i-arrow-left" viewBox="0 0 24 24">
        <path d="M15 18l-6-6 6-6"/>
    </symbol>
    <symbol id="i-arrow-up" viewBox="0 0 24 24">
        <path d="M12 19V5M5 12l7-7 7 7"/>
    </symbol>
    <symbol id="i-arrow-down" viewBox="0 0 24 24">
        <path d="M12 5v14M19 12l-7 7-7-7"/>
    </symbol>
    <symbol id="i-chevron-down" viewBox="0 0 24 24">
        <path d="M6 9l6 6 6-6"/>
    </symbol>
    <symbol id="i-calendar" viewBox="0 0 24 24">
        <rect x="3" y="4" width="18" height="18" rx="2"/>
        <path d="M16 2v4M8 2v4M3 10h18"/>
    </symbol>
</svg>

<!-- ============================================================
     پس‌زمینه
     ============================================================ -->
<div class="bg-orbs" aria-hidden="true">
    <div class="orb orb--1"></div>
    <div class="orb orb--2"></div>
    <div class="orb orb--3"></div>
</div>

<!-- ============================================================
     تاپ‌بار — هدر + ناوبری
     ============================================================ -->
<div class="admin-topbar">
    <div class="container">

        <!-- ============ هدر ============ -->
        @include('dashboard::components.layouts.header')
        <!-- ============ ناوبری ============ -->
        @include('dashboard::components.layouts.nav')
    </div>
</div>

<!-- ============================================================
     محتوای اصلی
     ============================================================ -->
{{$slot}}
<script src="{{asset('Panel/Dashboard/script.js')}}"></script>
<script src="{{asset('Panel/Category/script.js')}}"></script>
</body>
</html>
