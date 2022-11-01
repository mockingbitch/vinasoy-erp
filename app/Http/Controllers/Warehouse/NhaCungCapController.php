<?php

namespace App\Http\Controllers\warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\NhaCungCapRepositoryInterface;
use App\Http\Requests\NhaCCRequest;
use App\Constants\Constant;
use Illuminate\View\View;

class NhaCungCapController extends Controller
{
    /**
     * @var nhaccRepository
     */
    protected $nhaccRepository;

    /**
     * @var string
     */
    protected $breadcrumb = 'nhacungcap';

    /**
     * @param NhaCungCapRepositoryInterface $nhaccRepository
     */
    public function __construct(
        NhaCungCapRepositoryInterface $nhaccRepository
        )
    {
        $this->nhaccRepository = $nhaccRepository;
    }

    public function list()
    {
        try {
            $listNhaCC = $this->nhaccRepository->getAll();

            return view('warehouse.nhacungcap.list', [
                'listNhaCC' => $listNhaCC,
                'breadcrumb' => $this->breadcrumb,
                'errCode' => session()->get('nhaccErrCode') ?? '',
                'message' => session()->get('nhaccMessage') ?? ''
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
            $this->nhaccRepository->delete((int) $request->query('id'));
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param NhaCCRequest $request
     * 
     * @return void
     */
    public function create(NhaCCRequest $request)
    {
        try {
            if (! $this->nhaccRepository->create($request->toArray())) :
                return view('warehouse.nhacungcap.create', [
                    'message' => Constant::MSG['error'],
                    'data' => $request->toArray()
                ]);
            endif;

            return redirect()
                ->route('warehouse.nhacungcap.list')
                ->with([
                    'nhaccErrCode' => Constant::ERR_CODE['created'],
                    'nhaccMessage' => Constant::MSG['created']
                ]);
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
            $nhacc = $this->nhaccRepository->find((int) $id);

            if (! $nhacc || null == $nhacc) :
                return redirect()->route('warehouse.nhacungcap.list');
            endif;

            return view('warehouse.nhacungcap.update', [
                'nhacc' => $nhacc,
                'breadcrumb' => $this->breadcrumb
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param [type] $id
     * @param NhaCCRequest $request
     * 
     * @return void
     */
    public function update($id, NhaCCRequest $request)
    {
        try {
            if (! $this->nhaccRepository->update((int) $id, $request->toArray())) :
                return view('warehouse.nhacungcap.update', [
                    'message' => Constant::MSG['error'],
                    'data' => $request->toArray()
                ]);
            endif;

            return redirect()
                ->route('warehouse.nhacungcap.list')
                ->with([
                    'nhaccErrCode' => Constant::ERR_CODE['updated'],
                    'nhaccMessage' => Constant::MSG['updated']
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
        return view('warehouse.nhacungcap.create', [
            'breadcrumb' => $this->breadcrumb
        ]);
    }
}
