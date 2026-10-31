<?php

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Modules\Product\Models\Product;


new class extends Component {
    #[Computed]
    public function newProducts()
    {
        return
            Product::query()
                ->where('status', \Modules\Product\Enums\ProductStatusEnum::ACTIVE->value)
                ->with('Category')
                ->latest()
                ->take(8)
                ->get();

    }

};
?>

<div>
    <section class="products-section" id="products">
        <div class="container">
            <header class="section-header">
                <h2 class="section-header__title">محصولات جدید</h2>
                <a href="#" class="section-header__link">مشاهده همه ←</a>
            </header>
            <div class="products-row" id="row-new-1">
                @forelse($this->newProducts as $product)
                    <article class="product-card">
                        <div class="product-card__media">
                            <img src="{{asset('Images/Products/' . $product->main_image)}}" alt="{{$product->slug}}">
                            @if($product->discount > 0)
                                <span class="product-card__badge">جدید</span><span
                                    class="discount-badge discount-badge--mid">{{$product->discount}}٪</span>
                            @endif
                        </div>
                        <div class="product-card__body"><span
                                class="product-card__cat">{{$product->category->title}}</span>
                            <h3 class="product-card__title">{{$product->title}}</h3>
                            @if($product->discount > 0)
                                <div class="product-card__footer">
                                    <div class="product-card__prices"><span
                                            class="product-card__price-old">{{number_format($product->price)}}</span><span

                                        ></span>
                                        <span class="product-card__price-new product-card__price-new--discounted">
                                       {{ number_format(
        (new \Modules\Home\Services\MainPericeService())
            ->getPrice($product->price, $product->discount)
    ) }}<small>ت</small>
                                    </span></div>
                                    <button class="product-card__add" aria-label="افزودن">
                                        <svg>
                                            <use href="#i-plus"/>
                                        </svg>
                                    </button>
                                </div>
                            @else
                                <div class="product-card__footer">
                                    <div class="product-card__prices">
                                        <span class="product-card__price-new product-card__price-new--discounted">{{number_format($product->price)}}<small>ت</small>
                                    </span></div>
                                    <button class="product-card__add" aria-label="افزودن">
                                        <svg>
                                            <use href="#i-plus"/>
                                        </svg>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="products-row" id="row-new-1">
                    </div>
                @endforelse
            </div>
            <div class="section-cta"><a href="#" class="btn">مشاهده بیشتر</a></div>
        </div>
    </section>
</div>
