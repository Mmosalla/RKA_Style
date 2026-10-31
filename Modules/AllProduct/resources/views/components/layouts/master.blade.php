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
    <link rel="stylesheet" href="{{asset('front/AllProduct/style.css')}}">
    <link rel="icon" type="image/svg+xml" href="{{url('Favicon/favicon.svg')}}"/>
    <link rel="stylesheet" href="{{asset('front/Home/style.css')}}">
</head>
<body>

<!-- ============================================================
     SVG Sprite
     ============================================================ -->
<svg class="svg-sprite" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
    <symbol id="i-search" viewBox="0 0 24 24">
        <circle cx="11" cy="11" r="7"/>
        <path d="M21 21l-4.5-4.5"/>
    </symbol>
    <symbol id="i-shirt" viewBox="0 0 24 24">
        <path d="M16 3l5 3-2 5-2-1v10H7V10l-2 1-2-5 5-3a4 4 0 008 0z"/>
    </symbol>
    <symbol id="i-tshirt" viewBox="0 0 24 24">
        <path d="M8 3L4 5v3l2 1v11h12V9l2-1V5l-4-2a4 4 0 01-8 0z"/>
    </symbol>
    <symbol id="i-pants" viewBox="0 0 24 24">
        <path d="M6 3h12l-1 18h-4l-1-9-1 9H7L6 3z"/>
    </symbol>
    <symbol id="i-shoe" viewBox="0 0 24 24">
        <path d="M2 16h20v3H2z"/>
        <path d="M2 16l3-9h4l2 4 4-2 6 4v3"/>
    </symbol>
    <symbol id="i-hat" viewBox="0 0 24 24">
        <path d="M5 14a7 7 0 0114 0"/>
        <path d="M2 14h20v2c0 2-4 3-10 3s-10-1-10-3v-2z"/>
    </symbol>
    <symbol id="i-bag" viewBox="0 0 24 24">
        <path d="M4 8h16v12H4V8z"/>
        <path d="M8 8V6a4 4 0 018 0v2"/>
    </symbol>
    <symbol id="i-watch" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="6"/>
        <path d="M12 6V4M12 20v-2M9 4h6M9 20h6"/>
    </symbol>
    <symbol id="i-glasses" viewBox="0 0 24 24">
        <circle cx="6" cy="12" r="3"/>
        <circle cx="18" cy="12" r="3"/>
        <path d="M9 12h6"/>
    </symbol>
    <symbol id="i-belt" viewBox="0 0 24 24">
        <rect x="2" y="9" width="20" height="6" rx="1"/>
        <rect x="10" y="9" width="4" height="6" fill="currentColor"/>
    </symbol>
    <symbol id="i-jacket" viewBox="0 0 24 24">
        <path d="M6 3h4l2 3 2-3h4v18H6V3z"/>
        <path d="M12 6v15"/>
    </symbol>
    <symbol id="i-sock" viewBox="0 0 24 24">
        <path d="M7 3h6v10c0 3 2 4 4 4s4 1 4 3-2 2-4 2H9c-2 0-3-1-3-3V3z"/>
    </symbol>
    <symbol id="i-plus" viewBox="0 0 24 24">
        <path d="M12 5v14M5 12h14"/>
    </symbol>
    <symbol id="i-user" viewBox="0 0 24 24">
        <circle cx="12" cy="8" r="4"/>
        <path d="M4 21c0-4 4-7 8-7s8 3 8 7"/>
    </symbol>
    <symbol id="i-cart" viewBox="0 0 24 24">
        <path d="M6 2l-2 5v13a2 2 0 002 2h12a2 2 0 002-2V7l-2-5H6z"/>
        <path d="M4 7h16"/>
        <path d="M16 11a4 4 0 01-8 0"/>
    </symbol>
    <symbol id="i-x" viewBox="0 0 24 24">
        <path d="M18 6L6 18M6 6l12 12"/>
    </symbol>
    <symbol id="i-grid" viewBox="0 0 24 24">
        <rect x="3" y="3" width="7" height="7" rx="1.5"/>
        <rect x="14" y="3" width="7" height="7" rx="1.5"/>
        <rect x="3" y="14" width="7" height="7" rx="1.5"/>
        <rect x="14" y="14" width="7" height="7" rx="1.5"/>
    </symbol>
    <symbol id="i-arrow-left" viewBox="0 0 24 24">
        <path d="M15 18l-6-6 6-6"/>
    </symbol>
    <symbol id="i-arrow-right" viewBox="0 0 24 24">
        <path d="M9 18l6-6-6-6"/>
    </symbol>
    <symbol id="i-fire" viewBox="0 0 24 24">
        <path
            d="M8.5 14.5A2.5 2.5 0 0011 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 11-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 002.5 2.5z"/>
    </symbol>
    <symbol id="i-truck" viewBox="0 0 24 24">
        <rect x="1" y="6" width="15" height="11" rx="1"/>
        <path d="M16 10h4l3 4v3h-7"/>
        <circle cx="5.5" cy="18.5" r="2.5"/>
        <circle cx="18.5" cy="18.5" r="2.5"/>
    </symbol>
    <symbol id="i-sparkle" viewBox="0 0 24 24">
        <path d="M12 2l2 7h7l-5.5 4.5 2 7L12 16l-5.5 4.5 2-7L3 9h7z"/>
    </symbol>
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
<livewire:home::header/>
<!-- ============================================================
     مگامنو
     ============================================================ -->
