<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\Luong;
use App\Repositories\Contracts\Interface\LuongRepositoryInterface;
use App\Repositories\BaseRepository;

class LuongRepository extends BaseRepository implements LuongRepositoryInterface
{
    public function getModel()
    {
        return Luong::class;
    }
}