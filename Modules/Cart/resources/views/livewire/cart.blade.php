@php use Modules\Product\Services\mainPriceService; @endphp
<div>
    @include('auth::components.layouts.loader')

    <section class="checkout-section">
        <div class="container">
            <div class="checkout-layout">

                <!-- ستون اصلی -->
                <div class="checkout-main">

                    <!-- ============ بخش ۱: سبد خرید ============ -->
                    <div class="checkout-card" id="step-cart">
                        <header class="checkout-card__header">
                            <div class="checkout-card__title-wrap">
                                <span class="checkout-card__step">۱</span>
                                <h2 class="checkout-card__title">سبد خرید شما</h2>
                            </div>
                            <span class="checkout-card__badge">{{$this->carts->count()}} محصول</span>
                        </header>

                        <div class="cart-list">
                            @forelse($this->carts as $cart)
                                <article class="cart-item-card">
                                    <div class="cart-item-card__media">
                                        <img src="{{asset('Images/Products/' . $cart->product->main_image)}}"
                                             alt="{{$cart->product->title}}">
                                        @if($cart->product->discoint)
                                            <span class="discount-badge">{{$cart->product->discount}}٪</span>
                                        @endif
                                    </div>
                                    <div class="cart-item-card__info">
                                        <span class="cart-item-card__cat">{{$cart->product->category->title}}</span>
                                        <h3 class="cart-item-card__title">{{$cart->product->title}}</h3>
                                        <div class="cart-item-card__meta">
                    <span class="cart-item-card__meta-item">
                      <span class="cart-item-card__meta-label">سایز:</span>
                      <span class="cart-item-card__meta-value">{{$cart->size->size}}</span>
                    </span>
                                            <span class="cart-item-card__meta-item">
                      <span class="cart-item-card__meta-label">رنگ:</span>
                      <span class="cart-item-card__color-dot" style="background:{{$cart->color->code}}"></span>
                      <span class="cart-item-card__meta-value">{{$cart->color->name}}</span>
                    </span>
                                        </div>
                                    </div>
                                    <div class="cart-item-card__qty-wrap">
                                        <div class="qty-control">
                                            <button class="qty-btn"
                                                    wire:click.prevent="decreaseProductCount({{$cart->id}})"
                                                    aria-label="کاهش">−
                                            </button>
                                            <span class="qty-value">{{$cart->count}}</span>
                                            <button class="qty-btn"
                                                    wire:click.prevent="increaseProductCount({{$cart->id}})"
                                                    aria-label="افزایش">+
                                            </button>
                                        </div>
                                    </div>
                                    @if($cart->product->discount)
                                        <div class="cart-item-card__price-wrap">
                                            <span
                                                class="cart-item-card__price-old">{{number_format($cart->product->price)}}</span>
                                            <span class="cart-item-card__price-new">{{number_format((new mainPriceService())->getPrice($cart->product->price , $cart->product->discount))}}<small> ت</small></span>
                                        </div>
                                    @endif

                                    <button wire:click.prevent="deleteFromCart({{$cart->id}})" class="cart-item-card__remove" aria-label="حذف از سبد">
                                        <svg>
                                            <use href="#i-x"/>
                                        </svg>
                                    </button>
                                </article>
                            @empty
                                <p>سبد خرید خالی است</p>
                            @endforelse

                        </div>
                    </div>

                    <!-- ============ بخش ۲: اطلاعات ارسال ============ -->
                    <div class="checkout-card" id="step-address">
                        <header class="checkout-card__header">
                            <div class="checkout-card__title-wrap">
                                <span class="checkout-card__step">۲</span>
                                <h2 class="checkout-card__title">اطلاعات ارسال</h2>
                            </div>
                        </header>

                        <div class="form-grid">
                            <!-- استان -->
                            <div class="form-field">
                                <label class="form-label" for="province">استان</label>
                                <div class="form-select-wrap">
                                    <select wire:model="province_id" wire:change="changeProvince($event.target.value)" class="form-select" id="province" name="province">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($provinces as $key=>$value)
                                            <option value="{{$key}}" >{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                    <span style="text-decoration-color: red" >{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- شهر -->
                            <div class="form-field">
                                <label class="form-label" for="city">شهر</label>
                                <div class="form-select-wrap">
                                    <select wire:model="city_id" class="form-select" id="city" name="city">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($cities as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('city_id')
                                <span style="text-decoration-color: red" >{{$message}}</span>
                                @enderror
                            </div>

                            <!-- کد پستی -->
                            <div class="form-field form-field--full">
                                <label class="form-label" for="postalCode">کد پستی</label>
                                <input
                                    wire:model="postcode"
                                    type="text"
                                    class="form-input"
                                    id="postalCode"
                                    name="postalCode"
                                    placeholder="۱۰ رقم — مثال: ۱۲۳۴۵۶۷۸۹۰"
                                    maxlength="10"
                                    inputmode="numeric"
                                />
                                @error('postcode')
                                <span style="text-decoration-color: red" >{{$message}}</span>
                                @enderror
                            </div>


                            <!-- آدرس کامل -->
                            <div class="form-field form-field--full">
                                <label class="form-label" for="address">آدرس کامل پستی</label>
                                <textarea
                                    wire:model="address"
                                    class="form-textarea"
                                    id="address"
                                    name="address"
                                    rows="3"
                                    placeholder="خیابان، کوچه، پلاک، واحد..."
                                ></textarea>
                                @error('address')
                                <span style="text-decoration-color: red" >{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

{{--                    <!-- ============ بخش ۳: شیوه‌ی ارسال ============ -->--}}
{{--                    <div class="checkout-card" id="step-shipping">--}}
{{--                        <header class="checkout-card__header">--}}
{{--                            <div class="checkout-card__title-wrap">--}}
{{--                                <span class="checkout-card__step">۳</span>--}}
{{--                                <h2 class="checkout-card__title">شیوه‌ی ارسال</h2>--}}
{{--                            </div>--}}
{{--                        </header>--}}

{{--                        <div class="shipping-options">--}}

{{--                            <!-- ارسال عادی — پیش‌فرض -->--}}
{{--                            <label class="shipping-option">--}}
{{--                                <input type="radio" name="shipping" value="standard" class="shipping-option__input"--}}
{{--                                       checked/>--}}
{{--                                <div class="shipping-option__content">--}}
{{--                                    <div class="shipping-option__icon">--}}
{{--                                        <svg>--}}
{{--                                            <use href="#i-truck"/>--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="shipping-option__info">--}}
{{--                                        <div class="shipping-option__title">ارسال عادی</div>--}}
{{--                                        <div class="shipping-option__desc">۳ تا ۵ روز کاری — پست پیشتاز</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="shipping-option__price shipping-option__price--free">رایگان</div>--}}
{{--                                    <div class="shipping-option__radio"></div>--}}
{{--                                </div>--}}
{{--                            </label>--}}

{{--                            <!-- ارسال سریع -->--}}
{{--                            <label class="shipping-option">--}}
{{--                                <input type="radio" name="shipping" value="express" class="shipping-option__input"/>--}}
{{--                                <div class="shipping-option__content">--}}
{{--                                    <div class="shipping-option__icon">--}}
{{--                                        <svg>--}}
{{--                                            <use href="#i-clock"/>--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="shipping-option__info">--}}
{{--                                        <div class="shipping-option__title">ارسال سریع</div>--}}
{{--                                        <div class="shipping-option__desc">۱ تا ۲ روز کاری — پیک اختصاصی</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="shipping-option__price">۵۰,۰۰۰ ت</div>--}}
{{--                                    <div class="shipping-option__radio"></div>--}}
{{--                                </div>--}}
{{--                            </label>--}}

{{--                            <!-- تحویل حضوری -->--}}
{{--                            <label class="shipping-option">--}}
{{--                                <input type="radio" name="shipping" value="pickup" class="shipping-option__input"/>--}}
{{--                                <div class="shipping-option__content">--}}
{{--                                    <div class="shipping-option__icon">--}}
{{--                                        <svg>--}}
{{--                                            <use href="#i-store"/>--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="shipping-option__info">--}}
{{--                                        <div class="shipping-option__title">تحویل حضوری</div>--}}
{{--                                        <div class="shipping-option__desc">دریافت از فروشگاه — تهران، ولیعصر</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="shipping-option__price shipping-option__price--free">رایگان</div>--}}
{{--                                    <div class="shipping-option__radio"></div>--}}
{{--                                </div>--}}
{{--                            </label>--}}

{{--                        </div>--}}
{{--                    </div>--}}

                </div>

                <!-- ============ ستون سایدبار: خلاصه سفارش ============ -->
                <aside class="checkout-summary">
                    <div class="order-summary">
                        <div class="order-summary__header">
                            <h3>خلاصه سفارش</h3>
                            <span class="order-summary__badge">۳{{$this->carts->count()}}محصول</span>
                        </div>

                        <div class="order-summary__rows">
                            <div class="order-summary__row">
                                <span>جمع سبد خرید</span>
                                <span>    {{ number_format($this->carts->sum(function ($cart) {
                                return $cart->product->price * $cart->count;})) }} ت</span>
                            </div>
                            <div class="order-summary__row order-summary__row--discount">
                                <span>تخفیف محصولات</span>
                                <span>{{
    number_format(
        $this->carts->sum(function ($cart) {

    $finalPrice = (new \Modules\Product\Services\mainPriceService())
        ->getPrice($cart->product->price, $cart->product->discount);

    return ($cart->product->price - $finalPrice) * $cart->count;
}))
}}</span>
                            </div>
                            <div class="order-summary__row order-summary__row--free">
                                <span>هزینه ارسال</span>
                                <span>رایگان</span>
                            </div>
                        </div>

                        <div class="order-summary__divider"></div>

                        <div class="order-summary__total">
                            <span>مبلغ قابل پرداخت</span>
                            <strong>    {{ number_format($this->carts->sum(function ($cart) {
                                return (new \Modules\Product\Services\mainPriceService())
                                    ->getPrice($cart->product->price, $cart->product->discount)
                                    * $cart->count;
                            })) }}<small> تومان</small></strong>
                        </div>

                        <!-- دکمه‌ی پرداخت — بدون منطق، فقط UI -->
                        <button wire:click="payment" class="btn btn--accent order-summary__cta" type="button">
                            <svg>
                                <use href="#i-lock"/>
                            </svg>
                            <span>تأیید و انتقال به درگاه پرداخت</span>
                        </button>

                        <!-- نشان‌های اعتماد -->
                        <div class="order-summary__trust">
              <span class="trust-item">
                <svg><use href="#i-shield"/></svg>
                پرداخت امن
              </span>
                            <span class="trust-item">
                <svg><use href="#i-refresh"/></svg>
                بازگشت ۷ روزه
              </span>
                            <span class="trust-item">
                <svg><use href="#i-truck"/></svg>
                ارسال سریع
              </span>
                            <span class="trust-item">
                <svg><use href="#i-clock"/></svg>
                پشتیبانی ۲۴/۷
              </span>
                        </div>

                        <!-- روش‌های پرداخت -->
                        <div class="payment-methods">
                            <span class="payment-methods__label">پرداخت از طریق:</span>
                            <span class="payment-methods__icon">شتاب</span>
                            <span class="payment-methods__icon">زرین‌پال</span>
                        </div>
                    </div>
                </aside>

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
            message: event.message,
            duration: 4000,
        });
    });
    Livewire.on('error', (event) => {
        Noty.toast({
            type: 'danger',
            message: event.message,
            duration: 4000,
        });
    });




</script>
@endscript
