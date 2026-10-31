<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <section class="filter-section">
        <div class="container">
            <div class="filter-tabs" role="tablist">
                <button class="filter-tab is-active" role="tab" aria-selected="true">
                    <svg>
                        <use href="#i-grid"/>
                    </svg>
                    همه
                    <span class="filter-tab__count">۱۸</span>
                </button>
                <button class="filter-tab" role="tab" aria-selected="false">
                    <svg>
                        <use href="#i-shirt"/>
                    </svg>
                    لباس
                    <span class="filter-tab__count">۵</span>
                </button>
                <button class="filter-tab" role="tab" aria-selected="false">
                    <svg>
                        <use href="#i-pants"/>
                    </svg>
                    شلوار
                    <span class="filter-tab__count">۲</span>
                </button>
                <button class="filter-tab" role="tab" aria-selected="false">
                    <svg>
                        <use href="#i-shoe"/>
                    </svg>
                    کفش
                    <span class="filter-tab__count">۴</span>
                </button>
                <button class="filter-tab" role="tab" aria-selected="false">
                    <svg>
                        <use href="#i-hat"/>
                    </svg>
                    کلاه
                    <span class="filter-tab__count">۲</span>
                </button>
                <button class="filter-tab" role="tab" aria-selected="false">
                    <svg>
                        <use href="#i-watch"/>
                    </svg>
                    اکسسوری
                    <span class="filter-tab__count">۵</span>
                </button>
            </div>
        </div>
    </section>
</div>
