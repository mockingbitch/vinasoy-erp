<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\ChiTietNhapXuat;
use App\Repositories\Contracts\Interface\ChiTietNhapXuatRepositoryInterface;
use App\Repositories\BaseRepository;

class ChiTietNhapXuatRepository extends BaseRepository implements ChiTietNhapXuatRepositoryInterface
{
    public function getModel()
    {
        return ChiTietNhapXuat::class;
    }
}