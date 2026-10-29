<?php

namespace Modules\Color\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Color\Models\Color;
use Modules\Product\Models\Product;

class ColorManagement extends Component
{
    public Product $product;
    public $colorName;
    public $colorCode;
    public $search ;

    #[Computed]
    public function colorList()
    {
        return Color::query()
            ->with('product')
            ->where('product_id' , $this->product->id)
            ->paginate(10);
    }

    public function createColor()
    {
        $this->validate([
            'colorName' => 'required',
            'colorCode' => 'required|regex:/^#?[0-9A-Fa-f]{6}$/',
        ]);

        Color::query()->create([
            'name' => $this->colorName,
            'code' => '#' . ltrim($this->colorCode, '#'),
            'product_id' => $this->product->id,
        ]);
        $this->reset(['colorName', 'colorCode']);
        $this->dispatch('color.created');
    }

    #[On('color.delete')]
    public function deleteProduct($id): void
    {
        Color::query()->findOrFail($id)->delete();
    }

    public function searchData(): void
    {
        $this->colorList = Color::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);
    }

    #[Layout('dashboard::components.layouts.master')]
    #[Title('مدیرت رنگ ها')]
    public function render(): view
    {
        return view('color::livewire.color-management');
    }
}
