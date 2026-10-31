<?php

use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Category\Models\Category;
use Modules\Product\Enums\ProductStatusEnum;
use Modules\Product\Models\Product;

new class extends Component {
    #[Computed]
    public function accessoryProducts()
    {
        $accessory = Category::query()
            ->where('title', 'اکسسوری')
            ->with('childCategory.childCategory')
            ->firstOrFail();

        $accessoryIds = collect([$accessory->id]);

        foreach ($accessory->childCategory as $child) {
            $accessoryIds->push($child->id);

            foreach ($child->childCategory as $subChild) {
                $accessoryIds->push($subChild->id);
            }
        }

        return Product::query()
            ->where('status', \Modules\Product\Enums\ProductStatusEnum::ACTIVE->value)
            ->whereIn('category_id', $accessoryIds)
            ->with('category')
            ->take(10)
            ->get();
    }
};
?>

<div>
    <section class="products-section">
        <div class="container">
            <header class="section-header">
                <h2 class="section-header__title">اکسسوری</h2>
                <a href="#" class="section-header__link">مشاهده همه ←</a>
            </header>
            <div class="products-row">
                @forelse($this->accessoryProducts as $product)
                    <article class="product-card">
                        <div class="product-card__media">
                            <svg>
                                <img src="{{asset('Images/Products/' . $product->main_image)}}" alt="{{$product->slug}}">
                            </svg>
                            @if($product->discount)
                                <span class="product-card__badge">تخفیف</span><span
                                    class="discount-badge discount-badge--low">{{$product->discount}}٪</span>
                            @endif
                        </div>
                        <div class="product-card__body"><span
                                class="product-card__cat">{{$product->category->title}}</span>
                            <h3 class="product-card__title">{{$product->title}}</h3>
                            <div class="product-card__footer">
                                @if($product->discount > 0)

                                    <div class="product-card__prices">

                                        <span class="product-card__price-old">
                                            {{ number_format($product->price) }}
                                        </span>

                                        <span class="product-card__price-new product-card__price-new--discounted">
                                            {{ number_format(
                                                (new \Modules\Home\Services\MainPericeService())
                                                    ->getPrice($product->price, $product->discount)
                                            ) }}
                                            <small>ت</small>
                                        </span>

                                    </div>

                                @else

                                    <div class="product-card__prices">

                                        <span class="product-card__price-new">
                                            {{ number_format($product->price) }}
                                            <small>ت</small>
                                        </span>

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
                @empty
                    <div class="products-row">

                    </div>
                @endforelse
            </div>
            <div class="section-cta"><a href="#" class="btn">مشاهده بیشتر</a></div>
        </div>
    </section>
</div>
