<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_type', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();//??
            $table->string('product_type');//??
            $table->integer('price');//??
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('product');//??
            //không hiểu vấn đề! làm lại
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_type');
    }
}
