<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Modules\Product\Enums\ProductStatusEnum;
use Modules\Product\Models\Product;


new class extends Component {
    use WithPagination;

    #[Computed]
    public function allProduct()
    {
        return Product::query()
            ->with('category')
            ->where('status', ProductStatusEnum::ACTIVE->value)
            ->paginate(15);
    }
};
?>

<div>
    <section class="products-grid-section">
        <div class="container">

            <div class="products-toolbar">
                <span class="products-count">نمایش <strong>۱۸</strong> از <strong>۵۴</strong> محصول</span>
                <div class="sort-wrap">
                    <select class="sort-select" aria-label="مرتب‌سازی">
                        <option>جدیدترین</option>
                        <option>پرفروش‌ترین</option>
                        <option>ارزان‌ترین</option>
                        <option>گران‌ترین</option>
                        <option>بیشترین تخفیف</option>
                    </select>
                </div>
            </div>
            @forelse($this->allProduct as $product)
                <div class="products-grid">
                    <article class="product-card">
                        <div class="product-card__media">
                            <svg>
                                <img src="{{asset('Images/Products' . $product->main_image)}}" alt="{{$product->slug}}">
                            </svg>
                            <span class="product-card__badge">جدید</span>
                            @if($product->discount)
                                <span
                                    class="discount-badge discount-badge--mid">{{$product->discount}}٪</span>
                            @endif
                        </div>
                        <div class="product-card__body"><span class="product-card__cat">{{$product->category->title}}</span>
                            <h3 class="product-card__title">{{$product->title}}</h3>
                            <div class="product-card__footer">
                                @if($product->discount)
                                    <div class="product-card__prices"><span class="product-card__price-old">{{number_format($product->discount)}}</span><span
                                            class="product-card__price-new product-card__price-new--discounted">{{ number_format(
    (new \Modules\Home\Services\MainPericeService())
        ->getPrice($product->price, $product->discount)
) }}<small> ت</small></span>
                                    </div>
                                @else
                                    <div class="product-card__prices">
                                        <span
                                            class="product-card__price-new product-card__price-new--discounted">{{number_format($product->price)}}<small> ت</small></span>
                                    </div>
                                @endif


                                <button class="product-card__add" aria-label="افزودن">
                                    <svg>
                                        <use href="#i-plus"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
            @endforelse

            <!-- صفحه‌بندی -->
            {{$this->allProduct->links('vendor.livewire.admin_pagination')}}

        </div>
    </section>
</div>
