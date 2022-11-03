<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\Kho;
use App\Repositories\Contracts\Interface\KhoRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class KhoRepository extends BaseRepository implements KhoRepositoryInterface
{
    public function getModel()
    {
        return Kho::class;
    }

    /**
     * @return object
     */
    public function getByProduct() : object
    {
        return $this->model->select('sanpham_id', DB::raw('sum(soLuong) as soLuong'))->groupBy('sanpham_id')->get();
    }

    /**
     * @param integer $id
     * 
     * @return object
     */
    public function getDetail(int $id) : object
    {
        return $this->model->where('sanpham_id', $id)->get();
    }

    /**
     * @param array $listSanPham
     * 
     * @return boolean
     */
    public function checkNumberProduct($listSanPham = []) : bool
    {
        foreach ($listSanPham as $sanPham) :
            $kho = $this->model
                ->select('sanpham_id', DB::raw('sum(soLuong) as soLuong'))
                ->where('sanpham_id', $sanPham['sanpham_id'])
                ->groupBy('sanpham_id')
                ->first();
            
            if($sanPham['soLuong'] > $kho->soLuong || null == $kho || ! $kho) return false;
        endforeach;

        return true;
    }
}