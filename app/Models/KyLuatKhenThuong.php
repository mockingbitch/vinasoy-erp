<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\NhanVien;

class KyLuatKhenThuong extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'tbl_chucvu';

    /**
     * @var array
     */
    protected $fillable = [
        'nhanvien_id',
        'hinhThuc',
        'soQuyetDinh',
        'ngayQuyetDinh',
        'lyDo',
        'mucPhat',
        'mucThuong',
        'nguoiKy'
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'nhanvien_id');
    }
}
