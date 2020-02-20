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
            return redirect()->route('index');
        } else {
            return redirect()->back();
        }
    }

    protected function logoutUser() {
        Auth::logout();
        return redirect()->route('index');
    }

    public function registerUser(Request $request) {
        DB::table('users')->insert(
            [   'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'location' => $request->input('address'),
                'role' => 1,
                'password' => Hash::make($request->input('password')),
            ]
        );
        $user = User::where('email', '=', $request->input('email'))->first();
        Auth::login($user);
        return redirect()->route('index');
    }
}
