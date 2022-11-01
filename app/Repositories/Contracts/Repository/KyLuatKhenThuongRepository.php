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

    /**
     * @param integer|null $id
     * 
     * @return number
     */
    public function countKLKT(?int $id) : int
    {
        $firstDayUTS = mktime (0, 0, 0, date("m"), 1, date("Y"));
        $lastDayUTS = mktime (0, 0, 0, date("m"), date('t'), date("Y"));
        $firstDay = date('Y-m-d', $firstDayUTS);
        $lastDay = date('Y-m-d', $lastDayUTS);
        $listKlkt = $this->model
            ->where('nhanvien_id', $id)
            ->whereDate('created_at', '>=', $firstDay)
            ->whereDate('created_at', '<=', $lastDay)
            ->get();
        $total = 0;
        foreach ($listKlkt as $klkt) :
            $total += (int) $klkt->mucThuong - (int) $klkt->mucPhat; 
        endforeach;

        return $total;
    }
}