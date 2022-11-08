<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\ChiTietDonHang;
use App\Repositories\Contracts\Interface\ChiTietDonHangRepositoryInterface;
use App\Repositories\BaseRepository;

class ChiTietDonHangRepository extends BaseRepository implements ChiTietDonHangRepositoryInterface
{
    public function getModel()
    {
        return ChiTietDonHang::class;
    }
}