<?php

namespace Modules\Product\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Modules\Category\Models\Category;
use Modules\Product\Enums\ProductStatusEnum;
use Modules\Product\Models\Product;

class ProductManagement extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $editIndex;
    public $mode = false;

    public $search;

    public $title;
    public $category_id;
    public $stock;
    public $price;
    public $image;
    public $description;
    public $discount;

    #[Computed]
    public function ProductList()
    {
        return Product::query()
            ->with('category')
            ->paginate(10);
    }

    public function createRow(): void
    {
        $this->validate([
            'title' => 'required|unique:products,title',
            'category_id' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'discount' => 'nullable|max:100',
        ]);

        $image_name = $this->image->hashName();
        $this->image->storeAs('Images/Products', $image_name, 'public');

        Product::query()
            ->create([
                'title' => $this->title,
                'slug' => make_slug($this->title),
                'category_id' => $this->category_id,
                'content' => $this->stock,
                'price' => $this->price,
                'description' => $this->description,
                'main_image' => $image_name,
                'discount' => $this->discount,
            ]);
        $this->reset([
            'title',
            'category_id',
            'stock',
            'price',
            'description',
            'discount',
            'image',
        ]);
        $this->dispatch('productCreated');
        $this->mode = false;

    }
    public function editRow($id): void
    {
        $this->editIndex = $id;
        $product = Product::query()->findOrFail($this->editIndex);
        $this->title = $product->title;
        $this->category_id = $product->category_id;
        $this->price = $product->price;
        $this->discount = $product->discount;
        $this->stock = $product->content;
        $this->description = $product->description;
        $this->image =null;
        $this->mode = true;

    }

    public function updateRow(): void
    {
        $product = Product::query()->findOrFail($this->editIndex);
        $this->validate([
            'title' => 'required|unique:products,title,' . $product->id,
            'category_id' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'discount' => 'nullable|max:100',
        ]);

        if ($this->image) {
            $image_name = $this->image->hashName();
            $this->image->storeAs('Images/Products', $image_name, 'public');
        }

        $product->update([
            'title' => $this->title,
            'slug' => make_slug($this->title),
            'category_id' => $this->category_id,
            'content' => $this->stock,
            'price' => $this->price,
            'description' => $this->description,
            'discount' => $this->discount,
            'main_image' => $this->image ? $image_name : $product->image,
        ]);
        $this->reset([
            'title',
            'category_id',
            'stock',
            'price',
            'description',
            'discount',
            'image',
            'editIndex'
        ]);
        $this->dispatch('productUpdated');
        $this->mode = false;

    }

    public function searchData(): void
    {
        $this->ProductList = Product::query()
            ->where('title', 'like', '%' . $this->search . '%')
            ->paginate(10);
    }

    public function changeStatus($status , $id): void
    {

        if ($status === ProductStatusEnum::ACTIVE->value) {
            Product::query()
                ->findOrFail($id)
                ->update(['status' => ProductStatusEnum::INACTIVE->value]);
        }elseif ($status === ProductStatusEnum::INACTIVE->value) {
            Product::query()
                ->findOrFail($id)
                ->update(['status' => ProductStatusEnum::ARCHIVE->value]);
        }elseif ($status === ProductStatusEnum::ARCHIVE->value) {
            Product::query()
                ->findOrFail($id)
                ->update(['status' => ProductStatusEnum::ACTIVE->value]);
        }
        $this->dispatch('product.changeStatus');
    }

    #[On('product.delete')]
    public function deleteProduct($id): void
    {
        Product::query()->findOrFail($id)->delete();
    }

    public function resetPage(): void
    {
        $this->reset();
        $this->mode = false;

    }

    public function codeMode(): void
    {
        $this->mode = true;
    }

    #[Layout('dashboard::components.layouts.master')]
    #[Title('مدیرت محصولات')]
    public function render(): view
    {
        $categories = Category::getCategories();
        return view('product::livewire.product-management' , compact('categories'));
    }
}
