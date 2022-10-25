<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            return view('home.home', [
                'user' => $user
            ]);
        }

        return view('home.home');
    }
}
