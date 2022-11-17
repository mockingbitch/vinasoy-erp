<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chitietdonhang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donhang_id');
            $table->foreign('donhang_id')->references('id')->on('tbl_donhang');
            $table->unsignedBigInteger('sanpham_id');
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham');
            $table->integer('soLuong');
            $table->bigInteger('donGia');
            $table->bigInteger('tong');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
