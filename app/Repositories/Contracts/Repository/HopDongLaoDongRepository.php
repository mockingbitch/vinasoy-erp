<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\HopDongLaoDong;
use App\Repositories\Contracts\Interface\HopDongLaoDongRepositoryInterface;
use App\Repositories\BaseRepository;

class HopDongLaoDongRepository extends BaseRepository implements HopDongLaoDongRepositoryInterface
{
    public function getModel()
    {
        return HopDongLaoDong::class;
    }

    /**
     * @param integer $id
     * 
     * @return object|null
     */
    public function getHDbyNhanVien(int $id) : ?object
    {
        return $this->model->where('nhanvien_id', $id)->first();
    }

    public function createOrUpdate(int $id, $data = []) 
    {
        $hdld = $this->getHDbyNhanVien($id);
        $data['nhanvien_id'] = $id;

        if (! $hdld || null == $hdld) :
            return $this->create($data);
        endif;

        return $this->update($id, $data);
    }
}