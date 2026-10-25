<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>
    <meta name="theme-color" content="#1F2A44"/>
    <title>{{$title}} | آرکا</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{url('Panel/Auth/style.css')}}">
    <link rel="stylesheet" href="{{url('Panel/Loader/style.css')}}">
    <link rel="icon" type="image/svg+xml" href="{{url('Favicon/favicon.svg')}}" />
</head>
<body>
<svg class="svg-sprite" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
    <symbol id="i-arrow-right" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"/>
    </symbol>
    <symbol id="i-user" viewBox="0 0 24 24">
        <circle cx="12" cy="8" r="4"/>
        <path d="M4 21c0-4 4-7 8-7s8 3 8 7"/>
    </symbol>
    <symbol id="i-phone" viewBox="0 0 24 24">
        <path
            d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3.1 19.5 19.5 0 01-6-6A19.8 19.8 0 012 4.2 2 2 0 014 2h3a2 2 0 012 1.7c.1 1 .4 2 .7 2.9a2 2 0 01-.5 2.1L8 10a16 16 0 006 6l1.3-1.2a2 2 0 012.1-.5c.9.3 1.9.6 2.9.7a2 2 0 011.7 2z"/>
    </symbol>
    <symbol id="i-lock" viewBox="0 0 24 24">
        <rect x="3" y="11" width="18" height="10" rx="2"/>
        <path d="M7 11V7a5 5 0 0110 0v4"/>
    </symbol>
    <symbol id="i-check" viewBox="0 0 24 24">
        <path d="M5 12l5 5L20 7"/>
    </symbol>
    <symbol id="i-shield" viewBox="0 0 24 24">
        <path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z"/>
        <path d="M9 12l2 2 4-4"/>
    </symbol>
    <symbol id="i-shirt" viewBox="0 0 24 24">
        <path d="M16 3l5 3-2 5-2-1v10H7V10l-2 1-2-5 5-3a4 4 0 008 0z"/>
    </symbol>
    <symbol id="i-bag" viewBox="0 0 24 24">
        <path d="M4 8h16v12H4V8z"/>
        <path d="M8 8V6a4 4 0 018 0v2"/>
    </symbol>
    <symbol id="i-star" viewBox="0 0 24 24">
        <path d="M12 2l3 7h7l-5.5 4.5 2 7L12 16l-5.5 4.5 2-7L3 9h7z"/>
    </symbol>
    <symbol id="i-gift" viewBox="0 0 24 24">
        <rect x="2" y="8" width="20" height="4" rx="1"/>
        <rect x="4" y="12" width="16" height="10" rx="1"/>
        <path d="M12 8v14M8 8V6a2 2 0 114 0v2M16 8V6a2 2 0 10-4 0v2"/>
    </symbol>
</svg>
<div class="bg-orbs" aria-hidden="true">
    <div class="orb orb--1"></div>
    <div class="orb orb--2"></div>
    <div class="orb orb--3"></div>
</div>
<div class="bg-grid" aria-hidden="true"></div>
{{$slot}}
<script src="{{url('Panel/Auth/script.js')}}"></script>
</body>
</html>
