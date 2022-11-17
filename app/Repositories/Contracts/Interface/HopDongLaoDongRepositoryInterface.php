<?php

namespace App\Repositories\Contracts\Interface;

use App\Repositories\BaseRepositoryInterface;

interface HopDongLaoDongRepositoryInterface extends BaseRepositoryInterface
{
    public function getHDbyNhanVien(int $id);
    public function createOrUpdate(int $id, $data = []);
}