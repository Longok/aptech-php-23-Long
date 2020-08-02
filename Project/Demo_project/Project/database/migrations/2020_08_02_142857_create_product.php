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
            $table->bigIncrements('id');
            $table->string('product_name')->unique();
            $table->string('product_price');// dùng kiểu float
            $table->integer('product_unit'); // dùng kiểu float
            $table->text('product_desc');
            $table->string('product_image');
            // thêm table số lượng sản phẩm! tình trạng sản phẩm: cũ hay mới
            // thêm khóa ngoại liên kết với bảng loại sản phẩm

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
        Schema::dropIfExists('product');
    }
}
