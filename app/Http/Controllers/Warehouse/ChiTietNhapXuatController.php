<?php

namespace App\Http\Controllers\warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\ChiTietNhapXuatRepositoryInterface;

class ChiTietNhapXuatController extends Controller
{
    /**
     * @var string
     */
    protected $breadcrumb = 'nhapxuat';

    /**
     * @var chiTietRepository
     */
    protected $chiTietRepository;

    /**
     * @param ChiTietNhapXuatRepositoryInterface $chiTietRepository
     */
    public function __construct(
        ChiTietNhapXuatRepositoryInterface $chiTietRepository
        )
    {
        $this->chiTietRepository = $chiTietRepository;
    }

    public function list(Request $request)
    {
        $id = $request->query('id');

        if (! $listChiTiet = $this->chiTietRepository->findByNhapXuatId((int) $id)) return redirect()->route('warehouse.nhapxuat.list');

        return view('warehouse.nhapxuat.detail', [
            'listChiTiet' => $listChiTiet,
            'breadcrumb' => $this->breadcrumb
        ]);
    }
}
