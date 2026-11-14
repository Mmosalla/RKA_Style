<?php

namespace Modules\PaymentCallback\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Modules\Cart\Livewire\Cart;
use Modules\Order\Enums\OrderDetailStatusEnum;
use Modules\Order\Enums\OrderStatusEnum;
use Modules\Order\Models\Order;

class PaymentCallback extends Component
{
    #[Url]
    public $Authority;
    #[Url]
    public $Status;
    public $total_price,$total_discount;
    public $order;
    public function mount(): void
    {
        $this->order = Order::query()
            ->with('orderDetails')
            ->where('transaction_id', $this->Authority)->first();


        if($this->Status === 'OK'){
            $this->order->update([
                'status'=>OrderStatusEnum::Successful->value
            ]);

            $cart = \Modules\Cart\Models\Cart::query()
                ->where('user_id', auth()->user()->id)
                ->get();

            foreach ($cart as $cartItem) {
                $cartItem->delete();
            }

            foreach ($this->order->orderDetails as $detail){
                $product = $detail->product;

                $product->increment('sold', $detail->count);
                $product->decrement('content', $detail->count);
            }

        }else{
            $this->order->update([
                'status'=>OrderStatusEnum::Canceled->value
            ]);
//            DeleteCancelledOrderJob::dispatch($this->order)->delay( now()->addDays(10));
        }
    }
    #[Layout('paymentcallback::components.layouts.master')]
    public function render():view
    {
        return view('paymentcallback::livewire.payment-callback');
    }
}
