<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\DanhMuc;
use App\Models\NhaCungCap;

class SanPham extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'tbl_sanpham';

    /**
     * @var array
     */
    protected $fillable = [
        'tenSP',
        'danhmuc_id',
        'nhacungcap_id',
        'donGia',
        'moTa',
        'img',
        'trangThai'
    ];

    /**
     * @return void
     */
    public function danhmuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danhmuc_id');
    }

    /**
     * @return void
     */
    public function nhacungcap()
    {
        return $this->belongsTo(Nhacungcap::class, 'nhacungcap_id');
    }
}
