<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HopDongLaoDong extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'tbl_phongban';

    /**
     * @var array
     */
    protected $fillable = [
        'nhanvien_id',
        'loaiHDLD',
        'ngayBatDau',
        'ngayKetThuc',
        'diaDiemLamViec',
        'ngachluong_id'
    ];
}
