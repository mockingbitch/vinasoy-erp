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
        Schema::create('tbl_luong', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nhanVien_id');
            $table->foreign('nhanvien_id')->references('id')->on('tbl_nhanvien');
            $table->unsignedBigInteger('phongban_id');
            $table->foreign('phongban_id')->references('id')->on('tbl_phongban');
            $table->unsignedBigInteger('chucvu_id');
            $table->foreign('chucvu_id')->references('id')->on('tbl_chucvu');
            $table->unsignedBigInteger('phucloi_id');
            $table->foreign('phucloi_id')->references('id')->on('tbl_phucloi');
            $table->string('tienLuong')->default(0);
            $table->string('trangThai')->default(0);
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
        Schema::dropIfExists('tbl_luong');
    }
};
