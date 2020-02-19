<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User; 
use DB;
use Hash;

class LoginController extends Controller {

    protected function loginUser(Request $request) {
        $user = User::where('email', '=', $request->input('email'))->first();
        if ($user != null && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            return back();
        } else {
            return redirect()->back();
        }
    }

    protected function logoutUser() {
        Auth::logout();
        return redirect()->route('index');
    }
}
