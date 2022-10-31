<?php

namespace App\Repositories\Contracts\Interface;

use App\Repositories\BaseRepositoryInterface;

interface KyLuatKhenThuongRepositoryInterface extends BaseRepositoryInterface
{
    public function countKLKT(?int $id);
}