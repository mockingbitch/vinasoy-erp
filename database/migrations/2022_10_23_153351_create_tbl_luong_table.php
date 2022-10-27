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
            $table->string('thang');
            $table->string('tienLuong')->default(0);
            $table->string('trangThai')->default(0);
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
        Schema::dropIfExists('tbl_luong');
    }
};
