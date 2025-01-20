<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistTable extends Migration
{
    public function up()
    {
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to the users table
            $table->unsignedBigInteger('product_id'); // Foreign key to the products table
            $table->string('product_name');
            $table->string('category');
            $table->decimal('buy_price', 10, 2);
            $table->decimal('sell_price', 10, 2);
            $table->decimal('old_price', 10, 2)->nullable();
            $table->integer('stock_quantity');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->text('description')->nullable();
            $table->string('product_image')->nullable();
            $table->timestamp('date')->useCurrent(); // Defaults to the current timestamp
            $table->timestamps(); // Adds created_at and updated_at columns

            // Optional: If you want to set up foreign key constraints
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlist');
    }
}
