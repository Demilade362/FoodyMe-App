<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'price'
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
