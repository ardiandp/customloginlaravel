<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register()
    {
        return view('pegawai.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|numeric',
        ]);

        Pegawai::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        $credentials = $request->only('email', 'password');
        //Auth::attempt($credentials);
        Auth::guard('pegawai')->attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('pegawai/dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }

    public function login()
    {
        return view('pegawai.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

       // if(Auth::attempt($credentials))
       if(Auth::guard('pegawai')->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('pegawai/dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    } 

    public function dashboard()
    {
        //return view('pegawai.dashboard');
        //if(Auth::check())
        if(Auth::guard('pegawai')->check())
        {
            return view('pegawai.dashboard');
        }
        
        return redirect()->route('pegawai/login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 

    public function logout(Request $request)
    {
        //Auth::logout();
        Auth::guard('pegawai')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('pegawai/login')
            ->withSuccess('You have logged out successfully!');;
    }    

}
