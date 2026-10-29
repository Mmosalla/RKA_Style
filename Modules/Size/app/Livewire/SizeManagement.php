<?php

namespace Modules\Size\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Color\Models\Color;
use Modules\Product\Models\Product;
use Modules\Size\Models\Size;

class SizeManagement extends Component
{
    public Product $product;

    public $sizeValue;
    public $search;
    public $count;

    #[Computed]
    public function sizes()
    {
        return Size::query()
            ->with('product')
            ->paginate(10);
    }

    public function createSize()
    {
        $this->validate([
            'sizeValue' => 'required|unique:sizes,size',
            'count' => 'required'
        ]);

        Size::query()->create([
            'size' => $this->sizeValue,
            'count' => $this->count,
            'product_id' => $this->product->id,
        ]);
        $this->reset(['sizeValue' , 'count']);
        $this->dispatch('size.created');
    }

    #[On('size.delete')]
    public function deleteSize($id): void
    {
        Size::query()->findOrFail($id)->delete();
    }

    public function searchData(): void
    {
        $this->sizes = Size::query()
            ->where('size', 'like', '%' . $this->search . '%')
            ->paginate(10);
    }

    #[Layout('dashboard::components.layouts.master')]
    #[Title('مدیرت سایز ها')]
    public function render(): view
    {
        return view('size::livewire.size-management');
    }
}
