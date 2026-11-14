<main class="result-main" id="resultMain" @if($Status === "OK") data-state="success" @else  data-state="failed" @endif >

    <!-- ==================== حالت موفق ==================== -->
    @if($Status === "OK")
        <section class="result-view result-view--success is-active" data-view="success" aria-labelledby="successTitle">

            <!-- آیکون تیک با رسم SVG -->
            <div class="result-icon result-icon--success" aria-hidden="true">
                <svg class="result-icon__svg" viewBox="0 0 100 100">
                    <circle cx="50" cy="50" r="45" class="result-icon__circle" />
                    <path d="M 30 52 L 44 66 L 72 36" class="result-icon__check" />
                </svg>
            </div>

            <!-- عنوان -->
            <h1 class="result-title result-title--success reveal-item" id="successTitle">
                پرداخت <span>موفقیت‌آمیز</span> بود
            </h1>

            <!-- زیرعنوان -->
            <p class="result-subtitle reveal-item">
                از خرید شما سپاسگزاریم. سفارش شما با موفقیت ثبت شد و در اسرع وقت آماده و ارسال خواهد شد.
            </p>

            <!-- کارت اطلاعات سفارش -->
            <div class="result-info-card result-info-card--success reveal-item">
                <div class="info-header">
                    <span class="info-header__title">اطلاعات سفارش</span>
                    <span class="info-header__status info-header__status--success">پرداخت شده</span>
                </div>

                <div class="info-row">
          <span class="info-row__label">
            <svg><use href="#i-hash"/></svg>
            شماره سفارش
          </span>
                    <span class="info-row__value">{{$order->order_code}}</span>
                </div>

                <div class="info-row">
          <span class="info-row__label">
            <svg><use href="#i-credit-card"/></svg>
            مبلغ پرداخت‌شده
          </span>
                    <span class="info-row__value info-row__value--accent">{{number_format($order->total_discount)}} تومان</span>
                </div>

                <div class="info-row">
          <span class="info-row__label">
            <svg><use href="#i-calendar"/></svg>
            تاریخ و زمان
          </span>
                    <span class="info-row__value">{{\Hekmatinasser\Verta\Verta::instance($order->created_at)->formatDatetime()}}</span>
                </div>

                <div class="info-row">
          <span class="info-row__label">
            <svg><use href="#i-truck"/></svg>
            روش پرداخت
          </span>
                    <span class="info-row__value">زرین‌پال</span>
                </div>

                <div class="info-row">
          <span class="info-row__label">
            <svg><use href="#i-receipt"/></svg>
            پیگیری سفارش
          </span>
                    <a href="#" class="info-row__link">
                        مشاهده جزئیات
                        <svg><use href="#i-arrow-left"/></svg>
                    </a>
                </div>
            </div>

            <!-- دکمه‌های اکشن -->
            <div class="result-actions reveal-item">
                <a href="#" class="btn btn--success">
                    <svg><use href="#i-receipt"/></svg>
                    مشاهده سفارش
                </a>
                <a href="#" class="btn btn--glass">
                    <svg><use href="#i-home"/></svg>
                    بازگشت به خانه
                </a>
            </div>

            <!-- یادداشت پایانی -->
            <p class="result-note reveal-item">
                وضعیت سفارش خود را می‌توانید از بخش <strong>«سفارش‌های من»</strong> پیگیری کنید. یک ایمیل تأیید نیز برای شما ارسال شد.
            </p>

            <!-- ردیف اعتماد -->
            <div class="result-trust reveal-item">
        <span class="trust-item">
          <svg><use href="#i-shield"/></svg>
          پرداخت امن
        </span>
                <span class="trust-item">
          <svg><use href="#i-truck"/></svg>
          ارسال سریع
        </span>
                <span class="trust-item">
          <svg><use href="#i-refresh"/></svg>
          بازگشت ۷ روزه
        </span>
            </div>

        </section>
    @else
        <section class="result-view result-view--failed" data-view="failed" aria-labelledby="failedTitle">

            <!-- آیکون ضربدر با رسم SVG + شیک/گلو -->
            <div class="result-icon result-icon--failed" aria-hidden="true">
                <div class="result-icon__glow"></div>
                <svg class="result-icon__svg" viewBox="0 0 100 100">
                    <circle cx="50" cy="50" r="45" class="result-icon__circle" />
                    <path d="M 34 34 L 66 66" class="result-icon__cross result-icon__cross--1" />
                    <path d="M 66 34 L 34 66" class="result-icon__cross result-icon__cross--2" />
                </svg>
            </div>

            <!-- عنوان -->
            <h1 class="result-title result-title--failed reveal-item" id="failedTitle">
                پرداخت <span>ناموفق</span> بود
            </h1>

            <!-- زیرعنوان -->
            <p class="result-subtitle reveal-item">
                متأسفانه تراکنش شما تکمیل نشد. ممکن است موجودی حساب کافی نبوده یا اتصال به درگاه قطع شده باشد.
            </p>

            <!-- کارت اطلاعات خطا -->
            <div class="result-info-card result-info-card--failed reveal-item">
                <div class="info-header">
                    <span class="info-header__title">اطلاعات تراکنش</span>
                    <span class="info-header__status info-header__status--failed">ناموفق</span>
                </div>

                <div class="info-row">
          <span class="info-row__label">
            <svg><use href="#i-hash"/></svg>
            شماره سفارش
          </span>
                    <span class="info-row__value">ARK-۱۴۰۴-۸۴۷۲</span>
                </div>

                <div class="info-row">
          <span class="info-row__label">
            <svg><use href="#i-info"/></svg>
            کد خطا
          </span>
                    <span class="info-row__value info-row__value--danger">۱۰۲۴</span>
                </div>

                <div class="info-row">
          <span class="info-row__label">
            <svg><use href="#i-info"/></svg>
            دلیل ناموفق بودن
          </span>
                    <span class="info-row__value">موجودی کافی نیست</span>
                </div>

                <div class="info-row">
          <span class="info-row__label">
            <svg><use href="#i-calendar"/></svg>
            تاریخ و زمان
          </span>
                    <span class="info-row__value">۱۴۰۴/۰۸/۱۵ — ۱۴:۳۲</span>
                </div>

                <div class="info-row">
          <span class="info-row__label">
            <svg><use href="#i-credit-card"/></svg>
            مبلغ تراکنش
          </span>
                    <span class="info-row__value">۲,۳۶۰,۰۰۰ تومان</span>
                </div>
            </div>

            <!-- دکمه‌های اکشن -->
            <div class="result-actions reveal-item">
                <a href="#" class="btn btn--danger">
                    <svg><use href="#i-refresh"/></svg>
                    تلاش مجدد
                </a>
                <a href="#" class="btn btn--glass">
                    <svg><use href="#i-shopping-bag"/></svg>
                    بازگشت به سبد خرید
                </a>
            </div>

            <!-- کارت پشتیبانی -->
            <div class="support-card reveal-item">
                <div class="support-card__icon">
                    <svg><use href="#i-phone"/></svg>
                </div>
                <div class="support-card__info">
                    <div class="support-card__title">نیاز به کمک دارید؟</div>
                    <div class="support-card__desc">همکاران ما ۲۴ ساعته آماده‌ی راهنمایی هستند.</div>
                </div>
                <a href="tel:02112345678" class="support-card__link">
                    تماس با پشتیبانی
                    <svg><use href="#i-arrow-left"/></svg>
                </a>
            </div>

            <!-- یادداشت پایانی -->
            <p class="result-note reveal-item">
                اگر مبلغی از حساب شما کسر شده باشد، طی <strong>۷۲ ساعت آینده</strong> به‌طور خودکار بازگردانده می‌شود. برای پیگیری، شماره سفارش خود را نزد پشتیبانی داشته باشید.
            </p>

            <!-- ردیف اعتماد -->
            <div class="result-trust reveal-item">
        <span class="trust-item">
          <svg><use href="#i-shield"/></svg>
          پرداخت امن
        </span>
                <span class="trust-item">
          <svg><use href="#i-clock"/></svg>
          پشتیبانی ۲۴/۷
        </span>
                <span class="trust-item">
          <svg><use href="#i-refresh"/></svg>
          بازگشت وجه
        </span>
            </div>

        </section>
    @endif

    <!-- ==================== حالت ناموفق ==================== -->

</main>
