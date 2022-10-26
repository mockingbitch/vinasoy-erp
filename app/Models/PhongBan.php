<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'tbl_phongban';

    /**
     * @var array
     */
    protected $fillable = [
        'tenPhong',
        'trangThai',
        'ghiChu'
    ];
}
