<?php

namespace Modules\Color\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Cart\Models\Cart;
use Modules\Product\Models\Product;

// use Modules\Color\Database\Factories\ColorFactory;

class Color extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'code',
        'product_id'
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // protected static function newFactory(): ColorFactory
    // {
    //     // return ColorFactory::new();
    // }
}
