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
            $table->Increments('product_id');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_image');
            $table->timestamps();
            //chưa chuẩn hóa dữ liệu! đặt tên k đúng ngữ nghĩa
            //thiếu table..
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
