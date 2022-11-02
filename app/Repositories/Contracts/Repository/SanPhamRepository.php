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
    public function getListSuggest(?string $nhacc) : array
    {
        $listSP = $this->model->where('nhacungcap_id', (int) $nhacc)->get();
        $arrSuggest = [];

        foreach ($listSP as $sanPham) :
            $arrSuggest[] = $sanPham->id . '-' . $sanPham->tenSP;
        endforeach;

        return $arrSuggest;
    }

    /**
     * @param array $data
     * 
     * @return array
     */
    public function getListSPFromRequest($data = []) : array
    {
        $listSanPhamRequest = []; //list product from request with quantity
        $listSanPham = [];
        for ($i = 1; $i <= $data['totalSP']; $i++) {
            $listSanPhamRequest[] = [
                'sanPham' => $data['sanPham_'.$i],
                'soLuong' => $data['soLuong_'.$i]
            ];
        }

        foreach($listSanPhamRequest as $sanPhamRQ) :
            $arrStringName = explode('-', $sanPhamRQ['sanPham']);

            if (! $sanPham = $this->find((int) $arrStringName[0])) continue;

            $listSanPham[] = [
                'sanpham_id' => (int) $arrStringName[0],
                'soLuong' => (int) $sanPhamRQ['soLuong'],
                'donGia' => (int) $sanPham->donGia
            ];
        endforeach;
        
        return $listSanPham;
    }
}