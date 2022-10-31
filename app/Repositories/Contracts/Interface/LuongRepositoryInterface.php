<?php

namespace App\Repositories\Contracts\Interface;

use App\Repositories\BaseRepositoryInterface;

interface LuongRepositoryInterface extends BaseRepositoryInterface
{
    public function getByUser(?int $id);
}