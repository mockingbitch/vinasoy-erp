<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\NhaCungCap;
use App\Repositories\Contracts\Interface\NhaCungCapRepositoryInterface;
use App\Repositories\BaseRepository;

class NhaCungCapRepository extends BaseRepository implements NhaCungCapRepositoryInterface
{
    public function getModel()
    {
        return NhaCungCap::class;
    }
}