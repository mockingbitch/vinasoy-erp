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
        Schema::create('tbl_hopdonglaodong', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nhanvien_id');
            $table->foreign('nhanvien_id')->references('id')->on('tbl_nhanvien');
            $table->string('loaiHDLD')->nullable();
            $table->string('ngayBatDau')->nullable();
            $table->string('ngayKetThuc')->nullable();
            $table->string('diaDiemLamViec')->nullable();
            $table->string('ngachLuong')->nullable();
            $table->string('bacLuong')->nullable();
            $table->string('heSoLuong')->nullable();
            $table->string('mucLuong')->nullable();
            $table->string('phuCap')->nullable();
            $table->string('nguoiKy')->nullable();
            $table->string('chucVu')->nullable();
            $table->string('ngayKy')->nullable();
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
        Schema::dropIfExists('tbl_hopdonglaodong');
    }
};
