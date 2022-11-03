<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SanPham;
use App\Models\NhapXuat;

class ChiTietNhapXuat extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'tbl_chitietnhapxuat';

    /**
     * @var array
     */
    protected $fillable = [
       'nhapxuat_id',
       'sanpham_id',
       'soLuong',
       'donGia'
    ];

    /**
     * @return void
     */
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'sanpham_id');
    }

    /**
     * @return void
     */
    public function nhapXuat()
    {
        return $this->belongsTo(NhapXuat::class, 'nhapxuat_id');
    }
}
