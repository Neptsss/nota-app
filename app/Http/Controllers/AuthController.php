<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
 public function index ()
 {

    return view('Authentication.Login', [
        'title'=> "Login"

    ] );




 }
public function login(Request $request)
{
    $validate =$request->validate([
    "username"=>"required",
    "password"=>"required|min:8"
    ]);
if (Auth::attempt($validate)) {
    $request->session()->regenerate();

    notify()->success('Selamat Datang '.$request->username);
    return redirect()->intended(route('transaksi.index'));

}
    notify()->error("Username dan Password SALAH!");
    return back();

}
public function logout (Request $request) {
    Auth::logout();
     $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');

}


}
