<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;

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