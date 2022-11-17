<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\NhanVien;
use Illuminate\Http\RedirectResponse;
use Session;
class AuthController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
    }

    public function index()
    {
        if (Auth::guard('user')->user()) {
            return redirect()->back();
        }
        
        return view('auth.login', [
            'msg' => Session::get('msg') ?? null
        ]);
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);
            $credentials = $request->only('email', 'password');
    
            $token = Auth::guard('user')->attempt($credentials);
            if (!$token) {
                return view('auth.login')->with('msg', 'Sai tài khoản hoặc mật khẩu!!!');
            }
            $user = Auth::guard('user')->user();
    
            switch ($user->role) {
                case 'ADMIN':
                case 'MANAGER':
                case 'EMPLOYEE':
                    return redirect()->route('admin.home');
                    break;
                case 'WEARHOUSESTAFF':
                    return redirect()->route('warehouse.home');
                    break;
                case 'USER':
                    return redirect()->route('home');
                    break;
                default:
                    return redirect()->route('home');
                    break;
            }
        } catch (\Throwable $th) {
            return redirect()->route('404');
        }
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        session()->forget('cart');

        return redirect()->route('login');
    }

    public function me()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    public function profile()
    {
        $nhanVien = NhanVien::where('user_id', '=', auth()->guard('user')->user()->id)->first();

        return view('admin.profile.profile', [
            'breadcrumb' => 'profile',
            'user' => auth()->guard('user')->user(),
            'nhanVien' => $nhanVien
        ]);
    }
}