<livewire:home::mega-menu/>

<!-- ============================================================
     مودال جستجو
     ============================================================ -->
<livewire:home::search/>


<!-- ============================================================
     سایدبار سبد خرید
     ============================================================ -->
<livewire:home::aside/>

<!-- ============================================================
     Hero صفحه‌ی محصولات
     ============================================================ -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="مسیر">
            <a href="{{route('home')}}">خانه</a>
            <span class="breadcrumb__sep">/</span>
            <span class="breadcrumb__current">همه محصولات</span>
        </nav>
        <h1 class="page-hero__title">همه <span>محصولات</span></h1>
        <p class="page-hero__desc">مجموعه‌ای کامل از بهترین پوشاک و اکسسوری مردانه — از استایل رسمی تا روزمره، همه در
            یک‌جا.</p>
    </div>
</section>

<!-- ============================================================
     تب‌های فیلتر
     ============================================================ -->
<livewire:allproduct::all-rroduct-filter />
<!-- ============================================================
     پرومو اسلایدر سینمایی — بخش جدید
     ============================================================ -->
<section class="promo-hero-section">
    <div class="container">
        <div class="promo-hero" id="promoHero">

            <!-- ============ اسلاید ۱: حراج ============ -->
            <div class="promo-hero__slide promo-hero__slide--sale is-active">
                <div class="promo-hero__glow promo-hero__glow--gold"></div>
                <div class="promo-hero__glow promo-hero__glow--cream"></div>
                <div class="promo-hero__particles" aria-hidden="true">
                    <span></span><span></span><span></span><span></span><span></span>
                </div>
                <div class="promo-hero__content">
            <span class="promo-hero__eyebrow">
              <svg><use href="#i-fire"/></svg>
              حراج پاییزه
            </span>
                    <h2 class="promo-hero__title">
                        تا <span class="promo-hero__big-number">۵۰٪</span> تخفیف
                    </h2>
                    <p class="promo-hero__desc">فرصت محدود! بزرگترین حراج فصل روی تمام محصولات منتخب — ارسال سریع به
                        سراسر کشور.</p>
                    <a href="#" class="btn btn--accent promo-hero__cta">
                        خرید با تخفیف
                        <svg viewBox="0 0 24 24"
                             style="width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:2.2;stroke-linecap:round;stroke-linejoin:round;">
                            <use href="#i-arrow-left"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- ============ اسلاید ۲: کالکشن ============ -->
            <div class="promo-hero__slide promo-hero__slide--collection">
                <div class="promo-hero__glow promo-hero__glow--gold"></div>
                <div class="promo-hero__glow promo-hero__glow--cream"></div>
                <div class="promo-hero__content">
            <span class="promo-hero__eyebrow">
              <svg><use href="#i-sparkle"/></svg>
              کالکشن جدید
            </span>
                    <h2 class="promo-hero__title">
                        استایل <span class="promo-hero__title-accent">مدرن</span> پاییزی
                    </h2>
                    <p class="promo-hero__desc">کالکشن اختصاصی پاییز ۱۴۰۴ با طراحی‌های منحصربه‌فرد برای مردان
                        شیک‌پوش.</p>
                    <a href="#" class="btn btn--glass promo-hero__cta">
                        مشاهده کالکشن
                    </a>
                </div>
            </div>

            <!-- ============ اسلاید ۳: ارسال رایگان ============ -->
            <div class="promo-hero__slide promo-hero__slide--shipping">
                <div class="promo-hero__glow promo-hero__glow--gold"></div>
                <div class="promo-hero__content">
            <span class="promo-hero__eyebrow">
              <svg><use href="#i-truck"/></svg>
              ارسال رایگان
            </span>
                    <h2 class="promo-hero__title">
                        ارسال <span class="promo-hero__title-accent">رایگان</span> بالای ۵۰۰ هزار
                    </h2>
                    <p class="promo-hero__desc">برای خریدهای بالای ۵۰۰,۰۰۰ تومان، ارسال رایگان در سراسر کشور با
                        بسته‌بندی ویژه.</p>
                    <a href="#" class="btn btn--accent promo-hero__cta">
                        شروع خرید
                    </a>
                </div>
            </div>

            <!-- ناوبری -->
            <button class="promo-hero__arrow promo-hero__arrow--prev" id="promoPrev" aria-label="اسلاید قبلی">
                <svg>
                    <use href="#i-arrow-left"/>
                </svg>
            </button>
            <button class="promo-hero__arrow promo-hero__arrow--next" id="promoNext" aria-label="اسلاید بعدی">
                <svg>
                    <use href="#i-arrow-right"/>
                </svg>
            </button>

            <!-- نقطه‌ها -->
            <div class="promo-hero__dots" id="promoDots">
                <button class="promo-hero__dot is-active" data-promo-go="0" aria-label="اسلاید ۱"></button>
                <button class="promo-hero__dot" data-promo-go="1" aria-label="اسلاید ۲"></button>
                <button class="promo-hero__dot" data-promo-go="2" aria-label="اسلاید ۳"></button>
            </div>

            <!-- نوار پیشرفت اتوپلی -->
            <div class="promo-hero__progress">
                <div class="promo-hero__progress-bar is-animating" id="promoProgress"></div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     نوار مارکی — اسکرول بی‌نهایت
     ============================================================ -->
