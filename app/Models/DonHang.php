<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonHang extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'tbl_donhang';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'ten',
        'email',
        'diaChi',
        'sdt',
        'ghiChu',
        'tong',
        'status'
    ];
}
