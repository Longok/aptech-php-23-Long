<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->Increments('product_id');// $table->bigIncrements('id');
            $table->string('product_name'); // ('name')->unique();
            $table->string('product_price'); //giá tiền nên lưu theo kiểu float
            $table->string('product_image'); //('image');
            $table->timestamps();
            //thêm table: unit, unit_price, promotion_price, description, new?1:0, ;
        });
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
