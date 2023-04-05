<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $credential = $request->validate([
            'nomor_induk' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credential)) {
            if (Auth()->user()->role == 'Admin') {
                $request->session()->regenerate();
                return redirect()->intended('admin/dashboard');
            } elseif (Auth()->user()->role == 'Guru') {
                $request->session()->regenerate();
                return redirect()->intended('guru/dashboard');
            } elseif (Auth()->user()->role == 'WaliSiswa') {
                $request->session()->regenerate();
                return redirect()->intended('walisiswa/dashboard');
            } elseif (Auth()->user()->role == 'SuperAdmin') {
                $request->session()->regenerate();
                return redirect()->intended('superadmin/dashboard');
            }
        } else {
            return back()->withErrors('gagal', 'NISN/NIP atau password anda salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
