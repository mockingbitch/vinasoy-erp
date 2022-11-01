<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\Kho;
use App\Repositories\Contracts\Interface\KhoRepositoryInterface;
use App\Repositories\BaseRepository;

class KhoRepository extends BaseRepository implements KhoRepositoryInterface
{
    public function getModel()
    {
        return Kho::class;
    }
}