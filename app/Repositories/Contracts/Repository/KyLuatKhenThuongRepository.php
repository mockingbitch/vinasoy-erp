<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\KyLuatKhenThuong;
use App\Repositories\Contracts\Interface\KyLuatKhenThuongRepositoryInterface;
use App\Repositories\BaseRepository;

class KyLuatKhenThuongRepository extends BaseRepository implements KyLuatKhenThuongRepositoryInterface
{
    public function getModel()
    {
        return KyLuatKhenThuong::class;
    }

    public function countKLKT(?int $id)
    {
        $firstDayUTS = mktime (0, 0, 0, date("m"), 1, date("Y"));
        $lastDayUTS = mktime (0, 0, 0, date("m"), date('t'), date("Y"));
        $firstDay = date("d-m-Y", $firstDayUTS);
        $lastDay = date("d-m-Y", $lastDayUTS);

        $klkt = $this->model
            ->where('nhanvien_id', $id)
            ->where('created_at', '>=', $firstDay)
            ->where('created_at', '<=', $lastDay)
            ->get();
        dd($klkt);
    }
}