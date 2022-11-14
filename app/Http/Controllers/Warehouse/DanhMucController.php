<?php

namespace App\Http\Controllers\warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\DanhMucRepositoryInterface;
use App\Http\Requests\DanhMucRequest;
use App\Constants\Constant;
use Illuminate\View\View;

class DanhMucController extends Controller
{
    /**
     * @var danhMucRepository
     */
    protected $danhMucRepository;

    /**
     * @var string
     */
    protected $breadcrumb = 'danhmuc';

    /**
     * @param DanhMucRepositoryInterface $danhMucRepository
     */
    public function __construct(DanhMucRepositoryInterface $danhMucRepository)
    {
        $this->danhMucRepository = $danhMucRepository;
    }

    /**
     * @param DanhMucRequest $request
     * 
     * @return void
     */
    public function create(DanhMucRequest $request)
    {
        try {
            if (! $this->danhMucRepository->create($request->toArray())) :
                return view('warehouse.danhmuc.create', [
                    'message' => Constant::MSG['error'],
                    'data' => $request->toArray()
                ]);
            endif;

            return redirect()
                ->route('warehouse.danhmuc.list')
                ->with([
                    'danhMucErrCode' => Constant::ERR_CODE['created'],
                    'danhMucMessage' => Constant::MSG['created']
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
                return view('warehouse.danhmuc.list', [
                    'errCode' => session()->get('danhMucErrCode') ?? '',
                    'message' => session()->get('danhMucMessage') ?? '',
                    'listDanhMuc' => $this->danhMucRepository->search('tenDanhMuc', $keysearch),
                    'breadcrumb' => $this->breadcrumb
                ]);
            endif;

            return view('warehouse.danhmuc.list', [
                'errCode' => session()->get('danhMucErrCode') ?? '',
                'message' => session()->get('danhMucMessage') ?? '',
                'listDanhMuc' => $this->danhMucRepository->getAll(),
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
    public function deleteDanhMuc(Request $request) {
        try {
            $this->danhMucRepository->delete((int) $request->query('id'));
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param [type] $id
     * 
     * @return void
     */
    public function getUpdateDanhMucView($id)
    {
        try {
            $danhMuc = $this->danhMucRepository->find((int) $id);

            if (! $danhMuc || null == $danhMuc) :
                return redirect()->route('warehouse.danhmuc.list');
            endif;

            return view('warehouse.danhmuc.update', [
                'danhMuc' => $danhMuc,
                'breadcrumb' => $this->breadcrumb
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param [type] $id
     * @param DanhMucRequest $request
     * 
     * @return void
     */
    public function updateDanhMuc($id, DanhMucRequest $request)
    {
        try {
            if (! $this->danhMucRepository->update((int) $id, $request->toArray())) :
                return view('warehouse.danhmuc.update', [
                    'message' => Constant::MSG['error'],
                    'data' => $request->toArray()
                ]);
            endif;

            return redirect()
                ->route('warehouse.danhmuc.list')
                ->with([
                    'danhMucErrCode' => Constant::ERR_CODE['updated'],
                    'danhMucMessage' => Constant::MSG['updated']
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
        return view('warehouse.danhmuc.create', [
            'breadcrumb' => $this->breadcrumb
        ]);
    }
}
