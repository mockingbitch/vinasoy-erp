<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Constants\Constant;
use App\Constants\BreadcrumbConstant;

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
            'breadcrumb' => BreadcrumbConstant::BREADCRUMB['adminhome']
        ]);
    }

    /**
     * @return Factory\View
     */
    public function getCreatePhongBanView() : View
    {
        return view('admin.phongban.create', [
            'breadcrumb' => BreadcrumbConstant::BREADCRUMB['phongban']
        ]);
    }

    /**
     * @return Factory\View
     */
    public function getCreateChucVuView() : View
    {

        return view('admin.chucvu.create', [
            'breadcrumb' => BreadcrumbConstant::BREADCRUMB['chucvu']
        ]);
    }

    /**
     * Return url search
     *
     * @param Request $request
     * 
     * @return void
     */
    public function search(Request $request)
    {
        $breadcrumb = $request->query('breadcrumb');
        $keySearch = $request->query('value');
        $url = '';

        switch ($breadcrumb) {
            case BreadcrumbConstant::BREADCRUMB['phongban'] :
                $url = 'phongban?keysearch=' . $keySearch; break;
            case BreadcrumbConstant::BREADCRUMB['chucvu'] :
                $url = 'chucvu?keysearch=' . $keySearch; break;
            case BreadcrumbConstant::BREADCRUMB['nhanvien'] :
                $url = 'nhanvien?keysearch=' . $keySearch; break;
            case BreadcrumbConstant::BREADCRUMB['thuongphat'] :
                $url = 'thuongphat?keysearch=' . $keySearch; break;
            default :
                $url = '';
                break;
        }

        return $url;
    }
}
