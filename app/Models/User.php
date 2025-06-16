<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gauth_id', // tambahkan ini
        'gauth_type', // tambahkan ini
        'address', // ganti 'shipping_address' dengan 'address'
        'phone_number',
        'province', // tambahkan ini
        'city', // tambahkan ini
        'postal_code', // tambahkan ini
        'profile_picture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
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

}
