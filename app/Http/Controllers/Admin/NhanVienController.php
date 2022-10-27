<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\NhanVienRepositoryInterface;
use App\Repositories\Contracts\Interface\ChucVuRepositoryInterface;
use App\Repositories\Contracts\Interface\PhongBanRepositoryInterface;
use App\Repositories\Contracts\Interface\UserRepositoryInterface;
use App\Constants\Constant;
use App\Constants\UserConstant;
use App\Http\Requests\NhanVienRequest;
use Illuminate\View\View;

class NhanVienController extends Controller
{
    /**
     * @var nhanVienRepository
     */
    protected $nhanVienRepository;

    /**
     * @var chucVuRepository
     */
    protected $chucVuRepository;

    /**
     * @var phongBanRepository
     */
    protected $phongBanRepository;

    /**
     * @var userRepository
     */
    protected $userRepository;

    /**
     * @var string
     */
    private $breadcrumb = 'nhanvien';

    /**
     * Construct
     *
     * @param NhanVienRepositoryInterface $nhanVienRepository
     * @param ChucVuRepositoryInterface $chucVuRepository
     * @param PhongBanRepositoryInterface $phongBanRepository
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        NhanVienRepositoryInterface $nhanVienRepository,
        ChucVuRepositoryInterface $chucVuRepository,
        PhongBanRepositoryInterface $phongBanRepository,
        UserRepositoryInterface $userRepository
        )
    {
        $this->nhanVienRepository = $nhanVienRepository;
        $this->chucVuRepository = $chucVuRepository;
        $this->phongBanRepository = $phongBanRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return Factory\View
     */
    public function getCreateNhanVienView($msg = null) : View
    {
        $listChucVu = $this->chucVuRepository->getAll();
        $listPhongBan = $this->phongBanRepository->getAll();

        return view('admin.nhanvien.create', [
            'listChucVu' => $listChucVu,
            'listPhongBan' => $listPhongBan,
            'breadcrumb' => $this->breadcrumb,
            'msg' => $msg
        ]);
    }

    /**
     * @param NhanVienRequest $request
     * 
     * @return void
     */
    public function createNhanVien(NhanVienRequest $request)
    {
        // try {
            if (! $user = auth()->guard('user')->user()) {
                return redirect()->route('login');
            }

            $data = $request->toArray();
            $data['user_id'] = $user->id;

            if (! $this->nhanVienRepository->create($data) || ! $this->createUser($data)) {
                // return view('admin.nhanvien.create', [
                //     'message' => Constant::MSG['error'],
                //     'data' => $request->toArray()
                // ]);
                return $this->getCreateNhanVienView(Constant::MSG['error']);
            }

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

    /**
     * @return void
     */
    public function list()
    {
        try {
            return view('admin.nhanvien.list', [
                'errCode' => session()->get('nhanVienErrCode') ?? '',
                'message' => session()->get('nhanVienMessage') ?? '',
                'listNhanVien' => $this->nhanVienRepository->getAll(),
                'breadcrumb' => $this->breadcrumb
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
    public function getUpdateNhanVienView($id)
    {
        try {
            $nhanVien = $this->nhanVienRepository->find((int) $id);

            if (! $nhanVien || null == $nhanVien) {
                return redirect()->back();
            }

            $listChucVu = $this->chucVuRepository->getAll();
            $listPhongBan = $this->phongBanRepository->getAll();

            return view('admin.nhanvien.update', [
                'listChucVu' => $listChucVu,
                'listPhongBan' => $listPhongBan,
                'nhanVien' => $nhanVien,
                'breadcrumb' => $this->breadcrumb
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    /**
     * @param [type] $id
     * @param NhanVienRequest $request
     * 
     * @return void
     */
    public function updateNhanVien($id, NhanVienRequest $request)
    {
        try {
            if (! $this->nhanVienRepository->find((int) $id)) {
                return redirect()->back();
            }

            if (! $user = auth()->guard('user')->user()) {
                return redirect()->route('login');
            }

            $data = $request->toArray();
            $data['user_id'] = $user->id;

            if (! $this->nhanVienRepository->update((int) $id, $data)) {
                return view('admin.nhanvien.update', [
                    'message' => Constant::MSG['error'],
                    'data' => $request->toArray()
                ]);
            }

            return redirect()
                ->route('admin.nhanvien.list')
                ->with([
                    'nhanVienErrCode' => Constant::ERR_CODE['updated'],
                    'nhanVienMessage' => Constant::MSG['updated']
                ]);
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }   

    /**
     * @param array $data
     * 
     * @return boolean
     */
    public function createUser($data = []) : bool
    {
        if ($this->userRepository->checkExistedEmail($data['email'])) {
            $this->getCreateNhanVienView($msg = 'Email đã tồn tại!');
        }

        $user = auth()->guard('user')->user();

        switch($user->role) {
            case Constant::ROLE['admin']: $role = UserConstant::USER_ROLE_VALUE['admin']; break;
            case Constant::ROLE['manager']: $role = UserConstant::USER_ROLE_VALUE['manager']; break;
            case Constant::ROLE['staff']: $role = UserConstant::USER_ROLE_VALUE['staff']; break;
            case Constant::ROLE['warehousestaff']: $role = UserConstant::USER_ROLE_VALUE['warehousestaff']; break;
            case Constant::ROLE['user']: $role = UserConstant::USER_ROLE_VALUE['user']; break;
            default: $role = 100; break;
        }

        if ($role < (int) $data['role']) {
            $data['name'] = $data['hoTen'];
            $data['password'] = Hash::make($data['password']);
            if (! $this->userRepository->create($data)) {
                return false;
            }

            return true;
        }

        return false;
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function deleteNhanVien(Request $request) {
        try {
            $this->nhanVienRepository->delete((int) $request->query('id'));
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }
}
