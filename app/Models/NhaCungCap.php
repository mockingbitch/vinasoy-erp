<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhaCungCap extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'tbl_nhacungcap';

    /**
     * @var array
     */
    protected $fillable = [
        'tenNhaCC',
        'maSoThue',
        'sdt',
        'email',
        'fax',
        'website',
        'diaChi',
        'trangThai'
    ];
}