<section class="marquee-section">
    <div class="container">
        <div class="marquee">
            <div class="marquee__track">
                <!-- کپی ۱ -->
                <div class="marquee__item">
                    <svg>
                        <use href="#i-fire"/>
                    </svg>
                    تخفیف <span>۳۰٪</span> روی کلکسیون پاییز
                </div>
                <div class="marquee__item">
                    <svg>
                        <use href="#i-truck"/>
                    </svg>
                    ارسال رایگان بالای <span>۵۰۰ هزار</span> تومان
                </div>
                <div class="marquee__item">
                    <svg>
                        <use href="#i-sparkle"/>
                    </svg>
                    محصولات <span>جدید</span> هفته را ببینید
                </div>
                <div class="marquee__item">
                    <svg>
                        <use href="#i-fire"/>
                    </svg>
                    کد تخفیف ویژه: <span>ARKA1404</span></div>
                <div class="marquee__item">
                    <svg>
                        <use href="#i-truck"/>
                    </svg>
                    ارسال به سراسر کشور
                </div>
                <!-- کپی ۲ — برای حلقه بی‌درز -->
                <div class="marquee__item">
                    <svg>
                        <use href="#i-fire"/>
                    </svg>
                    تخفیف <span>۳۰٪</span> روی کلکسیون پاییز
                </div>
                <div class="marquee__item">
                    <svg>
                        <use href="#i-truck"/>
                    </svg>
                    ارسال رایگان بالای <span>۵۰۰ هزار</span> تومان
                </div>
                <div class="marquee__item">
                    <svg>
                        <use href="#i-sparkle"/>
                    </svg>
                    محصولات <span>جدید</span> هفته را ببینید
                </div>
                <div class="marquee__item">
                    <svg>
                        <use href="#i-fire"/>
                    </svg>
                    کد تخفیف ویژه: <span>ARKA1404</span></div>
                <div class="marquee__item">
                    <svg>
                        <use href="#i-truck"/>
                    </svg>
                    ارسال به سراسر کشور
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     گرید محصولات
     ============================================================ -->
<livewire:allproduct::all-rrodut-gride-section />

<!-- ============================================================
     فوتر
     ============================================================ -->
<livewire:home::footer/>
<!-- ============================================================
     ناوبری موبایل
     ============================================================ -->
<livewire:home::nav/>

<scriot src="{{asset('front/AllProduct/script.js')}}"></scriot>
<script src="{{asset('front/Home/script.js')}}"></script>

</body>
</html>
