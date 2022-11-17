<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChucVu extends Model
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
        'tenChucVu',
        'trangThai',
        'ghiChu'
    ];
}
