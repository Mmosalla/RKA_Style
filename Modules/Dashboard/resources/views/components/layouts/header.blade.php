<header class="admin-header">
    <div class="admin-header__inner">

        <!-- بخش کاربری (سمت راست) -->
        <div class="admin-user" id="adminUser">
            <button class="admin-user__btn" type="button" aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" role="img" aria-labelledby="avatarTitle">
                    <title id="avatarTitle">آواتار پیش‌فرض کاربر</title>

                    <defs>
                        <!-- پس‌زمینه‌ی سرمه‌ای -->
                        <linearGradient id="avBg" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#2A3757"/>
                            <stop offset="100%" stop-color="#0F1420"/>
                        </linearGradient>

                        <!-- درخشش طلایی پشت سر -->
                        <radialGradient id="avGlow" cx="50%" cy="42%" r="55%">
                            <stop offset="0%" stop-color="#C6A758" stop-opacity="0.55"/>
                            <stop offset="100%" stop-color="#C6A758" stop-opacity="0"/>
                        </radialGradient>

                        <!-- گرادیان سیلوئت (کرم → طلایی) -->
                        <linearGradient id="avUser" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#F4E9C8"/>
                            <stop offset="55%" stop-color="#E8DCC8"/>
                            <stop offset="100%" stop-color="#C6A758"/>
                        </linearGradient>

                        <!-- گرادیان حلقه‌ها -->
                        <linearGradient id="avRing" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#C6A758" stop-opacity="0"/>
                            <stop offset="30%" stop-color="#C6A758" stop-opacity="0.9"/>
                            <stop offset="60%" stop-color="#E8DCC8" stop-opacity="1"/>
                            <stop offset="100%" stop-color="#C6A758" stop-opacity="0"/>
                        </linearGradient>

                        <!-- نور عبوری -->
                        <linearGradient id="avShine" x1="0" y1="0" x2="1" y2="0">
                            <stop offset="0%" stop-color="#FFFFFF" stop-opacity="0"/>
                            <stop offset="50%" stop-color="#FFFFFF" stop-opacity="0.45"/>
                            <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0"/>
                        </linearGradient>

                        <clipPath id="avClip">
                            <circle cx="100" cy="100" r="78"/>
                        </clipPath>

                        <style>
                            /* ── حلقه‌های پالس ── */
                            .av-pulse {
                                transform-origin: 100px 100px;
                                animation: avPulse 3s ease-out infinite;
                            }
                            .av-pulse-2 { animation-delay: 1.5s; }

                            /* ── درخشش طلایی ── */
                            .av-glow {
                                transform-origin: 100px 100px;
                                animation: avGlow 4s ease-in-out infinite;
                            }

                            /* ── چرخش حلقه‌ها ── */
                            .av-rotate {
                                transform-origin: 100px 100px;
                                animation: avRotate 24s linear infinite;
                            }
                            .av-rotate-rev {
                                transform-origin: 100px 100px;
                                animation: avRotateRev 30s linear infinite;
                            }

                            /* ── تنفس سیلوئت ── */
                            .av-breath {
                                transform-origin: 100px 165px;
                                animation: avBreath 4s ease-in-out infinite;
                            }

                            /* ── بالا-پایین سر ── */
                            .av-head {
                                transform-origin: 100px 82px;
                                animation: avHeadBob 4s ease-in-out infinite;
                            }

                            /* ── نور عبوری ── */
                            .av-shine {
                                animation: avShine 7s ease-in-out 2s infinite;
                            }

                            /* ── جرقه‌ها ── */
                            .av-sparkle {
                                transform-origin: center;
                                animation: avSparkle 3s ease-in-out infinite;
                            }
                            .av-s1 { animation-delay: 0s; }
                            .av-s2 { animation-delay: 0.6s; }
                            .av-s3 { animation-delay: 1.2s; }
                            .av-s4 { animation-delay: 1.8s; }
                            .av-s5 { animation-delay: 2.4s; }

                            /* ── Keyframes ── */
                            @keyframes avPulse {
                                0%   { transform: scale(1);   opacity: 0.6; }
                                100% { transform: scale(1.45); opacity: 0; }
                            }

                            @keyframes avGlow {
                                0%, 100% { opacity: 0.55; }
                                50%      { opacity: 1; }
                            }

                            @keyframes avRotate {
                                to { transform: rotate(360deg); }
                            }

                            @keyframes avRotateRev {
                                to { transform: rotate(-360deg); }
                            }

                            @keyframes avBreath {
                                0%, 100% { transform: scale(1); }
                                50%      { transform: scale(1.015); }
                            }

                            @keyframes avHeadBob {
                                0%, 100% { transform: translateY(0); }
                                50%      { transform: translateY(-2px); }
                            }

                            @keyframes avShine {
                                0%   { transform: translate(-120px, -120px) rotate(-25deg); opacity: 0; }
                                10%  { opacity: 1; }
                                50%  { opacity: 1; }
                                60%  { transform: translate(220px, 220px) rotate(-25deg); opacity: 0; }
                                100% { transform: translate(220px, 220px) rotate(-25deg); opacity: 0; }
                            }

                            @keyframes avSparkle {
                                0%, 100% { opacity: 0.2; transform: scale(0.7); }
                                50%      { opacity: 1;   transform: scale(1.3); }
                            }

                            /* ── دسترسی‌پذیری ── */
                            @media (prefers-reduced-motion: reduce) {
                                .av-pulse, .av-glow, .av-rotate, .av-rotate-rev,
                                .av-breath, .av-head, .av-shine, .av-sparkle {
                                    animation: none !important;
                                }
                                .av-pulse { opacity: 0 !important; }
                            }
                        </style>
                    </defs>

                    <!-- حلقه‌های پالس -->
                    <circle cx="100" cy="100" r="92" fill="none" stroke="#C6A758" stroke-width="1.5" class="av-pulse"/>
                    <circle cx="100" cy="100" r="92" fill="none" stroke="#C6A758" stroke-width="1.5" class="av-pulse av-pulse-2"/>

                    <!-- پس‌زمینه‌ی اصلی -->
                    <circle cx="100" cy="100" r="80" fill="url(#avBg)"/>

                    <!-- درخشش طلایی -->
                    <circle cx="100" cy="100" r="80" fill="url(#avGlow)" class="av-glow"/>

                    <!-- حلقه‌ی تزئینی بیرونی (چرخان) -->
                    <g class="av-rotate">
                        <circle cx="100" cy="100" r="72" fill="none" stroke="url(#avRing)" stroke-width="2"
                                stroke-dasharray="50 240" stroke-linecap="round"/>
                    </g>

                    <!-- حلقه‌ی تزئینی داخلی (چرخان معکوس) -->
                    <g class="av-rotate-rev">
                        <circle cx="100" cy="100" r="64" fill="none" stroke="url(#avRing)" stroke-width="1"
                                stroke-dasharray="30 200" stroke-linecap="round" opacity="0.55"/>
                    </g>

                    <!-- سیلوئت کاربر (کلیپ‌شده) -->
                    <g clip-path="url(#avClip)">
                        <g class="av-breath">
                            <!-- شانه‌ها -->
                            <ellipse cx="100" cy="165" rx="58" ry="58" fill="url(#avUser)"/>
                            <!-- سر -->
                            <circle cx="100" cy="82" r="28" fill="url(#avUser)" class="av-head"/>
                        </g>

                        <!-- نور عبوری -->
                        <rect x="-50" y="-50" width="60" height="300" fill="url(#avShine)" class="av-shine"/>
                    </g>

                    <!-- حاشیه‌ی ظریف -->
                    <circle cx="100" cy="100" r="78" fill="none" stroke="rgba(232,220,200,0.18)" stroke-width="1"/>

                    <!-- جرقه‌ها -->
                    <circle cx="50" cy="55" r="2" fill="#C6A758" class="av-sparkle av-s1"/>
                    <circle cx="155" cy="65" r="1.5" fill="#E8DCC8" class="av-sparkle av-s2"/>
                    <circle cx="45" cy="140" r="1.5" fill="#C6A758" class="av-sparkle av-s3"/>
                    <circle cx="152" cy="145" r="2" fill="#E8DCC8" class="av-sparkle av-s4"/>
                    <circle cx="105" cy="30" r="1.5" fill="#C6A758" class="av-sparkle av-s5"/>
                </svg>                <span class="admin-user__meta">
                <strong>مدیر سیستم</strong>
{{--                <small>{{ auth()->user()->mobile }}</small>--}}
              </span>
                <svg class="admin-user__chevron"><use href="#i-chevron-down"/></svg>
            </button>

            <!-- منوی کشویی -->
            <div class="admin-user__menu" role="menu">
                <div class="admin-user__menu-head">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" role="img" aria-labelledby="avatarTitle">
                        <title id="avatarTitle">آواتار پیش‌فرض کاربر</title>

                        <defs>
                            <!-- پس‌زمینه‌ی سرمه‌ای -->
                            <linearGradient id="avBg" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0%" stop-color="#2A3757"/>
                                <stop offset="100%" stop-color="#0F1420"/>
                            </linearGradient>

                            <!-- درخشش طلایی پشت سر -->
                            <radialGradient id="avGlow" cx="50%" cy="42%" r="55%">
                                <stop offset="0%" stop-color="#C6A758" stop-opacity="0.55"/>
                                <stop offset="100%" stop-color="#C6A758" stop-opacity="0"/>
                            </radialGradient>

                            <!-- گرادیان سیلوئت (کرم → طلایی) -->
                            <linearGradient id="avUser" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#F4E9C8"/>
                                <stop offset="55%" stop-color="#E8DCC8"/>
                                <stop offset="100%" stop-color="#C6A758"/>
                            </linearGradient>

                            <!-- گرادیان حلقه‌ها -->
                            <linearGradient id="avRing" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0%" stop-color="#C6A758" stop-opacity="0"/>
                                <stop offset="30%" stop-color="#C6A758" stop-opacity="0.9"/>
                                <stop offset="60%" stop-color="#E8DCC8" stop-opacity="1"/>
                                <stop offset="100%" stop-color="#C6A758" stop-opacity="0"/>
                            </linearGradient>

                            <!-- نور عبوری -->
                            <linearGradient id="avShine" x1="0" y1="0" x2="1" y2="0">
                                <stop offset="0%" stop-color="#FFFFFF" stop-opacity="0"/>
                                <stop offset="50%" stop-color="#FFFFFF" stop-opacity="0.45"/>
                                <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0"/>
                            </linearGradient>

                            <clipPath id="avClip">
                                <circle cx="100" cy="100" r="78"/>
                            </clipPath>

                            <style>
                                /* ── حلقه‌های پالس ── */
                                .av-pulse {
                                    transform-origin: 100px 100px;
                                    animation: avPulse 3s ease-out infinite;
                                }
                                .av-pulse-2 { animation-delay: 1.5s; }

                                /* ── درخشش طلایی ── */
                                .av-glow {
                                    transform-origin: 100px 100px;
                                    animation: avGlow 4s ease-in-out infinite;
                                }

                                /* ── چرخش حلقه‌ها ── */
                                .av-rotate {
                                    transform-origin: 100px 100px;
                                    animation: avRotate 24s linear infinite;
                                }
                                .av-rotate-rev {
                                    transform-origin: 100px 100px;
                                    animation: avRotateRev 30s linear infinite;
                                }

                                /* ── تنفس سیلوئت ── */
                                .av-breath {
                                    transform-origin: 100px 165px;
                                    animation: avBreath 4s ease-in-out infinite;
                                }

                                /* ── بالا-پایین سر ── */
                                .av-head {
                                    transform-origin: 100px 82px;
                                    animation: avHeadBob 4s ease-in-out infinite;
                                }

                                /* ── نور عبوری ── */
                                .av-shine {
                                    animation: avShine 7s ease-in-out 2s infinite;
                                }

                                /* ── جرقه‌ها ── */
                                .av-sparkle {
                                    transform-origin: center;
                                    animation: avSparkle 3s ease-in-out infinite;
                                }
                                .av-s1 { animation-delay: 0s; }
                                .av-s2 { animation-delay: 0.6s; }
                                .av-s3 { animation-delay: 1.2s; }
                                .av-s4 { animation-delay: 1.8s; }
                                .av-s5 { animation-delay: 2.4s; }

                                /* ── Keyframes ── */
                                @keyframes avPulse {
                                    0%   { transform: scale(1);   opacity: 0.6; }
                                    100% { transform: scale(1.45); opacity: 0; }
                                }

                                @keyframes avGlow {
                                    0%, 100% { opacity: 0.55; }
                                    50%      { opacity: 1; }
                                }

                                @keyframes avRotate {
                                    to { transform: rotate(360deg); }
                                }

                                @keyframes avRotateRev {
                                    to { transform: rotate(-360deg); }
                                }

                                @keyframes avBreath {
                                    0%, 100% { transform: scale(1); }
                                    50%      { transform: scale(1.015); }
                                }

                                @keyframes avHeadBob {
                                    0%, 100% { transform: translateY(0); }
                                    50%      { transform: translateY(-2px); }
                                }

                                @keyframes avShine {
                                    0%   { transform: translate(-120px, -120px) rotate(-25deg); opacity: 0; }
                                    10%  { opacity: 1; }
                                    50%  { opacity: 1; }
                                    60%  { transform: translate(220px, 220px) rotate(-25deg); opacity: 0; }
                                    100% { transform: translate(220px, 220px) rotate(-25deg); opacity: 0; }
                                }

                                @keyframes avSparkle {
                                    0%, 100% { opacity: 0.2; transform: scale(0.7); }
                                    50%      { opacity: 1;   transform: scale(1.3); }
                                }

                                /* ── دسترسی‌پذیری ── */
                                @media (prefers-reduced-motion: reduce) {
                                    .av-pulse, .av-glow, .av-rotate, .av-rotate-rev,
                                    .av-breath, .av-head, .av-shine, .av-sparkle {
                                        animation: none !important;
                                    }
                                    .av-pulse { opacity: 0 !important; }
                                }
                            </style>
                        </defs>

                        <!-- حلقه‌های پالس -->
                        <circle cx="100" cy="100" r="92" fill="none" stroke="#C6A758" stroke-width="1.5" class="av-pulse"/>
                        <circle cx="100" cy="100" r="92" fill="none" stroke="#C6A758" stroke-width="1.5" class="av-pulse av-pulse-2"/>

                        <!-- پس‌زمینه‌ی اصلی -->
                        <circle cx="100" cy="100" r="80" fill="url(#avBg)"/>

                        <!-- درخشش طلایی -->
                        <circle cx="100" cy="100" r="80" fill="url(#avGlow)" class="av-glow"/>

                        <!-- حلقه‌ی تزئینی بیرونی (چرخان) -->
                        <g class="av-rotate">
                            <circle cx="100" cy="100" r="72" fill="none" stroke="url(#avRing)" stroke-width="2"
                                    stroke-dasharray="50 240" stroke-linecap="round"/>
                        </g>

                        <!-- حلقه‌ی تزئینی داخلی (چرخان معکوس) -->
                        <g class="av-rotate-rev">
                            <circle cx="100" cy="100" r="64" fill="none" stroke="url(#avRing)" stroke-width="1"
                                    stroke-dasharray="30 200" stroke-linecap="round" opacity="0.55"/>
                        </g>

                        <!-- سیلوئت کاربر (کلیپ‌شده) -->
                        <g clip-path="url(#avClip)">
                            <g class="av-breath">
                                <!-- شانه‌ها -->
                                <ellipse cx="100" cy="165" rx="58" ry="58" fill="url(#avUser)"/>
                                <!-- سر -->
                                <circle cx="100" cy="82" r="28" fill="url(#avUser)" class="av-head"/>
                            </g>

                            <!-- نور عبوری -->
                            <rect x="-50" y="-50" width="60" height="300" fill="url(#avShine)" class="av-shine"/>
                        </g>

                        <!-- حاشیه‌ی ظریف -->
                        <circle cx="100" cy="100" r="78" fill="none" stroke="rgba(232,220,200,0.18)" stroke-width="1"/>

                        <!-- جرقه‌ها -->
                        <circle cx="50" cy="55" r="2" fill="#C6A758" class="av-sparkle av-s1"/>
                        <circle cx="155" cy="65" r="1.5" fill="#E8DCC8" class="av-sparkle av-s2"/>
                        <circle cx="45" cy="140" r="1.5" fill="#C6A758" class="av-sparkle av-s3"/>
                        <circle cx="152" cy="145" r="2" fill="#E8DCC8" class="av-sparkle av-s4"/>
                        <circle cx="105" cy="30" r="1.5" fill="#C6A758" class="av-sparkle av-s5"/>
                    </svg>                    <div class="admin-user__menu-head-info">
                        <strong>مدیر سیستم</strong>
                        <small>{{ auth()->user()->mobile }}</small>
                    </div>
                </div>

                <div class="admin-user__divider"></div>

                <a href="#" class="admin-user__item" role="menuitem">
                    <svg><use href="#i-settings"/></svg>
                    <span>حساب کاربری</span>
                </a>
                <a href="{{route('logout')}}" class="admin-user__item admin-user__item--danger" role="menuitem">
                    <svg><use href="#i-logout"/></svg>
                    <span>خروج از حساب</span>
                </a>
            </div>
        </div>

        <!-- دکمه‌ی مشاهده سایت (با انیمیشن) -->
        <a href="{{route('home')}}" class="admin-back-btn" aria-label="مشاهده سایت">
            <svg class="admin-back-btn__icon"><use href="#i-home"/></svg>
            <span class="admin-back-btn__text">مشاهده سایت</span>
        </a>

        <!-- لوگو (سمت چپ) -->
        <a href="{{route('admin.dashboard')}}" class="admin-logo">
            <span class="admin-logo__mark">آرکا<span>.</span></span>
            <span class="admin-logo__label">پنل مدیریت</span>
        </a>

    </div>
</header>
