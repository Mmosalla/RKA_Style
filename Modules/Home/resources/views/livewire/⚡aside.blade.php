<?php

use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Cart\Models\Cart;

new class extends Component {

    public $count = 1;

    #[Computed]
    public function carts()
    {

        return Cart::query()
            ->where('user_id', auth()->user()->id)
            ->with(['product'])
            ->get();
    }


    public function deleteProductFromCart($product_id): void
    {
        Cart::query()->findOrFail($product_id)->delete();
        $this->dispatch('productDeleteFromCart', message: 'محصول از سبد خرید حذف شد');
    }


};
?>

<div>

    <aside class="cart-sidebar" id="cartSidebar" role="dialog" aria-modal="true" aria-label="سبد خرید">
        <div class="cart-sidebar__backdrop" data-close="cartSidebar"></div>
        <div class="cart-sidebar__panel">
            <header class="cart-sidebar__header">
                <h3 class="cart-sidebar__title">سبد خرید ({{$this->carts->count()}})</h3>
                <button class="cart-sidebar__close" data-close="cartSidebar" aria-label="بستن">
                    <svg>
                        <use href="#i-x"/>
                    </svg>
                </button>
            </header>
            <div class="cart-sidebar__items">

                <!-- آیتم ۱ — دکمه‌ی حذف گوشه‌ی بالا-چپ -->
                @forelse($this->carts as $cart)
                    <div class="cart-item">
                        <button wire:click.prevent="deleteProductFromCart({{$cart->id}})" class="cart-item__remove"
                                aria-label="حذف از سبد">
                            <svg>
                                <use href="#i-x"></use>
                            </svg>
                        </button>
                        <div class="cart-item__thumb">
                            <img src="{{asset('Images/Products/' . $cart->product->main_image)}}" alt="">
                        </div>
                        <div class="cart-item__info">
                            <div class="cart-item__name">{{$cart->product->title}}</div>
                            <div class="cart-item__qty">
                                <strong>رنگ :</strong>
                                <span>{{$cart->color->name}} </span>
                            </div>
                            <div class="cart-item__qty">
                                <strong>تعداد :</strong>
                                <span>{{$cart->count}} </span>
                            </div>
                            <div
                                class="cart-item__price">{{number_format((new \Modules\Product\Services\mainPriceService())->getPrice($cart->product->price , $cart->product->discount))}}
                                <small> ت</small></div>
                        </div>
                    </div>
                @empty

                @endforelse


                <div class="cart-sidebar__footer">
                    <div class="cart-total">
                        <span>مجموع کل</span>
                        <strong>
                            {{ number_format($this->carts->sum(function ($cart) {
                                return (new \Modules\Product\Services\mainPriceService())
                                    ->getPrice($cart->product->price, $cart->product->discount)
                                    * $cart->count;
                            })) }}
                            تومان
                        </strong>
                    </div>
                    <button class="btn btn--accent">ادامه فرایند خرید</button>
                </div>
            </div>
        </div>
    </aside>
</div>
