<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\KyLuatKhenThuongRepositoryInterface;
use App\Repositories\Contracts\Interface\NhanVienRepositoryInterface;
use App\Http\Requests\KyLuatKhenThuongRequest;
use App\Constants\Constant;

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

    public function create(KyLuatKhenThuongRequest $request)
    {
        try {
            $this->checkRole();
            $string = $request->tenNhanVien;
            $arrStringName = explode('-', $string);

            if (! $nhanVien = $this->nhanVienRepository->find((int) $arrStringName[0])) return redirect()->back();

            $data = [
                'nhanvien_id' => $nhanVien->id,
                'hinhThuc' => $request->hinhThuc,
                'soQuyetDinh' => $request->soQuyetDinh,
                'ngayQuyetDinh' => $request->ngayQuyetDinh,
                'lyDo' => $request->lyDo,
                'mucPhat' => $request->mucPhat,
                'mucThuong' => $request->mucThuong,
                'nguoiKy' => $request->nguoiKy
            ];

            if (! $this->klktRepository->create($data)) return redirect()->back()->with('msg', 'Error creating');

            return redirect()
                ->route('admin.klkt.list')
                ->with([
                    'klktErrCode' => Constant::ERR_CODE['created'],
                    'klktMessage' => Constant::MSG['created']
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
    public function deleteKlkt(Request $request)
    {
        try {
            $this->checkRole();
            $this->klktRepository->delete((int) $request->query('id'));
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    public function checkRole()
    {
        if (! $user = auth()->guard('user')->user()) return redirect()->route('404');

        if ($user->role !== Constant::ROLE['admin'] || $user->role !== Constant::ROLE['manager']) return redirect()->route('404');
    }
}
