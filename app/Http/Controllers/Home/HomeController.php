<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\Interface\SanPhamRepositoryInterface;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @var sanPhamRepository
     */
    protected $sanPhamRepository;

    /**
     * @param SanPhamRepositoryInterface $sanPhamRepository
     */
    public function __construct(SanPhamRepositoryInterface $sanPhamRepository)
    {
        $this->sanPhamRepository = $sanPhamRepository;
    }

    /**
     * @return View
     */
    public function index() : View
    {
        return view('home.home', [
            'user' => $user = Auth::user() ?? '',
            'listSanPham' => $this->sanPhamRepository->getAll()
        ]);
    }

    /**
     * @return View
     */
    public function pageNotFound() : View
    {
        return view('404');
    }
}
