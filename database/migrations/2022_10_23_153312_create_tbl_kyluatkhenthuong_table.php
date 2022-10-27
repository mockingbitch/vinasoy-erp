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
        Schema::create('tbl_kyluatkhenthuong', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nhanvien_id');
            $table->foreign('nhanvien_id')->references('id')->on('tbl_nhanvien');
            $table->string('hinhThuc')->nullable();
            $table->string('soQuyetDinh')->nullable();
            $table->string('ngayQuyetDinh')->nullable();
            $table->string('lyDo')->nullable();
            $table->string('mucPhat')->nullable();
            $table->string('mucThuong')->nullable();
            $table->string('nguoiKy')->nullable();
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
        Schema::dropIfExists('tbl_kyluatkhenthuong');
    }
};
