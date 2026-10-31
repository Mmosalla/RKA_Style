<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <section class="brand-section">
        <div class="container">
            <div class="brand-card">

                <!-- اسلایدر ۵ تصویر خالص -->
                <div class="brand-slider" id="brandSlider">
                    <div class="brand-slide is-active"><img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=1600&q=80&auto=format&fit=crop" alt="کالکشن اینسایران ۱" /></div>
                    <div class="brand-slide"><img src="https://images.unsplash.com/photo-1490114538077-0a7f8cb49891?w=1600&q=80&auto=format&fit=crop" alt="کالکشن اینسایران ۲" /></div>
                    <div class="brand-slide"><img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=1600&q=80&auto=format&fit=crop" alt="کالکشن اینسایران ۳" /></div>
                    <div class="brand-slide"><img src="https://images.unsplash.com/photo-1492707892479-7bc8d5a4ee93?w=1600&q=80&auto=format&fit=crop" alt="کالکشن اینسایران ۴" /></div>
                    <div class="brand-slide"><img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?w=1600&q=80&auto=format&fit=crop" alt="کالکشن اینسایران ۵" /></div>

                    <button class="brand-arrow brand-arrow--prev" id="brandPrev" aria-label="قبلی">
                        <svg><use href="#i-arrow-left"/></svg>
                    </button>
                    <button class="brand-arrow brand-arrow--next" id="brandNext" aria-label="بعدی">
                        <svg><use href="#i-arrow-right"/></svg>
                    </button>

                    <div class="brand-dots" id="brandDots">
                        <button class="brand-dot is-active" data-brand-go="0" aria-label="۱"></button>
                        <button class="brand-dot" data-brand-go="1" aria-label="۲"></button>
                        <button class="brand-dot" data-brand-go="2" aria-label="۳"></button>
                        <button class="brand-dot" data-brand-go="3" aria-label="۴"></button>
                        <button class="brand-dot" data-brand-go="4" aria-label="۵"></button>
                    </div>
                </div>

                <!-- بنر برند زیر اسلایدر -->
                <div class="brand-banner">
                    <div class="brand-banner__info">
                        <span class="brand-banner__eyebrow">✦ کالکشن اختصاصی</span>
                        <h3 class="brand-banner__title">
                            محصولات <em>اینسایران</em>
                        </h3>
                    </div>
                    <a href="#" class="brand-banner__link">
                        مشاهده کالکشن
                        <svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                    </a>
                </div>

            </div>
        </div>
    </section>
</div>
