<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\Interface\ChucVuRepositoryInterface;
use App\Http\Requests\ChucVuRequest;

class ChucVuController extends Controller
{
    protected $chucVuRepository;

    public function __construct(ChucVuRepositoryInterface $chucVuRepository)
    {
        $this->chucVuRepository = $chucVuRepository;
    }

    public function createChucVu(ChucVuRequest $request)
    {

    }
}
