<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\Interface\SanPhamRepositoryInterface;
use App\Repositories\Contracts\Interface\KhoRepositoryInterface;
use Illuminate\View\View;

class SanPhamController extends Controller
{   
    /**
     * @var sanPhamRepository
     */
    protected $sanPhamRepository;

    /**
     * @var khoRepository
     */
    protected $khoRepository;

    /**
     * @param SanPhamRepositoryInterface $sanPhamRepository
     */
    public function __construct(
        SanPhamRepositoryInterface $sanPhamRepository,
        KhoRepositoryInterface $khoRepository
        )
    {
        $this->sanPhamRepository = $sanPhamRepository;
        $this->khoRepository = $khoRepository;
    }

    /**
     * @return View
     */
    public function getListSanPham() : View
    {
        return view('home.sanpham.list', [
            'listSanPham' => $this->sanPhamRepository->getAll()
        ]);
    }

    /**
     * @param string|null $id
     * 
     * @return void
     */
    public function getChiTietSanPham(? string $id)
    {
        if ($sanPham = $this->sanPhamRepository->find($id)) :
            $soLuong = $this->khoRepository->countProduct($id);
            
            if ($soLuong > 0) :
                return view('home.sanpham.detail', [
                    'sanPham' => $sanPham,
                    'soLuong' => $soLuong,
                    'status' => 'available'
                ]);
            endif;

            return view('home.sanpham.detail', [
                'sanPham' => $sanPham,
                'soLuong' => 0,
                'status' => 'outofstock'
            ]);
        endif;

        return redirect()->back();
    }
}
