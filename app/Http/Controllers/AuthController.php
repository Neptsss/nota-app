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
{dd($request->all());



}


}
