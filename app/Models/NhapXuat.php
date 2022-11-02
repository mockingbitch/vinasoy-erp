<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhapXuat extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'tbl_nhapxuat';

    /**
     * @var array
     */
    protected $fillable = [
       'nhacungcap_id',
       'user_id',
       'type',
       'tong'
    ];
}
