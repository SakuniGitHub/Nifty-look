<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('first_name'); // First Name
            $table->string('last_name'); // Last Name
            $table->string('email')->unique(); // Email (unique)
            $table->string('password'); // Password
            $table->string('role')->default('admin'); // Role, defaults to 'admin'
            $table->timestamps(); // Created at & Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
