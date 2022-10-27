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
        Schema::create('tbl_phucloi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nhanvien_id');
            $table->foreign('nhanvien_id')->references('id')->on('tbl_nhanvien');
            $table->string('baoHiem')->nullable();
            $table->string('thuongTet')->nullable();
            $table->string('troCap')->nullable();
            $table->string('moTa')->nullable();
            $table->string('ngayTao')->nullable();
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
        Schema::dropIfExists('tbl_phucloi');
    }
};
