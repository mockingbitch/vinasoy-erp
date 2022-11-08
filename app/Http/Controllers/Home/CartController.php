<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\SanPhamRepositoryInterface;
use Illuminate\View\View;

class CartController extends Controller
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
    public function getViewGioHang() : View
    {
        return view('home.cart.cart', [
            'listGioHang' => session()->get('cart')
        ]);
    }

    public function getViewThanhToan()
    {
        return view('home.cart.checkout');
    }

    
    public function create(Request $request)
    {
        try {
            $id = $request->query('id');
            $soLuong = $request->query('soLuong') ?? 1;
            $sanPham = $this->sanPhamRepository->find($id);
            $cart = session()->get('cart');

            if (isset($cart[$id])) :
                $cart[$id]['soLuong'] = $cart[$id]['soLuong'] + $soLuong;
            else :
                $cart[$id]=[
                    'id' => $sanPham->id,
                    'ten' => $sanPham->tenSP,
                    'gia' => $sanPham->donGia,
                    'soLuong' => $soLuong,
                    'img' => $sanPham->img
                ];
            endif;

            session()->put('cart', $cart);

            return 'true';
        } catch (\Throwable $th) {
            return 'false';
        }
    }

    public function update(Request $request)
    {
        try {
            $id = $request->query('id');
            $soLuong = $request->query('soluong') ?? 1;

            if ($id && $soLuong) :
                $cart = session()->get('cart');
                $cart[$id]['soLuong'] = (int) $soLuong ;
            endif;
    
            session()->put('cart', $cart);

            return 'true';
        } catch (\Throwable $th) {
            return 'false';
        }
    }

    public function remove(Request $request)
    {
        try {
            $id = $request->query('id');

            if ($id) :
                $cart = session()->get('cart');
                unset($cart[$id]);
                session()->put('cart', $cart);
            endif;

            return 'true';
        } catch (\Throwable $th) {
            return 'false';
        }
    }
}
