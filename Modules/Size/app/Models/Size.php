<?php

namespace Modules\Size\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Models\Product;

// use Modules\Size\Database\Factories\SizeFactory;

class Size extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'size',
        'product_id',
        'count'
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // protected static function newFactory(): SizeFactory
    // {
    //     // return SizeFactory::new();
    // }
}
