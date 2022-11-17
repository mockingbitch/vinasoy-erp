<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\DanhMuc;
use App\Repositories\Contracts\Interface\DanhMucRepositoryInterface;
use App\Repositories\BaseRepository;

class DanhMucRepository extends BaseRepository implements DanhMucRepositoryInterface
{
    public function getModel()
    {
        return DanhMuc::class;
    }
}