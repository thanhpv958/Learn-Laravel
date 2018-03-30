<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function dangnhap(Request $request) {
        $username = $request->username;
        $password = $request->password;

        // Auth:: login(model)
        // $user = User::find(19);
        // Auth::login($user);
        // return view('login.thanhcong', ['user' => Auth::user()]);
        if (Auth::attempt( ['name' => $username, 'password' => $password])) {
           return view('login.thanhcong', ['user' => Auth::user()]);
        } else {
            echo 'fail';
        }
    }

    public function logout() {
        Auth::logout();
        return view('login.dangnhap');
    }
}
