<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\NhanVien;
use App\Repositories\Contracts\Interface\NhanVienRepositoryInterface;
use App\Repositories\BaseRepository;

class NhanVienRepository extends BaseRepository implements NhanVienRepositoryInterface
{
    public function getModel()
    {
        return NhanVien::class;
    }
}