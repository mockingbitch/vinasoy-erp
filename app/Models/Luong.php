<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Luong extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'tbl_luong';

    /**
     * @var array
     */
    protected $fillable = [
        'nhanvien_id',
        'thang',
        'tienLuong',
        'trangThai'
    ];
}
