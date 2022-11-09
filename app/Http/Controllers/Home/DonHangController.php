<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\DonHangRepositoryInterface;
use App\Repositories\Contracts\Interface\ChiTietDonHangRepositoryInterface;
use App\Repositories\Contracts\Interface\KhoRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    /**
     * @var donHangRepository
     */
    protected $donHangRepository;

    /**
     * @var chiTietDonHangRepository
     */
    protected $chiTietDonHangRepository;

    /**
     * @var khoRepository
     */
    protected $khoRepository;

    /**
     * @param DonHangRepositoryInterface $donHangRepository
     * @param ChiTietDonHangRepositoryInterface $chiTietDonHangRepository
     * @param KhoRepositoryInterface $khoRepository
     */
    public function __construct(
        DonHangRepositoryInterface $donHangRepository,
        ChiTietDonHangRepositoryInterface $chiTietDonHangRepository,
        KhoRepositoryInterface $khoRepository
        )
    {
        $this->donHangRepository = $donHangRepository;
        $this->chiTietDonHangRepository = $chiTietDonHangRepository;
        $this->khoRepository = $khoRepository;
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function confirmOrder(Request $request)
    {
        // try {
            $cart = session()->get('cart');

            if (null == $cart || empty($cart)) :
                return redirect()->back()->with('msg', 'Vui lòng thêm sản phẩm vào giỏ hàng');
            endif;

            $data = $request->toArray();
            $data['user_id'] = Auth::guard('user')->user()->id ?? null;
            $data['status'] = 1;

            if (! $donHang = $this->donHangRepository->create($data)) :
                return redirect()->back()->with('msg', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');
            endif;
            
            if (! $this->createOrderDetail($donHang->id, $cart)) :
                return redirect()->back()->with('msg', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');
            endif;
            
            session()->forget('cart');

            return redirect()->route('thanks');
        // } catch (\Throwable $th) {
        //     return redirect()->route('404');
        // }   
    }

    /**
     * @param integer $donHangId
     * @param array $listCart
     * 
     * @return boolean
     */
    public function createOrderDetail(int $donHangId, $listCart = []) : bool
    {
        // try {
            $subTotal = 0;

            foreach ($listCart as $cart) :
                $total = $cart['soLuong'] * $cart['gia'];
                $data = [
                    'donhang_id' => $donHangId,
                    'sanpham_id' => $cart['id'],
                    'soLuong' => $cart['soLuong'],
                    'donGia' => $cart['gia'],
                    'tong' => $total
                ];

                $sanPhamKho = $this->khoRepository->countProduct($cart['id']);

                if (null !== $sanPhamKho && $cart['soLuong'] > $sanPhamKho) :
                    return false;
                endif;

                if (! $this->chiTietDonHangRepository->create($data) || ! $this->khoRepository->updateQuantity($cart)) :
                    return false;
                endif;
                
                $subTotal += $total;
            endforeach;

            if (! $this->donHangRepository->update($donHangId, ['tong' => $subTotal])) :
                return false;
            endif;

            return true;
        // } catch (\Throwable $th) {
        //     return false;
        // }
    }
}
