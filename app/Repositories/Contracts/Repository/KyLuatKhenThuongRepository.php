<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\KyLuatKhenThuong;
use App\Repositories\Contracts\Interface\KyLuatKhenThuongRepositoryInterface;
use App\Repositories\BaseRepository;

class KyLuatKhenThuongRepository extends BaseRepository implements KyLuatKhenThuongRepositoryInterface
{
    public function getModel()
    {
        return KyLuatKhenThuong::class;
    }
}