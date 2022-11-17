<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\PhongBanRepositoryInterface;
use App\Http\Requests\PhongBanRequest;
use App\Constants\Constant;

class PhongBanController extends Controller
{
    /**
     * @var phongBanRepository
     */
    protected $phongBanRepository;

    /**
     * @var breadcrumb
     */
    protected $breadcrumb = 'phongban';

    /**
     * @param PhongBanRepositoryInterface $phongBanRepository
     */
    public function __construct(PhongBanRepositoryInterface $phongBanRepository)
    {
        $this->phongBanRepository = $phongBanRepository;
    }

    /**
     * @param PhongBanRequest $request
     * 
     * @return void
     */
    public function createPhongBan(Request $request)
    {
        try {
            if (! $this->phongBanRepository->create($request->toArray())) :
                return view('admin.phongban.create', [
                    'message' => Constant::MSG['error'],
                    'data' => $request->toArray()
                ]);
            endif;

            return redirect()
                ->route('admin.phongban.list')
                ->with([
                    'phongBanErrCode' => Constant::ERR_CODE['created'],
                    'phongBanMessage' => Constant::MSG['created']
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
                return view('admin.phongban.list', [
                    'errCode' => session()->get('nhanVienErrCode') ?? '',
                    'message' => session()->get('nhanVienMessage') ?? '',
                    'listPhongBan' => $this->phongBanRepository->search('tenPhong', $keysearch),
                    'breadcrumb' => $this->breadcrumb
                ]);
            endif;

            return view('admin.phongban.list', [
                'errCode' => session()->get('phongBanErrCode') ?? '',
                'message' => session()->get('phongBanMessage') ?? '',
                'listPhongBan' => $this->phongBanRepository->getAll(),
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
    public function deletePhongBan(Request $request) {
        try {
            $this->phongBanRepository->delete((int) $request->query('id'));
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param [type] $id
     * 
     * @return void
     */
    public function getUpdatePhongBanView($id)
    {
        try {
            $phongBan = $this->phongBanRepository->find((int) $id);

            if (! $phongBan || null == $phongBan) :
                return redirect()->route('admin.phongban.list');
            endif;

            return view('admin.phongban.update', [
                'phongBan' => $phongBan,
                'breadcrumb' => $this->breadcrumb
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    public function updatePhongBan($id, Request $request)
    {
        try {
            if (! $this->phongBanRepository->update((int) $id, $request->toArray())) :
                return view('admin.phongban.update', [
                    'message' => Constant::MSG['error'],
                    'data' => $request->toArray()
                ]);
            endif;

            return redirect()
                ->route('admin.phongban.list')
                ->with([
                    'phongBanErrCode' => Constant::ERR_CODE['updated'],
                    'phongBanMessage' => Constant::MSG['updated']
                ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }
}
