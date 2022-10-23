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
        Schema::create('tbl_nhanvien', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('hoTen')->nullable();
            $table->string('gioiTinh')->nullable();
            $table->string('ngaySinh')->nullable();
            $table->string('thuongTru')->nullable();
            $table->string('tamTru')->nullable();
            $table->string('cccd')->nullable();
            $table->string('hocVan')->nullable();
            $table->string('ngoaiNgu')->nullable();
            $table->unsignedBigInteger('chucVu_id');
            $table->foreign('chucVu_id')->references('id')->on('tbl_chucvu');
            $table->unsignedBigInteger('maPhong_id');
            $table->foreign('maPhong_id')->references('id')->on('tbl_phongban');
            $table->string('stk')->nullable();
            $table->string('nganHang')->nullable();
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
        Schema::dropIfExists('tbl_nhanvien');
    }
};
