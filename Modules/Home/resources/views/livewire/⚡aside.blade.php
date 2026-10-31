<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <aside class="cart-sidebar" id="cartSidebar" role="dialog" aria-modal="true" aria-label="سبد خرید">
        <div class="cart-sidebar__backdrop" data-close="cartSidebar"></div>
        <div class="cart-sidebar__panel">
            <header class="cart-sidebar__header">
                <h3 class="cart-sidebar__title">سبد خرید (۲)</h3>
                <button class="cart-sidebar__close" data-close="cartSidebar" aria-label="بستن">
                    <svg><use href="#i-x"/></svg>
                </button>
            </header>
            <div class="cart-sidebar__items">

                <!-- آیتم ۱ — دکمه‌ی حذف گوشه‌ی بالا-چپ -->
                <div class="cart-item">
                    <button class="cart-item__remove" aria-label="حذف از سبد">
                        <svg><use href="#i-x"/></svg>
                    </button>
                    <div class="cart-item__thumb"><svg><use href="#i-shirt"/></svg></div>
                    <div class="cart-item__info">
                        <div class="cart-item__name">پیراهن کتان کرم</div>
                        <div class="cart-item__qty">
                            <button aria-label="کاهش">−</button>
                            <span>۲</span>
                            <button aria-label="افزایش">+</button>
                        </div>
                    </div>
                    <div class="cart-item__price">۷۸۰,۰۰۰<small> ت</small></div>
                </div>

                <!-- آیتم ۲ -->
                <div class="cart-item">
                    <button class="cart-item__remove" aria-label="حذف از سبد">
                        <svg><use href="#i-x"/></svg>
                    </button>
                    <div class="cart-item__thumb"><svg><use href="#i-shoe"/></svg></div>
                    <div class="cart-item__info">
                        <div class="cart-item__name">کفش چرم کلاسیک</div>
                        <div class="cart-item__qty">
                            <button aria-label="کاهش">−</button>
                            <span>۱</span>
                            <button aria-label="افزایش">+</button>
                        </div>
                    </div>
                    <div class="cart-item__price">۱,۰۳۶,۰۰۰<small> ت</small></div>
                </div>

            </div>
            <div class="cart-sidebar__footer">
                <div class="cart-total">
                    <span>مجموع کل</span>
                    <strong>۱,۸۱۶,۰۰۰ تومان</strong>
                </div>
                <button class="btn btn--accent">ادامه فرایند خرید</button>
            </div>
        </div>
    </aside>
</div>
