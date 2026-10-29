<div>
    @include('auth::components.layouts.loader')
    <main class="reset-page">

        <!-- ============ ستون فرم ============ -->
        <div class="reset-form-side">

            <a href="{{route('home')}}" class="reset-back">
                <svg>
                    <use href="#i-arrow-right"/>
                </svg>
                بازگشت به خانه
            </a>

            <div class="reset-form-inner">

                <div class="reset-mobile-logo">آرکا<span>.</span></div>

                <!-- عنوان -->
                <header class="reset-header">
                    <span class="reset-eyebrow">بازیابی حساب</span>
                    <h1 class="reset-title">بازیابی <span>رمز عبور</span></h1>
                    <p class="reset-subtitle">برای بازیابی رمز عبور، مراحل زیر را تکمیل کنید.</p>
                </header>

                <!-- ============ فرم ۱: شماره همراه ============ -->
                @if(!$CodeMode)
                    <section class="reset-card">
                        <header class="reset-card__header">
                            <span class="reset-card__step">۱</span>
                            <h2 class="reset-card__title">شماره همراه خود را وارد کنید</h2>
                        </header>

                        <form class="reset-form" id="resetForm1" novalidate>
                            <!-- شماره همراه -->
                            <div class="reset-field">
                                <label class="reset-label" for="resetMobile">شماره همراه</label>
                                <div class="reset-input-wrap">
                                    <input
                                        wire:model="mobile"
                                        type="tel"
                                        class="reset-input"
                                        id="resetMobile"
                                        name="mobile"
                                        placeholder="۰۹۱۲۳۴۵۶۷۸۹"
                                        autocomplete="tel"
                                        inputmode="numeric"
                                        maxlength="11"
                                        dir="ltr"
                                    />
                                    <svg class="reset-input-icon">
                                        <use href="#i-phone"/>
                                    </svg>
                                </div>
                                @error('mobile')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- دکمه‌ی ارسال کد -->
                            <button wire:click.prevent="sendCode" type="button" class="reset-btn" id="sendResetCodeBtn">
                                <span>ارسال کد بازیابی</span>
                                <svg>
                                    <use href="#i-arrow-right"/>
                                </svg>
                            </button>
                        </form>
                    </section>
                @endif

                <!-- ============ فرم ۲: کد + رمز جدید ============ -->
                @if($CodeMode)
                    <section class="reset-card">
                        <header class="reset-card__header">
                            <span class="reset-card__step">۲</span>
                            <h2 class="reset-card__title">تعیین رمز عبور جدید</h2>
                        </header>

                        <div class="otp-hint">
                            کد ۶ رقمی به شماره‌ی
                            <strong dir="ltr">{{$mobile}}</strong>
                            ارسال شد.
                            <button type="button" class="otp-hint__edit">ویرایش شماره</button>
                        </div>

                        <!-- ردیف ۶ باکس OTP -->
                        <div class="otp-group" id="resetOtpGroup" dir="ltr">
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
                        <!-- جداکننده -->
                        <div class="section-divider">اطلاعات ورود جدید</div>

                        <form class="reset-form" id="resetForm2" novalidate>

                            <!-- رمز عبور جدید -->
                            <div class="reset-field">
                                <label class="reset-label" for="newPassword">رمز عبور جدید</label>
                                <div class="reset-input-wrap">
                                    <input
                                        wire:model="password"
                                        type="password"
                                        class="reset-input reset-input--password"
                                        id="newPassword"
                                        name="newPassword"
                                        placeholder="رمز عبور جدید خود را وارد کنید"
                                        autocomplete="new-password"
                                    />
                                    <svg class="reset-input-icon">
                                        <use href="#i-key"/>
                                    </svg>
                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-toggle-for="newPassword"
                                        aria-label="نمایش رمز عبور"
                                    >
                                        <svg class="icon-eye">
                                            <use href="#i-eye"/>
                                        </svg>
                                        <svg class="icon-eye-off">
                                            <use href="#i-eye-off"/>
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- تکرار رمز عبور -->
                            <div class="reset-field">
                                <label class="reset-label" for="confirmPassword">تکرار رمز عبور</label>
                                <div class="reset-input-wrap">
                                    <input
                                        wire:model="password_confirmation"
                                        type="password"
                                        class="reset-input reset-input--password"
                                        id="confirmPassword"
                                        name="confirmPassword"
                                        placeholder="رمز عبور جدید را دوباره وارد کنید"
                                        autocomplete="new-password"
                                    />
                                    <svg class="reset-input-icon">
                                        <use href="#i-lock"/>
                                    </svg>
                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-toggle-for="confirmPassword"
                                        aria-label="نمایش رمز عبور"
                                    >
                                        <svg class="icon-eye">
                                            <use href="#i-eye"/>
                                        </svg>
                                        <svg class="icon-eye-off">
                                            <use href="#i-eye-off"/>
                                        </svg>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- دکمه‌ی تغییر رمز -->
                            <button wire:click.prevent="resetPassword" class="reset-btn">
                                <span>تغییر رمز عبور</span>
                                <svg>
                                    <use href="#i-check"/>
                                </svg>
                            </button>
                        </form>
                    </section>
                @endif

                <!-- لینک بازگشت به ورود -->
                <p class="reset-switch">
                    رمز عبورت را یادت آمد؟
                    <a href="{{route('login')}}" data-modal="login">وارد شوید</a>
                </p>

            </div>
        </div>

        <!-- ============ ستون ویژوال ============ -->
        <aside class="reset-visual" aria-hidden="true">

            <div class="float-icon float-icon--1">
                <svg>
                    <use href="#i-shield-star"/>
                </svg>
            </div>
            <div class="float-icon float-icon--2">
                <svg>
                    <use href="#i-refresh"/>
                </svg>
            </div>

            <div class="reset-visual__inner">

                <div class="reset-visual__brand">آرکا<span>.</span></div>

                <h2 class="reset-visual__title">
                    امنیت حساب شما<br>اولویت ماست
                </h2>

                <p class="reset-visual__desc">
                    با چند مرحله‌ی ساده، رمز عبور خود را بازیابی کنید و به حساب کاربری‌تان بازگردید.
                </p>

                <!-- کارت شیشه‌ای ویژوال -->
                <div class="reset-showcase">

                    <!-- قفل بزرگ -->
                    <div class="reset-showcase__lock">
                        <svg>
                            <use href="#i-lock"/>
                        </svg>
                    </div>

                    <div class="reset-showcase__headline">بازیابی امن</div>
                    <div class="reset-showcase__sub">با رمزنگاری و کد یکبار مصرف</div>

                    <div class="security-list">
                        <div class="security-item">
                            <span class="security-item__check"><svg><use href="#i-check"/></svg></span>
                            <span>کد تأیید یکبار مصرف</span>
                        </div>
                        <div class="security-item">
                            <span class="security-item__check"><svg><use href="#i-check"/></svg></span>
                            <span>رمزنگاری کامل اطلاعات</span>
                        </div>
                        <div class="security-item">
                            <span class="security-item__check"><svg><use href="#i-check"/></svg></span>
                            <span>بدون نیاز به تماس با پشتیبانی</span>
                        </div>
                    </div>

                </div>

                <div class="reset-visual__footer">
                    <svg>
                        <use href="#i-shield"/>
                    </svg>
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

    Livewire.on('userNotExists', () => {
        Noty.toast({
            type: 'warning',
            message: 'کاربر یافت نشد',
            duration: 3500,
        });
    });
    Livewire.on('codeExpired', () => {
        Noty.toast({
            type: 'danger',
            message: 'کد معتبر نیست!',
            duration: 4500,
        });
    });
</script>
@endscript
