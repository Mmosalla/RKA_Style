<?php

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Modules\Category\Models\Category;


new class extends Component {
    #[Computed]
    public function parentCategories()
    {
        return Cache::remember(
            'category.parent_categories',
            now()->addDays(2),
            fn() => Category::query()
                ->where('parent_id', 0)
                ->get()
            ->toArray()
        );
    }
};
?>

<div>
    <section class="categories-section" id="categories">
        <div class="container">
            <div class="categories-grid">
                @foreach($this->parentCategories as $category)
                    <a href="#" class="category-card">
                        <div class="category-circle">
                            <svg>
                                <use href="#i-{{$category['image']}}"/>
                            </svg>
                        </div>
                        <span class="category-label">{{$category['title']}}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</div>
