<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Modules\Product\Enums\ProductStatusEnum;
use Modules\Product\Models\Product;


new class extends Component {
    #[Computed]
    public function sliders()
    {
        return Product::query()
            ->with('category')
            ->where('status', ProductStatusEnum::ACTIVE->value)
            ->latest()
            ->take(5)
            ->get();
      }
};
?>

<div>
    <section class="hero-slider" id="heroSlider">
        @foreach($this->sliders as $index=>$slider)
            <div @class(['slide','slide--' . ($index + 1),'is-active' => $index === 1,])>>
                <img class="slide__bg"
                     src="{{asset('Images/Products/' . $slider->main_image)}}"
                     alt="{{$slider->title}}"/>
                <div class="slide__overlay"></div>
                <div class="slide__inner">
                    <span class="slide__eyebrow">✦ کلکسیون پاییز ۱۴۰۴</span>
                    <h1 class="slide__title">استایل <span>مردانه</span><br>با شکوه بی‌پایان</h1>
                    <p class="slide__desc">مجموعه‌ای منتخب از بهترین پوشاک مردانه، طراحی‌شده برای مردانی که به جزئیات اهمیت
                        می‌دهند.</p>
                    <div class="slide__actions">
                        <a href="#categories" class="btn btn--accent">مشاهده کلکسیون</a>
                        <a href="#products" class="btn btn--glass">درباره ما</a>
                    </div>
                </div>
            </div>
        @endforeach



        <button class="slider-arrow slider-arrow--prev" id="sliderPrev" aria-label="اسلاید قبلی">
            <svg>
                <use href="#i-arrow-left"/>
            </svg>
        </button>
        <button class="slider-arrow slider-arrow--next" id="sliderNext" aria-label="اسلاید بعدی">
            <svg>
                <use href="#i-arrow-right"/>
            </svg>
        </button>

        <div class="slider-dots" id="sliderDots">
            <button class="slider-dot is-active" data-go="0" aria-label="اسلاید ۱"></button>
            <button class="slider-dot" data-go="1" aria-label="اسلاید ۲"></button>
            <button class="slider-dot" data-go="2" aria-label="اسلاید ۳"></button>
        </div>
    </section>
</div>
