<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DanhMuc extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'tbl_danhmuc';

    /**
     * @var array
     */
    protected $fillable = [
        'tenDanhMuc',
        'moTa',
        'trangThai'
    ];
}
