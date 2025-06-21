<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\OrderItem;
use App\Policies\OrderItemPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        OrderItem::class => OrderItemPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}

