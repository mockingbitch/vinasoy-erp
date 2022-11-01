<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\ChucVuRepositoryInterface;
use App\Http\Requests\ChucVuRequest;
use App\Constants\Constant;

class ChucVuController extends Controller
{
    /**
     * @var chucVuRepository
     */
    protected $chucVuRepository;

    /**
     * @var string
     */
    protected $breadcrumb = 'chucvu';

    /**
     * @param ChucVuRepositoryInterface $chucVuRepository
     */
    public function __construct(ChucVuRepositoryInterface $chucVuRepository)
    {
        $this->chucVuRepository = $chucVuRepository;
    }

    /**
     * @param ChucVuRequest $request
     * 
     * @return void
     */
    public function createChucVu(ChucVuRequest $request)
    {
        try {
            if (! $this->chucVuRepository->create($request->toArray())) :
                return view('admin.chucvu.create', [
                    'message' => Constant::MSG['error'],
                    'data' => $request->toArray()
                ]);
            endif;

            return redirect()
                ->route('admin.chucvu.list')
                ->with([
                    'chucVuErrCode' => Constant::ERR_CODE['created'],
                    'chucVuMessage' => Constant::MSG['created']
                ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @return void
     */
    public function list()
    {
        try {
            return view('admin.chucvu.list', [
                'errCode' => session()->get('chucVuErrCode') ?? '',
                'message' => session()->get('chucVuMessage') ?? '',
                'listChucVu' => $this->chucVuRepository->getAll(),
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
    public function deleteChucVu(Request $request) {
        try {
            $this->chucVuRepository->delete((int) $request->query('id'));
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param [type] $id
     * 
     * @return void
     */
    public function getUpdateChucVuView($id)
    {
        try {
            $chucVu = $this->chucVuRepository->find((int) $id);

            if (! $chucVu || null == $chucVu) :
                return redirect()->route('admin.chucvu.list');
            endif;

            return view('admin.chucvu.update', [
                'chucVu' => $chucVu,
                'breadcrumb' => $this->breadcrumb
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param [type] $id
     * @param ChucVuRequest $request
     * 
     * @return void
     */
    public function updateChucVu($id, ChucVuRequest $request)
    {
        try {
            if (! $this->chucVuRepository->update((int) $id, $request->toArray())) :
                return view('admin.chucvu.update', [
                    'message' => Constant::MSG['error'],
                    'data' => $request->toArray()
                ]);
            endif;

            return redirect()
                ->route('admin.chucvu.list')
                ->with([
                    'chucVuErrCode' => Constant::ERR_CODE['updated'],
                    'chucVuMessage' => Constant::MSG['updated']
                ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }
}
