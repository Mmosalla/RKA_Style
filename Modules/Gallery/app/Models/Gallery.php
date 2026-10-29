<?php

namespace Modules\Gallery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Models\Product;

// use Modules\Gallery\Database\Factories\GalleryFactory;

class Gallery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'image',
        'product_id'
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
}
    // protected static function newFactory(): GalleryFactory
    // {
    //     // return GalleryFactory::new();
    // }
}
