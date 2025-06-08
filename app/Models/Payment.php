<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'midtrans_order_id',
        'snap_token',
        'payment_status',
        'gross_amount',
        'code',
    ];

    protected static function booted()
{
    static::creating(function ($payment) {
        do {
            $code = self::generateRandomCode();
        } while (self::where('code', $code)->exists());

        $payment->code = $code;
    });
}

protected static function generateRandomCode($length = 30)
{
    // Kombinasi huruf besar, kecil, angka, dan simbol URL-safe
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_~';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[random_int(0, strlen($characters) - 1)];
    }
    return $code;
}

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}

