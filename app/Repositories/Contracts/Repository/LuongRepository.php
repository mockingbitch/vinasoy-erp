<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\Luong;
use App\Repositories\Contracts\Interface\LuongRepositoryInterface;
use App\Repositories\BaseRepository;

class LuongRepository extends BaseRepository implements LuongRepositoryInterface
{
    public function getModel()
    {
        return Luong::class;
    }

    /**
     * @param integer|null $id
     * 
     * @return object
     */
    public function getByUser(?int $id) : object
    {
        return $this->model->where('nhanvien_id', $id)->get();
    }
}