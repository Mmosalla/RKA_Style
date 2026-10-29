<div>
    @include('auth::components.layouts.loader')
    <main class="login-page">

        <!-- ============ ستون فرم ============ -->
        <div class="login-form-side">

            <a href="/" class="login-back">
                <svg><use href="#i-arrow-right"/></svg>
                بازگشت به خانه
            </a>

            <div class="login-form-inner">

                <div class="login-mobile-logo">آرکا<span>.</span></div>

                <!-- عنوان -->
                <header class="login-header">
                    <span class="login-eyebrow">ورود به حساب</span>
                    <h1 class="login-title">خوش <span>برگشتی</span></h1>
                    <p class="login-subtitle">برای ادامه، اطلاعات حساب خود را وارد کنید.</p>
                </header>

                <!-- کارت فرم -->
                <section class="login-card">
                    <form class="login-form" id="loginForm" novalidate>

                        <!-- نام کاربری -->
                        <div class="login-field">
                            <label class="login-label" for="username">نام کاربری</label>
                            <div class="login-input-wrap">
                                <input
                                    wire:model="username"
                                    type="text"
                                    class="login-input"
                                    id="username"
                                    name="username"
                                    placeholder="نام کاربری خود را وارد کنید"
                                    autocomplete="username"
                                />
                                <svg class="login-input-icon"><use href="#i-user"/></svg>
                            </div>
                            @error('username')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- شماره موبایل -->
                        <div class="login-field">
                            <label class="login-label" for="mobile">شماره همراه</label>
                            <div class="login-input-wrap">
                                <input
                                    wire:model="mobile"
                                    type="tel"
                                    class="login-input"
                                    id="mobile"
                                    name="mobile"
                                    placeholder="۰۹۱۲۳۴۵۶۷۸۹"
                                    autocomplete="tel"
                                    inputmode="numeric"
                                    maxlength="11"
                                    dir="ltr"
                                />
                                <svg class="login-input-icon"><use href="#i-phone"/></svg>
                            </div>
                            @error('mobile')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- رمز عبور -->
                        <div class="login-field">
                            <label class="login-label" for="password">رمز عبور</label>
                            <div class="login-input-wrap">
                                <input
                                    wire:model="password"
                                    type="password"
                                    class="login-input login-input--password"
                                    id="password"
                                    name="password"
                                    placeholder="رمز عبور خود را وارد کنید"
                                    autocomplete="current-password"
                                />
                                <svg class="login-input-icon"><use href="#i-lock"/></svg>
                                @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                <button
                                    type="button"
                                    class="password-toggle"
                                    id="passwordToggle"
                                    aria-label="نمایش رمز عبور"
                                >
                                    <svg class="icon-eye"><use href="#i-eye"/></svg>
                                    <svg class="icon-eye-off"><use href="#i-eye-off"/></svg>
                                </button>
                            </div>
                        </div>

                        <!-- مرا به خاطر بسپار + فراموشی رمز -->
                        <div class="login-options">

                            <a href="{{route('reset_password')}}" class="forgot-link">فراموشی رمز؟</a>
                        </div>

                        <!-- دکمه‌ی ورود -->
                        <button  wire:click.prevent="login"  class="login-btn">
                            <span>ورود به حساب</span>
                            <svg><use href="#i-arrow-right"/></svg>
                        </button>
                    </form>

                    <!-- جداکننده -->
                    <div class="login-divider">یا</div>

                    <!-- لینک ثبت‌نام -->
                    <p class="login-switch">
                        حساب ندارید؟
                        <a href="{{route('register')}}" data-modal="register">ثبت ‌نام کنید</a>
                    </p>
                </section>

                <!-- قوانین -->
                <p class="login-terms">
                    با ورود،
                    <a href="#">قوانین و مقررات</a>
                    و
                    <a href="#">حریم خصوصی</a>
                    آرکا را می‌پذیرم.
                </p>

            </div>
        </div>

        <!-- ============ ستون ویژوال ============ -->
        <aside class="login-visual" aria-hidden="true">

            <div class="float-icon float-icon--1">
                <svg><use href="#i-heart"/></svg>
            </div>
            <div class="float-icon float-icon--2">
                <svg><use href="#i-sparkle"/></svg>
            </div>

            <div class="login-visual__inner">

                <div class="login-visual__brand">آرکا<span>.</span></div>

                <h2 class="login-visual__title">
                    به خانه‌ی<br>استایل خود برگردید
                </h2>

                <p class="login-visual__desc">
                    حساب کاربری شما، دروازه‌ی دسترسی به مجموعه‌ای منتخب از بهترین پوشاک مردانه است.
                </p>

                <!-- کارت شیشه‌ای -- پیش‌نمایش حساب -->
                <div class="login-showcase">

                    <div class="login-showcase__top">
                        <div class="login-avatar">
                            <svg><use href="#i-user"/></svg>
                        </div>
                        <div class="login-showcase__user">
                            <div class="login-showcase__name">حساب کاربری شما</div>
                            <span class="login-showcase__tag">آماده‌ی ورود</span>
                        </div>
                    </div>

                    <div class="login-benefits">
                        <div class="login-benefit">
                            <span class="login-benefit__check"><svg><use href="#i-check"/></svg></span>
                            <span>دسترسی سریع به سفارش‌های قبلی</span>
                        </div>
                        <div class="login-benefit">
                            <span class="login-benefit__check"><svg><use href="#i-check"/></svg></span>
                            <span>ذخیره‌ی اطلاعات ارسال</span>
                        </div>
                        <div class="login-benefit">
                            <span class="login-benefit__check"><svg><use href="#i-check"/></svg></span>
                            <span>تخفیف‌های اختصاصی اعضا</span>
                        </div>
                    </div>

                    <!-- نشان امنیت -->
                    <div class="login-lock-badge">
                        <svg><use href="#i-lock"/></svg>
                        اتصال شما کاملاً امن است
                    </div>

                </div>

                <div class="login-visual__footer">
                    <svg><use href="#i-shield"/></svg>
                    اطلاعات شما نزد ما کاملاً محفوظ است
                </div>

            </div>
        </aside>

    </main>
</div>
@assets
<link rel="stylesheet" href="{{asset('Panel/Notifications/style.css')}}">
<script src="{{asset('Panel/Notifications/script.js')}}"></script>
@endassets
@script
    <script>



            Livewire.on('Mismatch', () => {
                Noty.toast({
                    type: 'warning',
                    message: 'اطلاعات وارد شده صحیح نمی باشد',
                    duration: 3500,
                });
            });



    </script>
@endscript
