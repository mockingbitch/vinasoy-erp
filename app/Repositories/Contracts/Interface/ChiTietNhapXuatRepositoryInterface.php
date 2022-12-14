<?php

namespace App\Repositories\Contracts\Interface;

use App\Repositories\BaseRepositoryInterface;

interface ChiTietNhapXuatRepositoryInterface extends BaseRepositoryInterface
{
    public function findByNhapXuatId(int $id);
}