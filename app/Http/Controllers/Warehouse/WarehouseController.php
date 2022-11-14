<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Constants\BreadcrumbConstant;

class WarehouseController extends Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $user = Auth::user();

        return view('warehouse.home', [
            'user' => $user,
            'breadcrumb' => 'warehousehome'
        ]);
    }

    /**
     * @param Request $request
     * 
     * @return string|null
     */
    public function search(Request $request) : ?string
    {
        $breadcrumb = $request->query('breadcrumb');
        $keySearch = $request->query('value');
        $url = '';

        switch ($breadcrumb) {
            case BreadcrumbConstant::BREADCRUMB['nhacungcap'] :
                $url = 'nhacungcap?keysearch=' . $keySearch; break;
            case BreadcrumbConstant::BREADCRUMB['danhmuc'] :
                $url = 'danhmuc?keysearch=' . $keySearch; break;
            case BreadcrumbConstant::BREADCRUMB['sanpham'] :
                $url = 'sanpham?keysearch=' . $keySearch; break;
            case BreadcrumbConstant::BREADCRUMB['nhapxuat'] :
                $url = 'nhapxuat?keysearch=' . $keySearch; break;
            case BreadcrumbConstant::BREADCRUMB['kho'] :
                $url = 'kho?keysearch=' . $keySearch; break;
            default :
                $url = '';
                break;
        }

        return $url;
    }
}
