<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('carts', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->timestamps();
    });

    Schema::create('cart_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('cart_id')->constrained()->onDelete('cascade');
    $table->foreignId('product_id')->constrained()->onDelete('cascade');
    $table->date('start_date');
    $table->date('end_date');
    $table->integer('quantity')->default(1);
    $table->decimal('total_price', 10, 2);
    $table->timestamps();
});



    }

    public function down(): void {
        Schema::dropIfExists('carts');
    }
};
