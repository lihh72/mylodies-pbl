<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements FilamentUser, MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gauth_id', // tambahkan ini
        'identity_card',
        'identity_card_verified_at', // tambahkan ini
        'gauth_type', // tambahkan ini
        'address', // ganti 'shipping_address' dengan 'address'
        'district', // tambahkan ini
        'phone_number',
        'province', // tambahkan ini
        'city', // tambahkan ini
        'postal_code', // tambahkan ini
        'profile_picture',
        'email_verified_at',
        'phone_number_verified_at', // tambahkan ini
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

protected function casts(): array
{
    return [
        'email_verified_at' => 'datetime',
        'identity_card_verified_at' => 'datetime', // ← tambahkan ini
        'password' => 'hashed',
    ];
}


    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole('admin'); // Pastikan role ini sesuai dengan database
    }

    public function orders()
{
    return $this->hasMany(Order::class);
}

public function productReviews() {
    return $this->hasMany(ProductReview::class);
}

}
