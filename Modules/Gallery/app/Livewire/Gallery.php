<?php

namespace Modules\Gallery\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Models\Product;

class Gallery extends Component
{
    use WithFileUploads;

    public Product $product;

    #[Validate(['images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096'])]
    public $images =[];
    public function createRow(){

        if($this->images){
            foreach ($this->images as $image) {

                $name = $image->hashName();
                $image->storeAs('Images/products/', $name,'public');

                \Modules\Gallery\Models\Gallery::query()->create([
                    'image'=> $name,
                    'product_id'=>$this->product->id,
                ]);
            }
        }
        $this->reset('images');
        $this->dispatch('gallery.created');

    }
    public function removeImage($index): void
    {
        unset($this->images[$index]);

        $this->images = array_values($this->images);
    }
    #[Computed]
    public function gallerire()
    {
        return \Modules\Gallery\Models\Gallery::query()
            ->where('product_id',$this->product->id)
            ->get();
    }


    #[On('photo.delete')]
    public function delete($id)
    {
        $image = \Modules\Gallery\Models\Gallery::query()->findOrFail($id);

        if ($image->image && Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();    }

    #[Layout('dashboard::components.layouts.master')]
    #[Title('مدیرت گالری محصول')]
    public function render(): view
    {
        return view('gallery::livewire.gallery');
    }
}
