<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\NhanVienRepositoryInterface;
use App\Constants\Constant;
use App\Http\Requests\NhanVienRequest;

class NhanVienController extends Controller
{
    /**
     * @var nhanVienRepository
     */
    protected $nhanVienRepository;

    /**
     * @param NhanVienRepositoryInterface $nhanVienRepository
     */
    public function __construct(
        NhanVienRepositoryInterface $nhanVienRepository
        )
    {
        $this->nhanVienRepository = $nhanVienRepository;
    }

    public function createStaff(NhanVienRequest $request)
    {
        try {
            $user = Auth::user();

            if ($user->role == Constant::ROLE_ADMIN || $user->role == Constant::ROLE_MANAGER) {
                if (! $this->nhanVienRepository->create($request->toArray())) {
                    return view('admin.user-manager');
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
