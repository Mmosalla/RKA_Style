<div>
    @include('auth::components.layouts.loader')
    <main class="pdp">
        <div class="container">

            <!-- Breadcrumb -->
            <nav class="breadcrumb" aria-label="مسیر">
                <a href="{{route('home')}}">خانه</a>
                <span class="breadcrumb__sep">/</span>
                <span class="breadcrumb__current">{{$this->Select_Product->title}}</span>
            </nav>

            <div class="pdp-layout">

                <!-- ============ گالری ============ -->
                <div class="pdp-gallery">
                    <!-- تامبنیل‌ها -->
                    <div class="pdp-gallery__thumbs" role="tablist" aria-label="گالری تصاویر">
                        @forelse($this->Select_Product->galleries as $index=>$gallery)
                            <button
                                type="button"
                                class="pdp-gallery__thumb {{ $loop->first ? 'is-active' : '' }}"
                                role="tab"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                data-img="{{ asset('Images/Products/' . $gallery->image) }}"
                            >
                                <img
                                    src="{{ asset('Images/Products/' . $gallery->image) }}"
                                    alt="نمای {{ $index + 1 }}"
                                    loading="lazy"
                                />
                            </button>
                        @empty
                            <button class="pdp-gallery__thumb is-active" role="tab" aria-selected="true"
                                    data-img="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=900&q=80">
                                <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=200&q=70"
                                     alt="نمای ۱" loading="lazy"/>
                            </button>
                        @endforelse
                    </div>

                    <!-- تصویر اصلی -->
                    <div class="pdp-gallery__main">
                        @if ($this->Select_Product->discount)
                            <span class="pdp-gallery__discount">
                                {{ $this->Select_Product->discount }}٪ تخفیف
                            </span>
                        @endif

                        <div class="pdp-gallery__actions">
                            <button class="pdp-gallery__action-btn" aria-label="افزودن به علاقه‌مندی‌ها">
                                <svg>
                                    <use href="#i-heart"/>
                                </svg>
                            </button>
                            <button class="pdp-gallery__action-btn" aria-label="اشتراک‌گذاری">
                                <svg>
                                    <use href="#i-share"/>
                                </svg>
                            </button>
                        </div>
                        <img
                            id="mainProductImage"
                            src="{{asset('Images/Products/' . $this->Select_Product->main_image)}}"
                            alt="{{$this->Select_Product->title}}"
                        />
                    </div>
                </div>

                <!-- ============ اطلاعات محصول ============ -->
                <div class="pdp-info">

                    <!-- دسته + عنوان -->
                    <div>
                        <span class="pdp-cat">{{$this->Select_Product->category->title}}</span>
                        <h1 class="pdp-title">{{$this->Select_Product->title}}</h1>
                    </div>

                    <!-- امتیاز -->
                    <div class="pdp-rating">
                        <div class="pdp-stars">
                            <svg>
                                <use href="#i-star"/>
                            </svg>
                            <svg>
                                <use href="#i-star"/>
                            </svg>
                            <svg>
                                <use href="#i-star"/>
                            </svg>
                            <svg>
                                <use href="#i-star"/>
                            </svg>
                            <svg class="is-empty">
                                <use href="#i-star"/>
                            </svg>
                        </div>
                        <span class="pdp-rating__text"><strong>۴.۲</strong> از ۵</span>
                        <span class="pdp-rating__dot">•</span>
                        <span class="pdp-rating__text">۱۲۸ دیدگاه</span>
                        <span class="pdp-rating__dot">•</span>
                        <span class="pdp-rating__text">{{$this->Select_Product->sold}} فروش</span>
                    </div>

                    <!-- باکس قیمت -->
                    <div class="pdp-price-box">
                        @if($this->Select_Product->discount)
                            <span class="pdp-price-old">{{number_format($this->Select_Product->price)}}</span>
                            <span class="pdp-price-new">{{number_format((new \Modules\Product\Services\mainPriceService())->getPrice($this->Select_Product->price ,$this->Select_Product->discount))}}<small>تومان</small></span>
                            <span class="pdp-price-discount">{{$this->Select_Product->discount}}٪</span>
                        @else
                            <span
                                class="pdp-price-new">{{number_format($this->Select_Product->price)}}<small>تومان</small></span>
                        @endif

                    </div>

                    <!-- اخطار موجودی -->
                    @if($this->Select_Product->content <= 3)
                        <div class="pdp-stock-warning">
                            <svg>
                                <use href="#i-info"/>
                            </svg>
                            تنها <strong>{{$this->Select_Product->content}} عدد</strong> در انبار باقی مانده — عجله
                            کنید!
                        </div>
                    @endif


                    <!-- انتخاب رنگ -->
                    <div class="pdp-option">
                        <div class="pdp-option__header">
                            <span class="pdp-option__label">رنگ</span>
                            @if($select_color)
                                <span
                                    class="pdp-option__value">انتخاب‌شده: <strong>{{$select_color->name}}</strong></span>
                            @endif
                        </div>
                        <div class="pdp-colors" role="radiogroup" aria-label="انتخاب رنگ">
                            @foreach ($this->Select_Product->colors as $index => $color)
                                <button
                                    type="button"
                                    wire:click.prevent="selectColorProduct({{ $color->id }})"
                                    @if ($select_color?->id === $color->id)
                                        class="pdp-color is-active"
                                    aria-checked="true"
                                    @else
                                        class="pdp-color"
                                    aria-checked="false"
                                    @endif
                                    role="radio"
                                    style="--color: {{ $color->code }}"
                                    data-color="{{ $color->name }}"
                                    aria-label="{{ $color->name }}"
                                ></button>
                            @endforeach

                        </div>
                    </div>

                    <!-- انتخاب سایز -->
                    <div class="pdp-option">
                        <div class="pdp-option__header">
                            <span class="pdp-option__label">سایز</span>
                            <a href="#" class="pdp-sizes__guide">
                                <svg>
                                    <use href="#i-ruler"/>
                                </svg>
                                راهنمای سایز
                            </a>
                        </div>
                        <div class="pdp-sizes" role="radiogroup" aria-label="انتخاب سایز">
                            @foreach ($this->Select_Product->sizes as $index => $size)
                                @if($size->count != 0)
                                    <button
                                        role="radio"
                                        wire:click.prevent="selectSizeProduct({{$size->id}})"
                                        @if($select_size?->id === $size->id)
                                            class="pdp-size is-active" aria-checked="true"
                                        @else
                                            class="pdp-size"
                                        @endif

                                    >{{$size->size}}</button>
                                @else
                                    <button  title="اتمام موجودی" role="radio" class="pdp-size" disabled >{{$size->size}}</button>

                                @endif

                            @endforeach

                        </div>
                    </div>

                    <!-- تعداد + افزودن به سبد -->
                    <div class="pdp-purchase">
                        <div class="pdp-qty">
                            <button type="button" wire:click="decreaseProductCount"  aria-label="کاهش تعداد">−</button>
                            <span class="pdp-qty__value" id="qtyValue">{{$count}}</span>
                            <button type="button" wire:click="increaseProductCount" aria-label="افزایش تعداد">+</button>
                        </div>
                        <button  class="pdp-add-btn" id="addToCartBtn" wire:click="addToCart" type="button">
                            <svg>
                                <use href="#i-cart"/>
                            </svg>
                            <span class="pdp-add-btn__text">افزودن به سبد خرید</span>
                        </button>
                    </div>

                    <!-- خرید سریع -->
                    <button class="pdp-buy-now" type="button">
                        <svg>
                            <use href="#i-arrow-left"/>
                        </svg>
                        خرید سریع (بدون سبد)
                    </button>

                    <!-- نشان‌های اعتماد -->
                    <div class="pdp-trust">
                        <div class="pdp-trust-item">
                            <div class="pdp-trust-item__icon">
                                <svg>
                                    <use href="#i-truck"/>
                                </svg>
                            </div>
                            <div class="pdp-trust-item__text">
                                <strong>ارسال رایگان</strong>
                                برای خرید بالای ۵۰۰ هزار
                            </div>
                        </div>
                        <div class="pdp-trust-item">
                            <div class="pdp-trust-item__icon">
                                <svg>
                                    <use href="#i-headphones"/>
                                </svg>
                            </div>
                            <div class="pdp-trust-item__text">
                                <strong>پشتیبانی ۲۴/۷</strong>
                                پاسخگویی در تمام ساعات
                            </div>
                        </div>
                        <div class="pdp-trust-item">
                            <div class="pdp-trust-item__icon">
                                <svg>
                                    <use href="#i-refresh"/>
                                </svg>
                            </div>
                            <div class="pdp-trust-item__text">
                                <strong>بازگشت ۷ روزه</strong>
                                بدون قید و شرط
                            </div>
                        </div>
                        <div class="pdp-trust-item">
                            <div class="pdp-trust-item__icon">
                                <svg>
                                    <use href="#i-shield"/>
                                </svg>
                            </div>
                            <div class="pdp-trust-item__text">
                                <strong>پرداخت امن</strong>
                                توسط درگاه‌های معتبر
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <section class="pdp-details">
        <div class="container">
            <div class="pdp-details__inner">

                <div class="pdp-tabs" role="tablist">
                    <button class="pdp-tab is-active" data-tab="desc" role="tab" aria-selected="true">توضیحات محصول
                    </button>
{{--                    <button class="pdp-tab" data-tab="specs" role="tab" aria-selected="false">مشخصات فنی</button>--}}
{{--                    <button class="pdp-tab" data-tab="reviews" role="tab" aria-selected="false">دیدگاه‌ها (۱۲۸)</button>--}}
                </div>

                <div class="pdp-tab-panels">

                    <!-- توضیحات -->
                    <div class="pdp-tab-panel is-active" id="desc">
                        <div class="pdp-desc">
                          {{$this->Select_Product->description}}
                        </div>
                    </div>

