<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dangnhap(Request $request) {
        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt( ['name' => $username, 'password' => $password])) {
           return view('login.thanhcong', ['user' => Auth::user()]);
        } else {
            echo 'fail';
        }
    }
}
