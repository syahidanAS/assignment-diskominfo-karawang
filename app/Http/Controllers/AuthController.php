<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('login');
    }
    public function loginAttempt(LoginRequest $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password']
        ];
        try {
            if (!Auth::attempt($credentials)) {
                return redirect()->route('login')->with('error', 'Mohon maaf, akun tidak ditemukan!');
            } else {
                return redirect()->route('admin.dashboard');
            }
        } catch (Exception $error) {
            return $error;
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Session::flush();
            return redirect('/login');
        } catch (\Throwable $error) {
            return $error;
        }
    }
}
