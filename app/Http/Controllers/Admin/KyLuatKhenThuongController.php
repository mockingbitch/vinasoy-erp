<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\KyLuatKhenThuongRepositoryInterface;
use App\Repositories\Contracts\Interface\NhanVienRepositoryInterface;

class KyLuatKhenThuongController extends Controller
{
    /**
     * @var string
     */
    protected $breadcrumb = 'kyluatkhenthuong';

    /**
     * @var klktRepository
     */
    protected $klktRepository;

    /**
     * @var nhanVienRepository
     */
    protected $nhanVienRepository;

    /**
     * @param KyLuatKhenThuongRepositoryInterface $klktRepository
     * @param NhanVienRepositoryInterface $nhanVienRepository
     */
    public function __construct(
        KyLuatKhenThuongRepositoryInterface $klktRepository,
        NhanVienRepositoryInterface $nhanVienRepository
        )
    {
        $this->klktRepository = $klktRepository;
        $this->nhanVienRepository = $nhanVienRepository;
    }

    /**
     * @return void
     */
    public function getListView()
    {
        try {
            return view('admin.thuongphat.list', [
                'errCode' => session()->get('klktErrCode') ?? '',
                'message' => session()->get('klktMessage') ?? '',
                'listKLKT' => $this->klktRepository->getAll(),
                'user' => auth()->guard('user')->user(),
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
    public function getCreateThuongPhatView(Request $request)
    {
        if (null !== $request->query('id')) :
            if ($nhanvien = $this->nhanVienRepository->find((int) $request->query('id'))) :
                return view('admin.thuongphat.create', [
                    'nhanVien' => $nhanVien,
                    'listNhanVienSuggest' => response()->json($this->nhanVienRepository->getListSuggest(), JSON_UNESCAPED_UNICODE),
                    'breadcrumb' => $this->breadcrumb
                ]);
            else :
                return redirect()->route('404');
            endif;
        endif;

        return view('admin.thuongphat.create', [
            'listNhanVienSuggest' => response()->json($this->nhanVienRepository->getListSuggest(), JSON_UNESCAPED_UNICODE),
            'breadcrumb' => $this->breadcrumb
        ]);
    }
}
