<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Constants\Constant;

class AdminController extends Controller
{
    /**
     * @return Factory\View
     */
    public function index() : View
    {
        $user = Auth::user();

        return view('admin.home', [
            'user' => $user,
            'breadcrumb' => 'adminhome'
        ]);
    }

    /**
     * @return Factory\View
     */
    public function getNhanVienView() : View
    {
        return view('admin.nhanvien', [
            'breadcrumb' => 'nhanvien'
        ]);
    }

    /**
     * @return Factory\View
     */
    public function getCreatePhongBanView() : View
    {
        return view('admin.phongban.create', [
            'breadcrumb' => 'phongban'
        ]);
    }

    /**
     * @return Factory\View
     */
    public function getCreateChucVuView() : View
    {

        return view('admin.chucvu.create', [
            'breadcrumb' => 'chucvu'
        ]);
    }
}
