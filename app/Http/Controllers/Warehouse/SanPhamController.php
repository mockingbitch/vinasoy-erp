<?php

namespace App\Http\Controllers\warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\SanPhamRepositoryInterface;
use App\Repositories\Contracts\Interface\DanhMucRepositoryInterface;
use App\Repositories\Contracts\Interface\NhaCungCapRepositoryInterface;
use App\Services\ImageService;
use App\Http\Requests\SanPhamRequest;
use App\Constants\Constant;
use Illuminate\View\View;

class SanPhamController extends Controller
{
    /**
     * @var string
     */
    protected $breadcrumb = 'sanpham';

    /**
     * @var sanPhamRepository
     */
    protected $sanPhamRepository;

    /**
     * @var danhMucRepository
     */
    protected $danhMucRepository;

    /**
     * @var nhaCungCapRepository
     */
    protected $nhaCungCapRepository;

    /**
     * @var imageService
     */
    protected $imageService;

    /**
     * @param SanPhamRepositoryInterface $sanPhamRepository
     * @param DanhMucRepositoryInterface $danhMucRepository
     * @param NhaCungCapRepositoryInterface $nhaCungCapRepository
     * @param ImageService $imageService
     */
    public function __construct(
        SanPhamRepositoryInterface $sanPhamRepository,
        DanhMucRepositoryInterface $danhMucRepository,
        NhaCungCapRepositoryInterface $nhaCungCapRepository,
        ImageService $imageService
        )
    {
        $this->sanPhamRepository = $sanPhamRepository;
        $this->danhMucRepository = $danhMucRepository;
        $this->nhaCungCapRepository = $nhaCungCapRepository;
        $this->imageService = $imageService;
    }

    /**
     * @param SanPhamRequest $request
     * 
     * @return void
     */
    public function create(SanPhamRequest $request)
    {
        try {
            if (! $this->danhMucRepository->find((int) $request->danhmuc_id)) return redirect()->route('warehouse.sanpham.create')->with('msg', 'Danh mục không tồn tại');
            if (! $this->nhaCungCapRepository->find((int) $request->nhacungcap_id)) return redirect()->route('warehouse.sanpham.create')->with('msg', 'Nhà cung cấp không tồn tại');
            
            $data = $request->toArray();
            $data['img'] = $this->imageService->imageProcessing($request->img, $folder = 'sanpham');

            if (! $this->sanPhamRepository->create($data)) :
                return redirect()
                    ->route('warehouse.sanpham.list')
                    ->with([
                        'sanPhamErrCode' => Constant::ERR_CODE['error'],
                        'sanPhamMessage' => Constant::MSG['error']
                    ]);
            endif;

            return redirect()
                ->route('warehouse.sanpham.list')
                ->with([
                    'sanPhamErrCode' => Constant::ERR_CODE['created'],
                    'sanPhamMessage' => Constant::MSG['created']
                ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @return void
     */
    public function list(Request $request)
    {
        try {
            $keysearch = $request->query('keysearch');

            if (null !== $keysearch && $keysearch !== '') :
                return view('warehouse.sanpham.list', [
                    'errCode' => session()->get('sanPhamErrCode') ?? '',
                    'message' => session()->get('sanPhamMessage') ?? '',
                    'listSanPham' => $this->sanPhamRepository->search('tenSP', $keysearch),
                    'breadcrumb' => $this->breadcrumb
                ]);
            endif;

            return view('warehouse.sanpham.list', [
                'errCode' => session()->get('sanPhamErrCode') ?? '',
                'message' => session()->get('sanPhamMessage') ?? '',
                'listSanPham' => $this->sanPhamRepository->getAll(),
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
    public function deleteSanPham(Request $request) {
        try {
            $this->sanPhamRepository->delete((int) $request->query('id'));
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param [type] $id
     * 
     * @return void
     */
    public function getUpdateView($id)
    {
        try {
            $sanPham     = $this->sanPhamRepository->find((int) $id);
            $listDanhMuc = $this->danhMucRepository->getAll();
            $listNhaCC   = $this->nhaCungCapRepository->getAll();

            if (! $sanPham || null == $sanPham) :
                return redirect()->route('warehouse.sanpham.list');
            endif;

            return view('warehouse.sanpham.update', [
                'sanPham' => $sanPham,
                'listDanhMuc' => $listDanhMuc,
                'listNhaCC' => $listNhaCC,
                'breadcrumb' => $this->breadcrumb
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param [type] $id
     * @param SanPhamRequest $request
     * 
     * @return void
     */
    public function update($id, SanPhamRequest $request)
    {
        try {
            if (! $this->danhMucRepository->find((int) $request->danhmuc_id)) return redirect()->route('warehouse.sanpham.update')->with('msg', 'Danh mục không tồn tại');
            if (! $this->nhaCungCapRepository->find((int) $request->nhacungcap_id)) return redirect()->back('warehouse.sanpham.update')->with('msg', 'Nhà cung cấp không tồn tại');

            if (! $this->sanPhamRepository->update((int) $id, $request->toArray())) :
                return redirect()
                    ->route('warehouse.sanpham.list')
                    ->with([
                        'sanPhamErrCode' => Constant::ERR_CODE['error'],
                        'sanPhamMessage' => Constant::MSG['error']
                    ]);
            endif;

            return redirect()
                ->route('warehouse.sanpham.list')
                ->with([
                    'sanPhamErrCode' => Constant::ERR_CODE['updated'],
                    'sanPhamMessage' => Constant::MSG['updated']
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
        $listDanhMuc = $this->danhMucRepository->getAll();
        $listNhaCC   = $this->nhaCungCapRepository->getAll();

        return view('warehouse.sanpham.create', [
            'breadcrumb' => $this->breadcrumb,
            'listDanhMuc' => $listDanhMuc,
            'listNhaCC' => $listNhaCC,
        ]);
    }

    public function getListSanPhamSuggest(Request $request)
    {
        header('Content-Type: application/json;charset=utf-8'); 
        $listSanPhamSuggest = $this->sanPhamRepository->getListSuggest($request->query('nhacungcap'));

        return response()->json($listSanPhamSuggest);
    }
}
