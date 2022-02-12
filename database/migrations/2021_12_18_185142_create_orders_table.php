<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id',0)->nullable();
            $table->integer('adress_id');
            $table->string('transaction_code', 30);
            $table->string('contact_with', 50)->nullable();
            $table->string('order_detail');
            $table->string('transaction_photo')->nullable();
            $table->string('status', 20)->default('unchecked');
            $table->string('deliverer_phone'. 20)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
