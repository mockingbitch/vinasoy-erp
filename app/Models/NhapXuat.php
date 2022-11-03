<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\NhaCungCap;
use App\Models\User;

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

    /**
     * Undocumented function
     *
     * @return void
     */
    public function nhaCungCap()
    {
        return $this->belongsTo(NhaCungCap::class, 'nhacungcap_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
