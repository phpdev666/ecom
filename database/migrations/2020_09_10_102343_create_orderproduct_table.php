<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderproductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderproduct', function (Blueprint $table) {
            $table->id('add_id');
            $table->string('fist_name'); 
            $table->string('last_name'); 
            $table->string('number');   
            $table->string('email');   
            $table->text('address'); 
            $table->string('country');  
            $table->string('state'); 
            $table->string('City'); 
            $table->string('pincode');
            $table->string('user_id');
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
        Schema::dropIfExists('orderproduct');
    }
}
