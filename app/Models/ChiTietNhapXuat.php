<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
