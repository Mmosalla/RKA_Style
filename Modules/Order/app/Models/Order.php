<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Auth\Models\User;
use Modules\Cart\Models\Address;

// use Modules\Order\Database\Factories\OrderFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'address_id',
        'order_code',
        'total_price',
        'total_discount',
        'transaction_id',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

//    public function orderDetails(): HasMany
//    {
//        return $this->hasMany(OrderDetail::class);
//    }
}
