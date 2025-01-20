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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number')->unique();
            $table->string('product_name');
            $table->string('category');
            $table->decimal('rent_price', 8, 2);
            $table->integer('total_quantity');
            $table->integer('available_quantity');
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
        Schema::dropIfExists('rents');
    }
};
