<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // ✅ Izinkan mass assignment untuk kolom berikut:
    protected $fillable = [
    'name',
    'slug',
    'category',
    'rental_price_per_day',
    'description',
    'full_description',
    'images',
    'highlights',
    'included_items',
    'badge',
];

protected $casts = [
    'images' => 'array',
    'highlights' => 'array',
    'included_items' => 'array',
];


public function orders()
{
    return $this->hasMany(Order::class);
}

// Model Product
public function images()
{
    return $this->hasMany(ProductImage::class);
}

// Optional, buat method untuk ambil main image
public function mainImage()
{
    return $this->images()->where('is_main', true)->first() ?? $this->images()->first();
}

}
