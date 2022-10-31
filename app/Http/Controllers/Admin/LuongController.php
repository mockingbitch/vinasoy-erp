<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\Contracts\Interface\LuongRepositoryInterface;

class LuongController extends Controller
{
    /**
     * @var string
     */
    protected $breadcrumb = 'luong';

    /**
     * @var luongRepository
     */
    protected $luongRepository;

    /**
     * @param LuongRepositoryInterface $luongRepository
     */
    public function __construct(LuongRepositoryInterface $luongRepository)
    {
        $this->luongRepository = $luongRepository;
    }

    /**
     * @return void
     */
    public function getListView() : View
    {
        $nhanVien = auth()->guard('user')->user();
        
        if (! $nhanVien || null == $nhanVien) return redirect()->route('404');

        $listLuong = $this->luongRepository->getByUser($nhanVien->id);

        return view('admin.luong.list', [
            'listLuong' => $listLuong,
            'breadcrumb' => $this->breadcrumb
        ]); 
    }

    /**
     * @param string $id
     * 
     * @return void
     */
    public function getChiTietView(string $id)
    {
        try {
            $luongNV = $this->luongRepository->find((int) $id);

            if (! $luongNV || null == $luongNV) :
                return redirect()->back();
            endif;

            return view('admin.luong.detail',[
                'luongNV' => $luongNV,
                'breadcrumb' => $this->breadcrumb
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }
}
