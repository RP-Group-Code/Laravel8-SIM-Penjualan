<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
    public function logins(Request $request)
    {
        // $request->validate([
        //     'username' => 'required',
        //     'password' => 'required'
        // ]);
        // dd('berhasil login');
        // if(Auth::attempt($masuk)){
        //     $request->session()->regenerate();

        //     return redirect()->route("dashboard");
        // }
        // return back()->with('logineror', 'Login Gagal !');


        $username = $request->username;
        $password = $request->password;

        $user = Akun::where(['username' => $username, 'password' => $password])->get();
        $akun = Akun::all();

        if (count($user) > 0)
        {
            Session::put("user", $user);
            return redirect()->route("dashboard");
        }
        elseif($akun->status = "Not Active")
        {
            return back()->with('loginEror', 'Silahkan Melakukan Pelaporan Pada Developer Agar Mendapat Pengaktifan Akun');
        }
        else
        {
            return back()->with('loginEror', 'Login Gagal, Username / Password Salah!');
            // Alert::fail('Username Salah');
            // return redirect("/")->with('login_eror', true);
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
