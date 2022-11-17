<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\ChiTietNhapXuat;
use App\Repositories\Contracts\Interface\ChiTietNhapXuatRepositoryInterface;
use App\Repositories\BaseRepository;

class ChiTietNhapXuatRepository extends BaseRepository implements ChiTietNhapXuatRepositoryInterface
{
    public function getModel()
    {
        return ChiTietNhapXuat::class;
    }

    /**
     * @param integer $id
     * 
     * @return object
     */
    public function findByNhapXuatId(int $id) : object
    {
        return $this->model->where('nhapxuat_id', $id)->where('deleted_at', '=', null)->get();
    }
}