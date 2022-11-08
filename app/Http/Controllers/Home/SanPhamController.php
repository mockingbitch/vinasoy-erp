<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\Interface\SanPhamRepositoryInterface;
use Illuminate\View\View;

class SanPhamController extends Controller
{   
    /**
     * @var sanPhamRepository
     */
    protected $sanPhamRepository;

    /**
     * @param SanPhamRepositoryInterface $sanPhamRepository
     */
    public function __construct(SanPhamRepositoryInterface $sanPhamRepository)
    {
        $this->sanPhamRepository = $sanPhamRepository;
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
            return view('home.sanpham.detail', [
                'sanPham' => $sanPham
            ]);
        endif;

        return redirect()->back();
    }
}
