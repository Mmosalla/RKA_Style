<?php

use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Cart\Models\Cart;

new class extends Component {
    #[Computed]
    public function carts()
    {

        return Cart::query()
            ->where('user_id', auth()->user()->id)
            ->with(['product'])
            ->get();
    }
};
?>

<div>
    <header class="site-header" id="siteHeader">
        <div class="site-header__inner">
            <div class="header-slogan">پوشش <span>برتر</span></div>

            <nav class="header-nav">
                <button class="header-nav__item header-nav__item--categories" id="categoriesTrigger"
                        aria-haspopup="true" aria-expanded="false">دسته‌بندی
                </button>
                <a href="{{route('all_product')}}" class="header-nav__item">محصولات</a>
            </nav>

            <div class="header-brand">
                <!-- جستجو — با data-modal="search" -->
                <button class="icon-btn" data-modal="search" aria-label="جستجو">
                    <svg>
                        <use href="#i-search"/>
                    </svg>
                </button>
                <!-- ورود -->
                <button class="icon-btn" data-modal="login" aria-label="ورود به حساب">
                    <svg>
                        <use href="#i-user"/>
                    </svg>
                </button>
                <!-- سبد خرید — data-modal="cartSidebar" -->
                @if(auth()->user())
                    <button class="icon-btn" data-modal="cartSidebar" aria-label="سبد خرید">
                        <svg>
                            <use href="#i-cart"/>
                        </svg>
                        <span class="cart-badge">{{$this->carts->count()}}</span>
                    </button>
                    <a href="{{route('home')}}" class="logo">آرکا<span>.</span></a>
                @endif

            </div>
        </div>
    </header>
</div>
