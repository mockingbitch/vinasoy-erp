<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\NhapXuat;
use App\Repositories\Contracts\Interface\NhapXuatRepositoryInterface;
use App\Repositories\BaseRepository;

class NhapXuatRepository extends BaseRepository implements NhapXuatRepositoryInterface
{
    public function getModel()
    {
        return NhapXuat::class;
    }
}