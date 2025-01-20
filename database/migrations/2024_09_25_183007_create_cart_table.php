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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->string('category');
            $table->decimal('buy_price', 8, 2);
            $table->decimal('sell_price', 8, 2);
            $table->decimal('old_price', 8, 2)->nullable();
            $table->integer('stock_quantity');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->text('description')->nullable();
            $table->string('product_image')->nullable();
            $table->date('date');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
