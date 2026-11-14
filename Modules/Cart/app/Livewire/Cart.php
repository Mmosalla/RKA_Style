<?php

namespace Modules\Cart\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Cart\Models\Address;
use Modules\Cart\Models\City;
use Modules\Cart\Models\Province;
use Modules\Order\Models\Order;
use Modules\Order\Models\OrderDetail;
use Modules\Product\Services\mainPriceService;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class Cart extends Component
{
    public $provinces, $cities;
    public $province_id, $city_id, $name, $mobile, $address, $postcode;
    public $total_price = 0;
    public $total_discount = 0;

    #[Computed]
    public function carts()
    {
        return \Modules\Cart\Models\Cart::query()
            ->with('product')
            ->where('user_id', auth()->user()->id)
            ->get();
    }

    public function mount(): void
    {
        $this->provinces = Province::query()->pluck('name', 'id');
        $this->cities = collect();

        foreach ($this->carts as $cart){
            $price = $cart->product->price;
            $this->total_price += $price * $cart->count;

            $discount = $cart->product->discount;
            $this->total_discount +=  (new mainPriceService())->getPrice($price , $discount) * $cart->count ;
        }

    }

    public function changeProvince($province_id): void
    {
        $this->cities = City::query()->where('province_id', $province_id)->pluck('name', 'id');
    }



    public function increaseProductCount($cart_id): void
    {
        $cart = \Modules\Cart\Models\Cart::query()
            ->where('user_id', auth()->id())
            ->with('product')
            ->findOrFail($cart_id);

        if ($cart->count >= $cart->product->content) {
            $this->dispatch(
                'decrease',
                message: 'موجودی این محصول کافی نیست'
            );

            return;
        }

        $cart->increment('count');
    }

    public function decreaseProductCount($cart_id): void
    {
        $cart = \Modules\Cart\Models\Cart::query()
            ->where('user_id', auth()->id())
            ->findOrFail($cart_id);

        if ($cart->count <= 1) {
            $this->dispatch(
                'decrease',
                message: 'حداقل تعداد خرید یک عدد می‌باشد'
            );

            return;
        }

        $cart->decrement('count');
    }

    public function deleteFromCart($cart_id): void
    {
        \Modules\Cart\Models\Cart::query()->where('user_id', auth()->id())->findOrFail($cart_id)->delete();
    }

    public function payment()
    {
        $this->validate([
            'province_id'=>'required',
            'city_id'=>'required',
            'postcode'=>'required',
            'address' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $address = Address::query()->create([
                'user_id' => auth()->user()->id,
                'province_id' => $this->province_id,
                'city_id' => $this->city_id,
                'name' => $this->name ?? auth()->user()->name,
                'mobile' => $this->mobile ?? auth()->user()->mobile,
                'address' => $this->address,
                'postcode' => $this->postcode,
            ]);
            $order = Order::query()->create([
                'user_id'=> auth()->user()->id,
                'address_id'=>$address->id,
                'order_code'=> generateRandomInteger(6),
                'total_price'=>$this->total_price,
                'total_discount' => $this->total_discount,
            ]);
            $carts = \Modules\Cart\Models\Cart::query()
                ->where('user_id', auth()->user()->id)
                ->get();
            foreach ($carts as $cart){
                DB::commit();
                $pay_price = $this->total_price - $this->total_discount;
                $result =  \Shetabit\Payment\Facade\Payment::purchase(
                    (new Invoice)->amount($pay_price),
                    function($driver, $transactionId) use ($order) {
                        $order->update([
                            'transaction_id'=>$transactionId
                        ]);
                    }
                )->pay()->toJson();
                   return $this->redirect(json_decode($result)->action);
            }
        }catch (\Exception $exception){
            $this->dispatch('error', message:'خطا سرور');
            DB::rollBack();
        }

    }

    #[Layout('cart::components.layouts.master')]
    #[Title('سبد خرید')]
    public function render(): view
    {
        return view('cart::livewire.cart');
    }
}
