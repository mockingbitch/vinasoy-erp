<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'tbl_nhanvien';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'hoTen',
        'gioiTinh',
        'ngaySinh',
        'thuongTru',
        'tamTru',
        'cccd',
        'hocVan',
        'ngoaiNgu',
        'chucvu_id',
        'maphong_id',
        'stk',
        'nganHang'
    ];
}
