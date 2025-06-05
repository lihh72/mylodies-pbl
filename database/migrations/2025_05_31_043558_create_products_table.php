<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Instrument name
            $table->string('slug')->unique(); // ✅ Slug unik
            $table->string('category'); // Instrument category
            $table->decimal('rental_price_per_day', 10, 2);
            $table->text('description')->nullable();
            $table->longText('full_description')->nullable(); // ✅ Full description
            $table->string('images')->nullable(); // Product image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
