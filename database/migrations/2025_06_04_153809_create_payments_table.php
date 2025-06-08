<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void {
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->constrained()->onDelete('cascade');
        $table->string('midtrans_order_id')->nullable()->unique();
        $table->string('snap_token')->nullable();
        $table->decimal('gross_amount', 10, 2)->nullable(); // Menyimpan total dari Midtrans
        $table->enum('payment_status', ['pending', 'paid', 'failed', 'expired'])->default('pending');
        $table->string('code')->unique(); // ← Tambahkan di sini
        $table->timestamps();
    });
}

    public function down(): void {
        Schema::dropIfExists('payments');
    }
};
