<?php

namespace App\Repositories\Contracts\Interface;

use App\Repositories\BaseRepositoryInterface;

interface SanPhamRepositoryInterface extends BaseRepositoryInterface
{
    public function getListSuggest(?string $nhacc);
    
    public function getListSPFromRequest($data = []);

    public function getProducts();
}