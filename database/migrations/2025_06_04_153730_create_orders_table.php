<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('name'); // nama pemesan
    $table->date('start_date');
    $table->date('end_date');
     $table->string('invoice_number')->nullable();
        $table->string('invoice_path')->nullable();
    $table->string('shipping_address')->nullable();
    $table->string('phone_number')->nullable();
    $table->decimal('total_price', 10, 2);
    $table->decimal('base_price', 10, 2)->default(0); // harga dasar sebelum biaya Shipping
    $table->decimal('shipping_cost', 10, 2)->default(0); // biaya Shipping
    $table->enum('status', ['pending', 'processing', 'shipped', 'arrive', 'cancelled', 'returned'])->default('pending');
    $table->timestamps();
});

Schema::create('order_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('order_id')->constrained()->onDelete('cascade');
    $table->foreignId('product_id')->constrained()->onDelete('cascade');
    $table->integer('quantity')->default(1);
    $table->decimal('price', 10, 2); // harga satuan
    $table->date('start_date');
    $table->date('end_date');

    $table->decimal('total_price', 10, 2); // total untuk item ini
    $table->integer('weight')->nullable(); // berat item, jika diperlukan
    $table->timestamps();
});

    }

    public function down(): void {
        Schema::dropIfExists('orders');
    }
};
