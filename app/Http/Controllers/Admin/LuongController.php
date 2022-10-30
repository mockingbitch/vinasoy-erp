<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\Contracts\Interface\LuongRepositoryInterface;

class LuongController extends Controller
{
    protected $breadcrumb = 'luong';

    protected $luongRepository;

    public function __construct(LuongRepositoryInterface $luongRepository)
    {
        $this->luongRepository = $luongRepository;
    }

    /**
     * @return void
     */
    public function getListView() : View
    {
        $listLuong = $this->luongRepository->getAll();

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
