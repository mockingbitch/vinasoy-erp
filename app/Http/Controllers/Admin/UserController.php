<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\UserRepositoryInterface;
use App\Repositories\Contracts\Interface\NhanVienRepositoryInterface;

class UserController extends Controller
{
    /**
     * @var $userRepository
     */
    protected $userRepository;

    protected $nhanVienRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        NhanVienRepositoryInterface $nhanVienRepository
        )
    {
        $this->userRepository = $userRepository;
    }

    public function createStaff(Request $request)
    {

    }
}
