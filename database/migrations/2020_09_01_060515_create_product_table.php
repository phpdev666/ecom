<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            if (!Schema::hasTable('product')) {
        Schema::create('product', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('modelno');
            $table->integer('cat_id');
            $table->string('productname');
            $table->text('shot_description');
            $table->text('description');
            $table->text('image');
            $table->string('price');
            $table->string('discount');
            $table->string('discount_price');
            $table->string('sell_price');
            $table->string('status');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
