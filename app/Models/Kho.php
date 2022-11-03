<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Kho;

class Kho extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'tbl_kho';

    /**
     * @var array
     */
    protected $fillable = [
        'sanpham_id',
        'soLuong',
        'nsx',
        'hsd',
        'donGia',
        'trangThai'
    ];

    /**
     * @return void
     */
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'sanpham_id');
    }
}
