<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <div class="search-modal" id="searchModal" role="dialog" aria-modal="true" aria-label="جستجو">
        <div class="search-modal__backdrop" data-close="search"></div>
        <div class="search-modal__content">
            <button class="modal-close" data-close="search" aria-label="بستن">
                <svg><use href="#i-x"/></svg>
            </button>
            <div class="search-modal__input-wrap">
                <input type="text" class="search-modal__input" id="searchInput" placeholder="جستجو در بین محصولات..." autocomplete="off" />
                <button class="search-modal__icon-btn" data-close="search" aria-label="بستن جستجو">
                    <svg><use href="#i-search"/></svg>
                </button>
            </div>
            <div class="search-results" id="searchResults">
                <div class="search-result">
                    <div class="search-result__thumb"><svg><use href="#i-shirt"/></svg></div>
                    <div class="search-result__info"><div class="search-result__name">پیراهن کتان کرم</div><div class="search-result__cat">پیراهن</div></div>
                    <span class="search-result__price">۳۹۰,۰۰۰<small> ت</small></span>
                </div>
                <div class="search-result">
                    <div class="search-result__thumb"><svg><use href="#i-shoe"/></svg></div>
                    <div class="search-result__info"><div class="search-result__name">کفش چرم کلاسیک</div><div class="search-result__cat">کفش</div></div>
                    <span class="search-result__price">۱,۰۳۶,۰۰۰<small> ت</small></span>
                </div>
                <div class="search-result">
                    <div class="search-result__thumb"><svg><use href="#i-watch"/></svg></div>
                    <div class="search-result__info"><div class="search-result__name">ساعت مچی کلاسیک</div><div class="search-result__cat">ساعت</div></div>
                    <span class="search-result__price">۱,۸۴۰,۰۰۰<small> ت</small></span>
                </div>
                <div class="search-result">
                    <div class="search-result__thumb"><svg><use href="#i-pants"/></svg></div>
                    <div class="search-result__info"><div class="search-result__name">شلوار جین آبی</div><div class="search-result__cat">شلوار</div></div>
                    <span class="search-result__price">۶۵۰,۰۰۰<small> ت</small></span>
                </div>
                <div class="search-result">
                    <div class="search-result__thumb"><svg><use href="#i-hat"/></svg></div>
                    <div class="search-result__info"><div class="search-result__name">کلاه بیسبالی</div><div class="search-result__cat">کلاه</div></div>
                    <span class="search-result__price">۱۸۷,۰۰۰<small> ت</small></span>
                </div>
                <div class="search-result">
                    <div class="search-result__thumb"><svg><use href="#i-bag"/></svg></div>
                    <div class="search-result__info"><div class="search-result__name">کیف چرم دستی</div><div class="search-result__cat">کیف</div></div>
                    <span class="search-result__price">۸۵۰,۰۰۰<small> ت</small></span>
                </div>
            </div>
        </div>
    </div>
</div>
