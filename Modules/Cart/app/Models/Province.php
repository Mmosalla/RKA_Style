<?php

namespace Modules\Cart\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Modules\Cart\Database\Factories\ProvinceFactory;

class Province extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name'
    ];
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
    // protected static function newFactory(): ProvinceFactory
    // {
    //     // return ProvinceFactory::new();
    // }
}
