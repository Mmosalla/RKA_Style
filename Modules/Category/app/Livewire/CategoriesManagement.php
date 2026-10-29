<?php

namespace Modules\Category\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Models\Category;

class CategoriesManagement extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $editIndex;

    public  $image;

    public string $title;

    public  $parent_id = 0;

    public $search;

    #[Computed]
    public function categories()
    {
        return Category::query()
            ->with('parentCategory')
            ->paginate(10);
    }

    public function createRow(): void
    {

        $this->validate([
            'title' => 'required|unique:categories,title',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:20048',
            'parent_id' => 'nullable',
        ]);
        $image_name = null;
        if ($this->image) {
            $image_name = $this->image->hashName();
            $this->image->storeAs('Images/Categories', $image_name, 'public');
        }
        Category::query()
            ->create([
                'title' => $this->title,
                'image' => $image_name,
                'parent_id' => $this->parent_id,
                'slug' => make_slug($this->title),
            ]);
        $this->dispatch('category.created');
        $this->reset(['title', 'image', 'parent_id']);
    }
    public function editRow($id): void
    {
        $category = Category::query()->findOrFail($id);
        $this->editIndex = $id;
        $this->title = $category->title;
        $this->parent_id = $category->parent_id;
    }

    public function updateRow(): void
    {
        $this->validate([
            'title' => 'required|unique:categories,title,' . $this->editIndex,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'parent_id' => 'nullable',
        ]);
        $category = Category::query()->findOrFail($this->editIndex);
        if ($this->image) {
            $image_name = $this->image->hashName();
            $this->image->storeAs('Images/Categories', $image_name, 'public');
        }
        $category->update([
            'title' => $this->title,
            'slug' => make_slug($this->title),
            'parent_id' => $this->parent_id,
            'image' => $this->image ? $image_name : $category->image,
        ]);
        $this->dispatch('category.updated');
        $this->reset(['title', 'image', 'parent_id', 'editIndex']);
    }
    #[On('category.delete')]
    public function deleteCategory($category_id): void
    {
        Category::query()->findOrFail($category_id)->delete();
    }

    public function searchData()
    {
        $this->categories = Category::query()
        ->where('title', 'like', '%' . $this->search . '%')
        ->paginate(10);
    }

    public function changeStatus($status , $id): void
    {

        if ($status === CategoryStatusEnum::ACTIVE->value) {
            Category::query()
                ->findOrFail($id)
                ->update(['status' => CategoryStatusEnum::INACTIVE->value]);
        }elseif ($status === CategoryStatusEnum::INACTIVE->value) {
            Category::query()
                ->findOrFail($id)
                ->update(['status' => CategoryStatusEnum::Draft->value]);
        }elseif ($status === CategoryStatusEnum::Draft->value) {
            Category::query()
                ->findOrFail($id)
                ->update(['status' => CategoryStatusEnum::ACTIVE->value]);
        }
        $this->dispatch('category.changeStatus');
    }


    #[Layout('dashboard::components.layouts.master')]
    #[Title('مدیرت دسته بندی ها')]
    public function render(): view
    {
        $categories = Category::getCategories();
        return view('category::livewire.categories-management', compact('categories'));
    }
}
