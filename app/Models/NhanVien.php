<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChucVu;
use App\Models\PhongBan;

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

    /**
     * Relationship: model ChucVu
     *
     * @return void
     */
    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'chucvu_id');
    }

    /**
     * Relationship: model PhongBan
     *
     * @return void
     */
    public function phongBan()
    {
        return $this->belongsTo(PhongBan::class, 'maphong_id');
    }
}
