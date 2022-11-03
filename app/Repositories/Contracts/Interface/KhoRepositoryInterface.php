<?php

namespace App\Repositories\Contracts\Interface;

use App\Repositories\BaseRepositoryInterface;

interface KhoRepositoryInterface extends BaseRepositoryInterface
{
    public function getByProduct();

    public function getDetail(int $id);

    public function checkNumberProduct($listSanPham = []);
}