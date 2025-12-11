<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        notify()->success('Laravel Notify is awesome!');
    // dd($request->all());
 return redirect()->route('transaksi.index');



}


}
