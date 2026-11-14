<?php

namespace Modules\SingleProduct\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Cart\Models\Cart;
use Modules\Color\Models\Color;
use Modules\Product\Models\Product;
use Modules\Product\Services\mainPriceService;
use Modules\Size\Models\Size;

class SingleProduct extends Component
{

    public Product $product;
    public $select_color  ;
    public $select_size  ;

    public $discount;

    public $price;

    public $count=1;
    public $max_sell=1;
    public $product_prices;

    public function mount(): void
    {

        $this->discount = $this->product->discount;
        $this->price = $this->product->price;
        $this->max_sell = $this->product->content;
    }

    #[Computed]
    public function Select_Product()
    {
        return Product::query()
            ->with(['Category', 'colors', 'sizes', 'galleries'])
            ->where('id' , $this->product->id)
            ->first();
    }
    public function selectColorProduct($color_id): void
    {
        $this->select_color = Color::query()->findOrFail($color_id);
    }
    public function selectSizeProduct($size_id): void
    {
        $this->select_size = Size::query()->findOrFail($size_id);
    }
    public function increaseProductCount(): void
    {
        if($this->count < $this->max_sell){
            $this->count++;
        }else{
            $this->dispatch('increase' , message:'بیشتر از حد موجودی محصول');
        }
    }
    public function decreaseProductCount(): void
    {
        if($this->count > 1){
            $this->count--;
        }else{
            $this->dispatch('decrease' , message:'حداقل خرید یک عدد می باشد');
        }
    }

    public function addToCart(): void
    {
        if ($this->select_size && $this->select_color) {


            if (auth()->user()) {
                $cart = Cart::query()
                    ->where('product_id', $this->product->id)
                    ->where('user_id', auth()->user()->id)
                    ->where('color_id', $this->select_color->id)
                    ->where('size_id', $this->select_size->id)
                    ->first();
                if ($cart) {
                    if ($cart->count + $this->count <= $this->max_sell) {
                        $cart->update([
                            'count' => $cart->count + $this->count
                        ]);
                        $this->dispatch('addToCart', name: $this->product->name, price: (new mainPriceService())->getPrice($this->product->price, $this->discount) * $this->count, count: $this->count);
                    }
                    $this->dispatch('increase', message: 'بیشتر از حد موجودی محصول');

                } else {
                    Cart::query()->create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $this->product->id,
                        'color_id' => $this->select_color->id,
                        'size_id' => $this->select_size->id,
                        'count' => $this->count
                    ]);
                    $this->dispatch('addToCart', name: $this->product->name, price: (new mainPriceService())->getPrice($this->product->price, $this->discount) * $this->count, count: $this->count);
//            $this->redirectRoute('user.cart');

                }
            } else {
                $this->redirectRoute('login');
            }
        }else{
            $this->dispatch('validationError' , message:'حداقل باید یک رنگ و سایز انتخاب بشود');
        }
    }


    #[Layout('singleproduct::components.layouts.master')]
    public function render(): view
    {
        return view('singleproduct::livewire.single-product')
            ->title('محصول: ' . $this->product->title);
    }
}
