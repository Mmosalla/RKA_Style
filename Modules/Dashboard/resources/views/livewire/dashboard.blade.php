<main class="admin-main">
    <div class="container">

        <!-- ---- بنر خوش‌آمد ---- -->
        <div class="admin-welcome">
            <div>
                <h1 class="admin-welcome__title">خوش آمدید، <span>مدیر</span></h1>
                <p class="admin-welcome__desc">خلاصه‌ای از فعالیت فروشگاه شما در یک نگاه</p>
            </div>
            <div class="admin-welcome__date">
                <svg><use href="#i-calendar"/></svg>
                <span>پنجشنبه، ۱۵ آبان ۱۴۰۴</span>
            </div>
        </div>

        <!-- ---- کارت‌های آمار ---- -->
        <div class="stats-grid">

            <!-- درآمد -->
            <article class="stat-card stat-card--revenue">
                <div class="stat-card__head">
                    <div class="stat-card__icon"><svg><use href="#i-wallet"/></svg></div>
                    <span class="stat-card__trend stat-card__trend--up">
              <svg viewBox="0 0 24 24"><path d="M12 4l8 8h-5v8h-6v-8H4z"/></svg>
              ۱۲٪
            </span>
                </div>
                <div class="stat-card__value">۴۲,۵۰۰,۰۰۰<small>تومان</small></div>
                <div class="stat-card__label">درآمد کل</div>
                <div class="stat-card__chart">
                    <svg viewBox="0 0 100 30" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M 0 22 L 15 18 L 30 20 L 45 12 L 60 15 L 75 8 L 90 10 L 100 4" />
                    </svg>
                </div>
            </article>

            <!-- سفارشات -->
            <article class="stat-card stat-card--orders">
                <div class="stat-card__head">
                    <div class="stat-card__icon"><svg><use href="#i-shopping-bag"/></svg></div>
                    <span class="stat-card__trend stat-card__trend--up">
              <svg viewBox="0 0 24 24"><path d="M12 4l8 8h-5v8h-6v-8H4z"/></svg>
              ۸٪
            </span>
                </div>
                <div class="stat-card__value">۱,۲۴۸<small>سفارش</small></div>
                <div class="stat-card__label">سفارشات این ماه</div>
                <div class="stat-card__chart">
                    <svg viewBox="0 0 100 30" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M 0 20 L 15 15 L 30 18 L 45 10 L 60 12 L 75 6 L 90 9 L 100 3" />
                    </svg>
                </div>
            </article>

            <!-- مشتریان -->
            <article class="stat-card stat-card--customers">
                <div class="stat-card__head">
                    <div class="stat-card__icon"><svg><use href="#i-users"/></svg></div>
                    <span class="stat-card__trend stat-card__trend--up">
              <svg viewBox="0 0 24 24"><path d="M12 4l8 8h-5v8h-6v-8H4z"/></svg>
              ۵٪
            </span>
                </div>
                <div class="stat-card__value">۸,۴۵۶<small>نفر</small></div>
                <div class="stat-card__label">مشتریان فعال</div>
                <div class="stat-card__chart">
                    <svg viewBox="0 0 100 30" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M 0 25 L 15 22 L 30 20 L 45 15 L 60 12 L 75 10 L 90 6 L 100 5" />
                    </svg>
                </div>
            </article>

            <!-- محصولات -->
            <article class="stat-card stat-card--products">
                <div class="stat-card__head">
                    <div class="stat-card__icon"><svg><use href="#i-package"/></svg></div>
                    <span class="stat-card__trend stat-card__trend--down">
              <svg viewBox="0 0 24 24"><path d="M12 20l-8-8h5V4h6v8h5z"/></svg>
              ۲٪
            </span>
                </div>
                <div class="stat-card__value">۲۴۸<small>محصول</small></div>
                <div class="stat-card__label">محصولات موجود</div>
                <div class="stat-card__chart">
                    <svg viewBox="0 0 100 30" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M 0 10 L 15 12 L 30 15 L 45 13 L 60 17 L 75 15 L 90 19 L 100 18" />
                    </svg>
                </div>
            </article>

        </div>

        <!-- ---- گرید سفارشات + پرفروش‌ها ---- -->
        <div class="dashboard-grid">

            <!-- سفارشات اخیر -->
            <section class="panel">
                <header class="panel__head">
                    <h2 class="panel__title">سفارشات اخیر</h2>
                    <a href="#" class="panel__link">
                        مشاهده همه
                        <svg><use href="#i-arrow-left"/></svg>
                    </a>
                </header>
                <div class="panel__body">
                    <div class="orders-table-wrap">
                        <table class="orders-table">
                            <thead>
                            <tr>
                                <th>شماره سفارش</th>
                                <th>مشتری</th>
                                <th>مبلغ</th>
                                <th>وضعیت</th>
                                <th>زمان</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><span class="order-id">ORD-1404-8472</span></td>
                                <td>علی رضایی</td>
                                <td><span class="order-amount">۲,۳۶۰,۰۰۰<small> ت</small></span></td>
                                <td><span class="status-badge status-badge--success">پرداخت شده</span></td>
                                <td>۱۴:۳۲</td>
                            </tr>
                            <tr>
                                <td><span class="order-id">ORD-1404-8471</span></td>
                                <td>رضا محمدی</td>
                                <td><span class="order-amount">۸۴۵,۰۰۰<small> ت</small></span></td>
                                <td><span class="status-badge status-badge--info">در حال ارسال</span></td>
                                <td>۱۳:۱۵</td>
                            </tr>
                            <tr>
                                <td><span class="order-id">ORD-1404-8470</span></td>
                                <td>حسین کریمی</td>
                                <td><span class="order-amount">۱,۲۵۰,۰۰۰<small> ت</small></span></td>
                                <td><span class="status-badge status-badge--warning">در انتظار</span></td>
                                <td>۱۲:۴۸</td>
                            </tr>
                            <tr>
                                <td><span class="order-id">ORD-1404-8469</span></td>
                                <td>مهدی احمدی</td>
                                <td><span class="order-amount">۴۸۰,۰۰۰<small> ت</small></span></td>
                                <td><span class="status-badge status-badge--success">پرداخت شده</span></td>
                                <td>۱۱:۲۰</td>
                            </tr>
                            <tr>
                                <td><span class="order-id">ORD-1404-8468</span></td>
                                <td>سعید نوری</td>
                                <td><span class="order-amount">۳,۲۰۰,۰۰۰<small> ت</small></span></td>
                                <td><span class="status-badge status-badge--success">پرداخت شده</span></td>
                                <td>۱۰:۰۵</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- پرفروش‌ترین‌ها -->
            <section class="panel">
                <header class="panel__head">
                    <h2 class="panel__title">پرفروش‌ترین‌ها</h2>
                    <a href="#" class="panel__link">
                        مشاهده همه
                        <svg><use href="#i-arrow-left"/></svg>
                    </a>
                </header>
                <div class="panel__body">
                    <ul class="top-products">
                        <li class="top-product">
                            <div class="top-product__rank">۱</div>
                            <div class="top-product__info">
                                <div class="top-product__name">تی‌شرت پنبه‌ای</div>
                                <div class="top-product__meta">۳۵ فروش</div>
                            </div>
                            <div class="top-product__revenue">۹,۵۲۰,۰۰۰<small> ت</small></div>
                        </li>
                        <li class="top-product">
                            <div class="top-product__rank">۲</div>
                            <div class="top-product__info">
                                <div class="top-product__name">پیراهن کتان کرم</div>
                                <div class="top-product__meta">۲۴ فروش</div>
                            </div>
                            <div class="top-product__revenue">۹,۳۶۰,۰۰۰<small> ت</small></div>
                        </li>
                        <li class="top-product">
                            <div class="top-product__rank">۳</div>
                            <div class="top-product__info">
                                <div class="top-product__name">کفش چرم کلاسیک</div>
                                <div class="top-product__meta">۱۸ فروش</div>
                            </div>
                            <div class="top-product__revenue">۱۸,۶۴۸,۰۰۰<small> ت</small></div>
                        </li>
                        <li class="top-product">
                            <div class="top-product__rank">۴</div>
                            <div class="top-product__info">
                                <div class="top-product__name">ساعت مچی کلاسیک</div>
                                <div class="top-product__meta">۱۲ فروش</div>
                            </div>
                            <div class="top-product__revenue">۲۲,۰۸۰,۰۰۰<small> ت</small></div>
                        </li>
                    </ul>
                </div>
            </section>

        </div>

    </div>
</main>
