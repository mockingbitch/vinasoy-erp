<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\DonHangRepositoryInterface;
use App\Repositories\Contracts\Interface\ChiTietDonHangRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    protected $donHangRepository;

    protected $chiTietDonHangRepository;

    /**
     * @param DonHangRepositoryInterface $donHangRepository
     * @param ChiTietDonHangRepositoryInterface $chiTietDonHangRepository
     */
    public function __construct(
        DonHangRepositoryInterface $donHangRepository,
        ChiTietDonHangRepositoryInterface $chiTietDonHangRepository
        )
    {
        $this->donHangRepository = $donHangRepository;
        $this->chiTietDonHangRepository = $chiTietDonHangRepository;
    }

    public function confirmOrder(Request $request)
    {
        try {
            $cart = session()->get('cart');

            if (null !== $cart && ! empty($cart)) :
                return redirect()->back();
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
            
            return redirect()->route('thanks');
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }   
    }

    public function createOrderDetail($donHangId, $listCart)
    {
        try {
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

                if (! $this->chiTietDonHangRepository->create($data)) :
                    return false;
                endif;
                
                $subTotal += $total;
            endforeach;

            if (! $this->donHangRepository->update(['tong' => $subTotal])) :
                return false;
            endif;

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
