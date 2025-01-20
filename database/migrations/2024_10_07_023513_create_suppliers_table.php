<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); // id INT AUTO_INCREMENT PRIMARY KEY
            $table->string('supplier_name', 255); // supplier_name VARCHAR(255) NOT NULL
            $table->string('company_name', 255); // company_name VARCHAR(255) NOT NULL

            $table->string('email', 255); // email VARCHAR(255) NOT NULL
            $table->string('phone_number', 20); // phone_number VARCHAR(20) NOT NULL

            $table->text('address'); // address TEXT NOT NULL

            $table->string('supplier_code', 50)->nullable(); // supplier_code VARCHAR(50), optional

            $table->timestamps(); // adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
