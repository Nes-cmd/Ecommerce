<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->float('price');
            $table->integer('status', 15)->default('1');
            $table->string('type', 30)->nullable();
            $table->string('photo_url')->nullable();
            $table->integer('speciality', 0)->default(0);
            // $table->string('view',25)->default(json_encode([1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0]));
            $table->text('operation')->nullable();
            $table->string('manufacturer', 60)->nullable();
            $table->text('description')->nullable();
            $table->text('color')->nullable();
            $table->float('rate')->default(3.75);
            $table->integer('vote')->default(1);
            $table->foreignId('category_id')->on('categories');
            $table->foreignId('posted_by')->on('users');
            $table->timestamps();
        });
    }
}