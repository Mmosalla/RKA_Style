<?php

namespace Modules\Cart\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Cart\Database\Factories\CityFactory;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'province_id',
    ];
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
    // protected static function newFactory(): CityFactory
    // {
    //     // return CityFactory::new();
    // }
}
