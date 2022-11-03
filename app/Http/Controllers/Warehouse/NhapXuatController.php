<?php

namespace App\Http\Controllers\warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\NhapXuatRepositoryInterface;
use App\Repositories\Contracts\Interface\ChiTietNhapXuatRepositoryInterface;
use App\Repositories\Contracts\Interface\NhaCungCapRepositoryInterface;
use App\Repositories\Contracts\Interface\SanPhamRepositoryInterface;
use App\Repositories\Contracts\Interface\KhoRepositoryInterface;
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
     * @var khoRepository
     */
    protected $khoRepository;

    /**
     * @var chiTietNhapXuatRepository
     */
    protected $chiTietNhapXuatRepository;

    /**
     * @var nhaCungCapRepository
     */
    protected $nhaCungCapRepository;

    /**
     * @var sanPhamRepository
     */
    protected $sanPhamRepository;

    /**
     * @param NhapXuatRepositoryInterface $nhapXuatRepository
     * @param ChiTietNhapXuatRepositoryInterface $chiTietNhapXuatRepository
     * @param NhaCungCapRepositoryInterface $nhaCungCapRepository
     * @param SanPhamRepositoryInterface $sanPhamRepository
     */
    public function __construct(
        NhapXuatRepositoryInterface $nhapXuatRepository,
        ChiTietNhapXuatRepositoryInterface $chiTietNhapXuatRepository,
        NhaCungCapRepositoryInterface $nhaCungCapRepository,
        SanPhamRepositoryInterface $sanPhamRepository,
        KhoRepository $khoRepository
        )
    {
        $this->nhapXuatRepository = $nhapXuatRepository;
        $this->chiTietNhapXuatRepository = $chiTietNhapXuatRepository;
        $this->nhaCungCapRepository = $nhaCungCapRepository;
        $this->sanPhamRepository = $sanPhamRepository;
        $this->khoRepository = $khoRepository;
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
            $listSanPham = $this->sanPhamRepository->getListSPFromRequest($request->toArray());
            $user = auth()->guard('user')->user();

            if (! $listSanPham || null == $listSanPham || ! $user) return redirect()->route('warehouse.nhapxuat.create')->with('msg', 'Không tìm thấy sản phẩm'); 

            $data = [
                'nhacungcap_id' => $request->nhacungcap_id,
                'user_id' => $user->id,
                'type' => (int) $request->type == 1 ? NhapXuatConstant::NHAPXUAT['xuat'] : NhapXuatConstant::NHAPXUAT['nhap']
            ];

            if (! $nhapXuat =  $this->nhapXuatRepository->create($data)) :
                return redirect()
                    ->route('warehouse.nhapxuat.list')
                    ->with([
                        'nhapXuatErrCode' => Constant::ERR_CODE['error'],
                        'nhapXuatMessage' => Constant::MSG['error']
                    ]);
            endif;

            $this->createChiTietNhapXuat($nhapXuat->id, $listSanPham);

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

    /**
     * call from function createNhapXuat
     * 
     * @param integer $id
     * @param array $listSanPham
     * @return void
     */
    public function createChiTietNhapXuat(int $id, $listSanPham = [])
    {
        $total = 0;

        foreach($listSanPham as $sanPham) :
            $data = [
                'nhapxuat_id' => $id,
                'sanpham_id' => $sanPham['sanpham_id'],
                'soLuong' => $sanPham['soLuong'],
                'donGia' => $sanPham['donGia'],
                'nsx' => $sanPham['nsx'],
                'hsd' => $sanPham['hsd']
            ];
        
            $total += $sanPham['donGia'] * $sanPham['soLuong'];
            
            $this->chiTietNhapXuatRepository->create($data);
            $this->khoRepository->create($data);
        endforeach;

        $this->nhapXuatRepository->update($id, ['tong' => $total]);
    }
}
