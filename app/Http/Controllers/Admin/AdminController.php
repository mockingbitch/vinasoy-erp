<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @return void
     */
    public function index() 
    {
        $user = Auth::user();

        return view('admin.index', [
            'user' => $user
        ]);
    }
}
