<div>
    @include('auth::components.layouts.loader')
    <main class="reg-page">

        <!-- ============ ستون فرم (راست در RTL) ============ -->
        <div class="reg-form-side">

            <!-- لینک بازگشت -->
            <a href="/" class="reg-back">
                <svg>
                    <use href="#i-arrow-right"/>
                </svg>
                بازگشت به خانه
            </a>

            <div class="reg-form-inner">

                <!-- لوگو — فقط موبایل -->
                <div class="reg-mobile-logo">آرکا<span>.</span></div>

                <!-- عنوان -->
                <header class="reg-header">
                    <span class="reg-eyebrow">ایجاد حساب جدید</span>
                    <h1 class="reg-title">به <span>آرکا</span> خوش آمدید</h1>
                    <p class="reg-subtitle">برای ثبت‌نام، اطلاعات خود را وارد کنید و کد تأیید را دریافت کنید.</p>
                </header>

                <!-- ============ فرم ۱: اطلاعات شخصی ============ -->
                @if(!$CodeMode)
                    <section class="reg-card">
                        <header class="reg-card__header">
                            <span class="reg-card__step">۱</span>
                            <h2 class="reg-card__title">اطلاعات شخصی</h2>
                        </header>

                        <form class="reg-form" id="registerForm1" novalidate>

                            <div class="reg-field">
                                <label class="reg-label" for="firstName">نام کاربری</label>
                                <div class="reg-input-wrap">
                                    <input
                                        wire:model="username"
                                        type="text"
                                        class="reg-input"
                                        id="firstName"
                                        name="firstName"
                                        placeholder="نام کاربری خود را وارد کنید"
                                        autocomplete="given-name"
                                    />
                                    <svg class="reg-input-icon">
                                        <use href="#i-user"/>
                                    </svg>


                                </div>
                                @error('username')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="reg-field">
                                <label class="reg-label" for="mobile">شماره همراه</label>
                                <div class="reg-input-wrap">
                                    <input
                                        wire:model="mobile"
                                        type="tel"
                                        class="reg-input"
                                        id="mobile"
                                        name="mobile"
                                        placeholder="۰۹۱۲۳۴۵۶۷۸۹"
                                        autocomplete="tel"
                                        dir="ltr"
                                    />
                                    <svg class="reg-input-icon">
                                        <use href="#i-phone"/>
                                    </svg>


                                </div>
                                @error('mobile')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="reg-field">
                                <label class="reg-label" for="lastName">رمز عبور</label>
                                <div class="reg-input-wrap">
                                    <input
                                        wire:model="password"
                                        type="password"
                                        class="reg-input"
                                        id="lastName"
                                        name="password"
                                        placeholder="رمز خود را وارد کنید"
                                        autocomplete="password"
                                    />
                                    <svg class="reg-input-icon">
                                        <use href="#i-lock"/>
                                    </svg>

                                </div>
                                @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="reg-field">
                                <label class="reg-label" for="lastName">تکرار رمز عبور</label>
                                <div class="reg-input-wrap">
                                    <input
                                        wire:model="password_confirmation"
                                        type="password"
                                        class="reg-input"
                                        id="lastName"
                                        name="password_confirmation"
                                        placeholder="تکرار رمز عبور خود را وارد کنید"
                                        autocomplete="password_confirmation"
                                    />
                                    <svg class="reg-input-icon">
                                        <use href="#i-lock"/>
                                    </svg>
                                </div>
                                @error('password_confirmation')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- دکمه‌ی ارسال کد -->
                            <button wire:click.prevent="SendCode" type="button" class="reg-btn" id="sendCodeBtn">
                                <span>ارسال کد تأیید</span>
                                <svg>
                                    <use href="#i-arrow-right"/>
                                </svg>
                            </button>
                        </form>
                    </section>
                @endif

                <!-- ============ فرم ۲: کد تأیید ============ -->
                @if($CodeMode)
                    <section class="reg-card">
                        <header class="reg-card__header">
                            <span class="reg-card__step">۲</span>
                            <h2 class="reg-card__title">کد تأیید را وارد کنید</h2>
                        </header>

                        <div class="otp-hint">
                            کد ۶ رقمی به شماره‌ی
                            <strong dir="ltr">{{$mobile}}</strong>
                            ارسال شد.
                            <button wire:click.prevent="EditMobile" type="button" class="otp-hint__edit">ویرایش شماره
                            </button>
                        </div>

                        <!-- ردیف ۶ باکس OTP -->
                        <div class="otp-group" id="otpGroup" dir="ltr">
                            <input wire:model="otp1" type="text" class="otp-input" inputmode="numeric" maxlength="1"
                                   autocomplete="one-time-code" aria-label="رقم ۱"/>
                            <input wire:model="otp2" type="text" class="otp-input" inputmode="numeric" maxlength="1"
                                   aria-label="رقم ۲"/>
                            <input wire:model="otp3" type="text" class="otp-input" inputmode="numeric" maxlength="1"
                                   aria-label="رقم ۳"/>
                            <input wire:model="otp4" type="text" class="otp-input" inputmode="numeric" maxlength="1"
                                   aria-label="رقم ۴"/>
                            <input wire:model="otp5" type="text" class="otp-input" inputmode="numeric" maxlength="1"
                                   aria-label="رقم ۵"/>
                            <input wire:model="otp6" type="text" class="otp-input" inputmode="numeric" maxlength="1"
                                   aria-label="رقم ۶"/>
                        </div>
                        @error('otp')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('all_otp')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- دکمه‌ی ثبت‌نام -->
                        <form id="registerForm2" novalidate>
                            <button wire:click.prevent="register" type="submit" class="reg-btn">
                                <span>ثبت نام</span>
                                <svg>
                                    <use href="#i-check"/>
                                </svg>
                            </button>
                        </form>
                    </section>
                @endif

                <!-- لینک ورود -->
                <p class="reg-switch">
                    قبلاً حساب دارید؟
                    <a href="#" data-modal="login">وارد شوید</a>
                </p>

                <!-- قوانین -->
                <p class="reg-terms">
                    با ثبت‌نام،
                    <a href="#">قوانین و مقررات</a>
                    و
                    <a href="#">حریم خصوصی</a>
                    آرکا را می‌پذیرم.
                </p>

            </div>
        </div>

        <!-- ============ ستون ویژوال (چپ در RTL) ============ -->
        <aside class="reg-visual" aria-hidden="true">

            <!-- آیکون‌های شناور تزئینی -->
            <div class="float-icon float-icon--1">
                <svg>
                    <use href="#i-shirt"/>
                </svg>
            </div>
            <div class="float-icon float-icon--2">
                <svg>
                    <use href="#i-bag"/>
                </svg>
            </div>
            <div class="float-icon float-icon--3">
                <svg>
                    <use href="#i-star"/>
                </svg>
            </div>

            <div class="reg-visual__inner">

                <!-- برند -->
                <div class="reg-visual__brand">آرکا<span>.</span></div>

                <!-- عنوان shimmer -->
                <h2 class="reg-visual__title">
                    استایل خود را با<br>آرکا بسازید
                </h2>

                <!-- توضیح -->
                <p class="reg-visual__desc">
                    به بیش از هزاران مرد خوش‌پوش بپیوندید و از مزایای اختصاصی آرکا بهره‌مند شوید.
                </p>

                <!-- کارت شیشه‌ای -- پیش‌نمایش حساب کاربری -->
                <div class="reg-card-show">

                    <!-- بالای کارت: آواتار + نام -->
                    <div class="reg-card-show__top">
                        <div class="reg-avatar">A</div>
                        <div class="reg-card-show__user">
                            <div class="reg-card-show__name">حساب شما در آرکا</div>
                            <span class="reg-card-show__tag">فعال پس از ثبت‌نام</span>
                        </div>
                    </div>

                    <!-- لیست مزایا — با انیمیشن ظهور تدریجی -->
                    <div class="reg-benefits">
                        <div class="reg-benefit">
                            <span class="reg-benefit__check"><svg><use href="#i-check"/></svg></span>
                            <span>پیگیری آسان سفارش‌ها و مرجوعی</span>
                        </div>
                        <div class="reg-benefit">
                            <span class="reg-benefit__check"><svg><use href="#i-check"/></svg></span>
                            <span>دسترسی به تخفیف‌های اختصاصی</span>
                        </div>
                        <div class="reg-benefit">
                            <span class="reg-benefit__check"><svg><use href="#i-check"/></svg></span>
                            <span>ذخیره‌ی لیست علاقه‌مندی‌ها</span>
                        </div>
                    </div>


                </div>

                <!-- متن پایینی -->
                <div class="reg-visual__footer">
                    <svg>
                        <use href="#i-shield"/>
                    </svg>
                    اطلاعات شما نزد ما کاملاً محفوظ است
                </div>

            </div>
        </aside>

    </main>
</div>
