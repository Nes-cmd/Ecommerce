<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Table for customers adress information

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id', false)->nullable();
            $table->string('country', 30)->default('Ethiopia');
            $table->string('region', 40);
            $table->string('zone', 30);
            $table->string('street', 40);
            $table->string('street_2', 40)->nullable();
            $table->string('posta_number', 8)->nullable();
            $table->string('map_loccation')->nullable();
            $table->string('phone');
            $table->string('zipcode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adresses');
    }
}
