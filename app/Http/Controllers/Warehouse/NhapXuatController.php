<?php

namespace App\Http\Controllers\warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\NhapXuatRepositoryInterface;
use App\Repositories\Contracts\Interface\ChiTietNhapXuatRepositoryInterface;
use App\Repositories\Contracts\Interface\NhaCungCapRepositoryInterface;
use App\Http\Requests\NhapXuatRequest;
use Illuminate\View\View;
use App\Constants\Constant;
use App\Constants\NhapXuatConstant;

class NhapXuatController extends Controller
{
    /**
     * @var string
     */
    protected $breadcrumb = 'nhapxuat';

    /**
     * @var nhapXuatRepository
     */
    protected $nhapXuatRepository;

    /**
     * @var chiTietNhapXuatRepository
     */
    protected $chiTietNhapXuatRepository;

    protected $nhaCungCapRepository;

    /**
     * @param NhapXuatRepositoryInterface $nhapXuatRepository
     * @param ChiTietNhapXuatRepositoryInterface $chiTietNhapXuatRepository
     */
    public function __construct(
        NhapXuatRepositoryInterface $nhapXuatRepository,
        ChiTietNhapXuatRepositoryInterface $chiTietNhapXuatRepository,
        NhaCungCapRepositoryInterface $nhaCungCapRepository
        )
    {
        $this->nhapXuatRepository = $nhapXuatRepository;
        $this->chiTietNhapXuatRepository = $chiTietNhapXuatRepository;
        $this->nhaCungCapRepository = $nhaCungCapRepository;
    }

    /**
     * @return void
     */
    public function list()
    {
        try {
            return view('warehouse.nhapxuat.list', [
                'errCode' => session()->get('nhapXuatErrCode') ?? '',
                'message' => session()->get('nhapXuatMessage') ?? '',
                'listNhapXuat' => $this->nhapXuatRepository->getAll(),
                'breadcrumb' => $this->breadcrumb
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @return Factory\View
     */
    public function getCreateView() : View
    {
        $listNhaCC = $this->nhaCungCapRepository->getAll();

        return view('warehouse.nhapxuat.create', [
            'breadcrumb' => $this->breadcrumb,
            'listNhaCC' => $listNhaCC
        ]);
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function delete(Request $request) {
        try {
            $this->nhapXuatRepository->delete((int) $request->query('id'));
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param NhapXuatRequest $request
     * 
     * @return void
     */
    public function create(NhapXuatRequest $request)
    {
        // try {
            $string = $request->sanpham;
            $arrStringName = explode('-', $string);
            $user = auth()->guard('user')->user();

            if (! $sanPham = $this->sanPhamRepository->find((int) $arrStringName[0]) || ! $user || null == $user) return redirect()->route('warehouse.nhapxuat.create')->with('msg', 'Không tìm thấy sản phẩm trong CSDL');

            $data = [
                'sanpham_id' => $sanPham->id,
                'nhanvien_id' => $user->id,
                'nhacungcap_id' => $request->nhacungcap_id,
                'soLuong' => $request->soLuong,
                'type' => (int) $request->type == 1 ? Constant::NHAPXUAT['xuat'] : Constant::NHAPXUAT['nhap']
            ];

            if (! $nhapXuat =  $this->nhapXuatRepository->create($data)) :
                return redirect()
                    ->route('warehouse.nhapxuat.list')
                    ->with([
                        'nhapXuatErrCode' => Constant::ERR_CODE['error'],
                        'nhapXuatMessage' => Constant::MSG['error']
                    ]);
            endif;

            return redirect()
                ->route('warehouse.nhapxuat.list')
                ->with([
                    'nhapXuatErrCode' => Constant::ERR_CODE['created'],
                    'nhapXuatMessage' => Constant::MSG['created']
                ]);
        // } catch (\Throwable $th) {
        //     return redirect()->route('404');
        // }
    }
}
