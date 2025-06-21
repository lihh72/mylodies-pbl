<?php

namespace App\Policies;

use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderItemPolicy
{
public function review(User $user, OrderItem $item): bool
{
    return $item->order->user_id === $user->id && !$item->review;
}
}
