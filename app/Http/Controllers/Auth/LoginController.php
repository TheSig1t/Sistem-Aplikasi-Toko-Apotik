<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

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
       	$request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (!auth()->attempt($credentials)) {
            return redirect()->route('login')->with('error', 'Email-Address And Password Are Wrong.');
        }
        if (auth()->user()->role == "admin") {
            return redirect('indexPenjualan')->with('info','Selamat datang selamat bertugas');
        } elseif (auth()->user()->role == "petugas") {
            return redirect('indexPenjualanPetugas')->with('info','Selamat datang selamat bertugas');
        } elseif (auth()->user()->role == "pelanggan") {
            return redirect('indexPenjualanPelanggan')->with('info','Di Klinik Hepi Ajah!');;
        } else {
            return redirect('home');
        }
    }
}
