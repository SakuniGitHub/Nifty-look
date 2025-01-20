<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('color_name');  // The name of the color
            $table->string('color_code')->nullable();  // Optional hex code or RGB value
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('colors');
    }
}
