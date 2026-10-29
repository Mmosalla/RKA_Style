<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Category\Models\Category;
use Modules\Color\Models\Color;
use Modules\Size\Models\Size;

// use Modules\Product\Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'main_image',
        'price',
        'discount',
        'category_id',
        'status',
        'viewed',
        'sold',
    ];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    // protected static function newFactory(): ProductFactory
    // {
    //     // return ProductFactory::new();
    // }
}
