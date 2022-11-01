<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\SanPham;
use App\Repositories\Contracts\Interface\SanPhamRepositoryInterface;
use App\Repositories\BaseRepository;

class SanPhamRepository extends BaseRepository implements SanPhamRepositoryInterface
{
    public function getModel()
    {
        return SanPham::class;
    }

    /**
     * @return array
     */
    public function getListSuggest() : array
    {
        $listSP = $this->model->all();
        $arrSuggest = [];

        foreach ($listSP as $sanPham) :
            $arrSugest[] = $sanPham->id . '-' . $sanPham->tenSP;
        endforeach;

        return $arrSugest;
    }
}