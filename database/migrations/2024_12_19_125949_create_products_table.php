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
            $table->string('reference_number')->unique(); // Store the reference number here
            $table->string('product_name');
            $table->string('category');
            $table->decimal('buy_price', 8, 2);
            $table->decimal('sell_price', 8, 2);
            $table->decimal('old_price', 8, 2)->nullable();
            $table->integer('stock_quantity');
            $table->string('size');
            $table->string('color');
            $table->text('description')->nullable();
            $table->string('product_image')->nullable();
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
