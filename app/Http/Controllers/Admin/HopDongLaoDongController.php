<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\HopDongLaoDongRepositoryInterface;
use App\Repositories\Contracts\Interface\NhanVienRepositoryInterface;
use Illuminate\View\View;
use App\Http\Requests\HopDongRequest;
use App\Constants\Constant;

class HopDongLaoDongController extends Controller
{
    /**
     * @var hopDongRepository
     */
    protected $hopDongRepository;

    /**
     * @var nhanVienRepository
     */
    protected $nhanVienRepository;

    protected $breadcrumb = '';

    /**
     * @param HopDongLaoDongRepositoryInterface $hopDongRepository
     */
    public function __construct(
        HopDongLaoDongRepositoryInterface $hopDongRepository,
        NhanVienRepositoryInterface $nhanVienRepository
        )
    {
        $this->hopDongRepository = $hopDongRepository;
        $this->nhanVienRepository = $nhanVienRepository;
    }

    /**
     * @param string $id
     * 
     * @return View
     */
    public function getHopDongView(string $id) : View
    {
        $nhanVien = $this->nhanVienRepository->find($id);

        if (null == $nhanVien || ! $nhanVien) :
            return redirect()->back();
        endif;

        $hdld = $this->hopDongRepository->getHDbyNhanVien((int) $id);

        return view('admin.hopdong.createOrUpdate', [
            'nhanVien' => $nhanVien,
            'hdld' => $hdld ?? null,
            'msg' => session()->get('msg') ?? '',
            'errCode' => session()->get('errCode') ?? '',
            'breadcrumb' => $this->breadcrumb
        ]);
    }

    public function createOrUpdateHopDong(string $id, HopDongRequest $request)
    {
        // try {
            $nhanVien = $this->nhanVienRepository->find((int) $id);

            if (! $nhanVien || null == $nhanVien) :
                return redirect()->back();
            endif;

            if (! $this->hopDongRepository->createOrUpdate((int) $id, $request->toArray())) :
                return $this->getHopDongView(Constants::MSG['error']);
            endif;

            return redirect()
                ->route('admin.nhanvien.list')
                ->with([
                    'nhanVienErrCode' => Constant::ERR_CODE['created'],
                    'nhanVienMessage' => Constant::MSG['created']
                ]);
        // } catch (\Throwable $th) {
        //     return redirect()->route('404');
        // }
    }
}
