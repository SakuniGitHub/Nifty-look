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
        Schema::create('seasonal_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('discount_name')->nullable();
            $table->decimal('discount_percentage', 4, 2)->nullable();
            $table->date('discount_from')->nullable();
            $table->date('discount_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasonal_discounts');
    }
};