{{--                    <!-- مشخصات -->--}}
{{--                    <div class="pdp-tab-panel" id="specs">--}}
{{--                        <div class="pdp-specs">--}}
{{--                            <div class="pdp-spec">--}}
{{--                                <div class="pdp-spec__icon">--}}
{{--                                    <svg>--}}
{{--                                        <use href="#i-layers"/>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                                <div class="pdp-spec__info">--}}
{{--                                    <span class="pdp-spec__label">جنس</span>--}}
{{--                                    <span class="pdp-spec__value">کتان ۱۰۰٪ خالص</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="pdp-spec">--}}
{{--                                <div class="pdp-spec__icon">--}}
{{--                                    <svg>--}}
{{--                                        <use href="#i-package"/>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                                <div class="pdp-spec__info">--}}
{{--                                    <span class="pdp-spec__label">سایزبندی</span>--}}
{{--                                    <span class="pdp-spec__value">S تا XL</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="pdp-spec">--}}
{{--                                <div class="pdp-spec__icon">--}}
{{--                                    <svg>--}}
{{--                                        <use href="#i-tag"/>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                                <div class="pdp-spec__info">--}}
{{--                                    <span class="pdp-spec__label">کشور سازنده</span>--}}
{{--                                    <span class="pdp-spec__value">ایران</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="pdp-spec">--}}
{{--                                <div class="pdp-spec__icon">--}}
{{--                                    <svg>--}}
{{--                                        <use href="#i-sun"/>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                                <div class="pdp-spec__info">--}}
{{--                                    <span class="pdp-spec__label">فصل</span>--}}
{{--                                    <span class="pdp-spec__value">چهارفصل</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="pdp-spec">--}}
{{--                                <div class="pdp-spec__icon">--}}
{{--                                    <svg>--}}
{{--                                        <use href="#i-droplet"/>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                                <div class="pdp-spec__info">--}}
{{--                                    <span class="pdp-spec__label">شستشو</span>--}}
{{--                                    <span class="pdp-spec__value">ماشین — ۳۰ درجه</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="pdp-spec">--}}
{{--                                <div class="pdp-spec__icon">--}}
{{--                                    <svg>--}}
{{--                                        <use href="#i-ruler"/>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                                <div class="pdp-spec__info">--}}
{{--                                    <span class="pdp-spec__label">نوع یقه</span>--}}
{{--                                    <span class="pdp-spec__value">ایتالیایی</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- دیدگاه‌ها -->--}}
{{--                    <div class="pdp-tab-panel" id="reviews">--}}
{{--                        <div class="pdp-desc">--}}
{{--                            <h3>دیدگاه کاربران</h3>--}}
{{--                            <p style="color: var(--text-muted); font-size: 0.9rem;">--}}
{{--                                بر اساس ۱۲۸ دیدگاه ثبت‌شده، امتیاز کلی این محصول <strong style="color: var(--accent);">۴.۲--}}
{{--                                    از ۵</strong> است.--}}
{{--                            </p>--}}
{{--                            <p>--}}
{{--                                بخش دیدگاه‌ها در ادامه‌ی توسعه پیاده‌سازی خواهد شد. اگر خواستی، می‌تونم کارت‌های--}}
{{--                                نظر کاربران رو هم اضافه کنم.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
    </section>
</div>
@assets
<link rel="stylesheet" href="{{asset('Panel/Notifications/style.css')}}">
<script src="{{asset('Panel/Notifications/script.js')}}"></script>
@endassets
@script
<script>
    document.addEventListener('click', function (event) {

        const thumb = event.target.closest('.pdp-gallery__thumb');

        if (!thumb) return;

        const gallery = thumb.closest('.pdp-gallery');

        if (!gallery) return;

        const mainImage = gallery.querySelector('#mainProductImage');

        if (!mainImage) return;

        // دریافت آدرس تصویر انتخاب‌شده
        const imageUrl = thumb.dataset.img;

        if (!imageUrl) return;

        // تغییر تصویر اصلی
        mainImage.src = imageUrl;

        // تغییر وضعیت دکمه‌های گالری
        gallery.querySelectorAll('.pdp-gallery__thumb').forEach(button => {

            button.classList.remove('is-active');

            button.setAttribute('aria-selected', 'false');

        });

        // فعال کردن تصویر انتخاب‌شده
        thumb.classList.add('is-active');

        thumb.setAttribute('aria-selected', 'true');

    });
    Livewire.on('increase', (event) => {
        Noty.toast({
            type: 'warning',
            message: event.message,
            duration: 4000,
        });
    });
    Livewire.on('decrease', (event) => {
        Noty.toast({
            type: 'warning',
            message:event.message,
            duration: 4000,
        });
    });
    Livewire.on('validationError', (event) => {
        Noty.toast({
            type: 'danger',
            message:event.message,
            duration: 4000,
        });
    });
    Livewire.on('addToCart', (event) => {
        NotyCart.cart({
            title: 'به سبد اضافه شد',
            productName: event.name,
            price: event.price,
            quantity: event.count,
            duration: 4000,
        });
    });


</script>
@endscript
