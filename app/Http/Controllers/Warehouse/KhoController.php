<?php

namespace App\Http\Controllers\warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\KhoRepositoryInterface;
use App\Constants\Constant;

class KhoController extends Controller
{
    /**
     * @var string
     */
    protected $breadcrumb = 'kho';

    /**
     * @var khoRepository
     */
    public $khoRepository;

    /**
     * @param KhoRepositoryInterface $khoRepository
     */
    public function __construct(KhoRepositoryInterface $khoRepository)
    {
        $this->khoRepository = $khoRepository;
    }

    /**
     * @return void
     */
    public function list()
    {
        try {
            return view('warehouse.kho.list', [
                'errCode' => session()->get('khoErrCode') ?? '',
                'message' => session()->get('khoMessage') ?? '',
                'listKho' => $this->khoRepository->getByProduct(),
                'breadcrumb' => $this->breadcrumb
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function detail(Request $request)
    {
        try {
            return view('warehouse.kho.detail', [
                'errCode' => session()->get('detailKhoErrCode') ?? '',
                'message' => session()->get('detailKhoMessage') ?? '',
                'listChiTiet' => $this->khoRepository->getDetail((int) $request->query('id')),
                'breadcrumb' => $this->breadcrumb
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function delete(Request $request) {
        try {
            $this->khoRepository->delete((int) $request->query('id'));
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }
}
