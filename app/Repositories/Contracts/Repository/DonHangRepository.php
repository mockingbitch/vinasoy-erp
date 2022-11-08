<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\DonHang;
use App\Repositories\Contracts\Interface\DonHangRepositoryInterface;
use App\Repositories\BaseRepository;

class DonHangRepository extends BaseRepository implements DonHangRepositoryInterface
{
    public function getModel()
    {
        return DonHang::class;
    }
}