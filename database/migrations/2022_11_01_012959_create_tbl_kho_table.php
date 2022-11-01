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
        Schema::create('tbl_kho', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sanpham_id');
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham');
            $table->string('soLuong')->default(0);
            $table->string('nsx');
            $table->string('hsd');
            $table->string('trangThai')->nullable();
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
        Schema::dropIfExists('tbl_kho');
    }
};
