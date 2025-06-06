<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'start_date',
        'end_date',
        'price',
    ];

    /**
     * Relasi ke order induk.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi ke produk yang dipesan.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
