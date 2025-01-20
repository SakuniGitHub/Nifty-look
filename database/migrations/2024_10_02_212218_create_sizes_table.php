<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size_name');  // The name of the size (e.g., Small, Medium, Large)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sizes');
    }
}
