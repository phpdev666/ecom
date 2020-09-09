<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            if (!Schema::hasTable('review')) {
        Schema::create('review', function (Blueprint $table) {
            $table->id('review_id');
            $table->integer('product_id');
            $table->string('title');
            $table->text('description');
            $table->text('status_at');
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
        Schema::dropIfExists('review');
    }
}
