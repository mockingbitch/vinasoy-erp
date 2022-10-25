<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\ChucVu;
use App\Repositories\Contracts\Interface\ChucVuRepositoryInterface;
use App\Repositories\BaseRepository;

class ChucVuRepository extends BaseRepository implements ChucVuRepositoryInterface
{
    public function getModel()
    {
        return ChucVu::class;
    }
}