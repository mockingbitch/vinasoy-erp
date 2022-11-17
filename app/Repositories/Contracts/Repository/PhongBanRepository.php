<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\PhongBan;
use App\Repositories\Contracts\Interface\PhongBanRepositoryInterface;
use App\Repositories\BaseRepository;

class PhongBanRepository extends BaseRepository implements PhongBanRepositoryInterface
{
    public function getModel()
    {
        return PhongBan::class;
    }
}