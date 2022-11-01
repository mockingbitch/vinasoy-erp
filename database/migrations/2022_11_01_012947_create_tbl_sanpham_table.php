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
        Schema::create('tbl_sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('tenSP');
            $table->unsignedBigInteger('danhmuc_id');
            $table->foreign('danhmuc_id')->references('id')->on('tbl_danhmuc');
            $table->unsignedBigInteger('nhacungcap_id');
            $table->foreign('nhacungcap_id')->references('id')->on('tbl_nhacungcap');
            $table->string('soLuong')->nullable();
            $table->string('nsx')->nullable();
            $table->string('hsd')->nullable();
            $table->string('donGia');
            $table->string('moTa')->nullable();
            $table->string('img')->nullable();
            $table->string('trangThai');
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
        Schema::dropIfExists('tbl_sanpham');
    }
};
