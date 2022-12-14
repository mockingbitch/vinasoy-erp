<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\SanPham;
use App\Repositories\Contracts\Interface\SanPhamRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Kho;
use Illuminate\Support\Facades\DB;

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
                'soLuong' => $data['soLuong_'.$i],
                'nsx' => $data['nsx_'.$i],
                'hsd' => $data['hsd_'.$i],
                'donGia' => $data['donGia_'.$i]
            ];
        }

        foreach($listSanPhamRequest as $sanPhamRQ) :
            $arrStringName = explode('-', $sanPhamRQ['sanPham']);

            if (! $sanPham = $this->find((int) $arrStringName[0])) continue;

            $listSanPham[] = [
                'sanpham_id' => (int) $arrStringName[0],
                'soLuong' => (int) $sanPhamRQ['soLuong'],
                'nsx' => $sanPhamRQ['nsx'],
                'hsd' => $sanPhamRQ['hsd'],
                'donGia' => $sanPhamRQ['donGia']
            ];
        endforeach;
        
        return $listSanPham;
    }

    /**
     * @return void
     */
    public function getProducts()
    {
        $listSanPham = $this->getAll();

        foreach ($listSanPham as $sanPham) :
            $kho = Kho::select('sanpham_id', DB::raw('sum(soLuong) as soLuong'))
                ->where('sanpham_id', $sanPham->id)
                ->groupBy('sanpham_id')
                ->first();
            
            $sanPham->soLuong = 0;
            if (null !== $kho) $sanPham->soLuong = $kho->soLuong;
        endforeach;

        return $listSanPham;
    }
}