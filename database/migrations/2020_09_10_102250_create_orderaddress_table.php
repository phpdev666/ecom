<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderaddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderaddress', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('product_id');
            $table->string('qty');
            $table->string('price');
            $table->integer('user_id');
            $table->integer('add_id');
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
        Schema::dropIfExists('orderaddress');
    }
}
