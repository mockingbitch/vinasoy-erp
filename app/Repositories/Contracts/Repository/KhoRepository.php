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

    /**
     * @param integer|null $id
     * 
     * @return integer
     */
    public function countProduct(?int $id) : int
    {
        $kho = $this->model
                ->select('sanpham_id', DB::raw('sum(soLuong) as soLuong'))
                ->where('sanpham_id', $id)
                ->groupBy('sanpham_id')
                ->first();
        
        if (null !== $kho) return $kho->soLuong;

        return 0;
    }

    public function updateQuantity($data)
    {
        $listSortByHSD = [];
        $now           = time();
        $temp = [];
        $kho = $this->model
                ->where('sanpham_id', $data['id'])
                ->get();

        // Sort by hsd
        foreach ($kho as $item) :
            $item->hsd = strtotime($item->hsd);
        endforeach;

        $listKho = $kho->toArray();
        usort($listKho, function ($a, $b) {
            return $a['hsd'] > $b['hsd'];
        });
        
        //update quantity
        $left = $data['soLuong'];
        $logItem = [];
        foreach ($listKho as $item) :
            if ($item['soLuong'] == 0) :
                continue;
            endif;
            $logItem[] = $item['id'];
            if ($item['soLuong'] < $left) :
                $left = $left - $item['soLuong'];
                $this->update($item['id'], ['trangThai' => '0', 'soLuong' => 0]);
            else :
                $left = $item['soLuong'] - $left;
                $this->update($item['id'], ['trangThai' => $left == 0 ? '0' : '1', 'soLuong' => $left]);
                break;
            endif;
        endforeach;

        return $logItem;
    }
}