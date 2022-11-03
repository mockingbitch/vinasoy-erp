<?php

namespace App\Http\Controllers\warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KhoController extends Controller
{
    protected $breadcrumb = 'kho';

    public function list()
    {
        return view('warehouse.kho.list', [
            'breadcrumb' => $this->breadcrumb
        ]);
    }
}
