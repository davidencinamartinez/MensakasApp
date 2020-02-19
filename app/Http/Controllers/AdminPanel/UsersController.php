<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User; 
use DB;
use Hash;

class UsersController extends Controller {

	public function getAllUsers() {
        if (Auth::user()) {
            if (Auth::user()->role != 4) {
                return view('login');
            } else {
                $data = DB::table('users')->orderBy('role', 'desc')->get();
                return view('adminPanel.users.users_table', [  'data' => $data]);
            }
        } else {
            return view('login');
        }
	}

    public function getUser($id) {
        if (Auth::user()) {
            if (Auth::user()->role != 4) {
                return view('login');
            } else {
            	$data = DB::table('users')->where('id', $id)->get();
            	return view('adminPanel.users.user_details', [  'data' => $data
                ]);
            }
        } else {
            return view('login');
        }
    }

    public function updateUser($id, Request $request) {
         if (Auth::user()) {
            if (Auth::user()->role != 4) {
                return view('login');
            } else {
            	DB::table('users')->where('id', '=', $id)->update(
            		[	'first_name' => $request->input('first_name'),
            			'last_name' => $request->input('last_name'),
            			'email' => $request->input('email'),
            			'role' => $request->input('role'),
            		]
            	);
            	return redirect()->route('users');
            }
        } else {
            return view('login');
        }
    }

    public function deleteUser($id) {
         if (Auth::user()) {
            if (Auth::user()->role != 4) {
                return view('login');
            } else {
            	DB::table('users')->where('id', '=', $id)->update(
                    [   'status' => 2   ]);
                return redirect()->route('users');
            }
        } else {
            return view('login');
        }
    }

    public function createUser(Request $request) {
         if (Auth::user()) {
            if (Auth::user()->role != 4) {
                return view('login');
            } else {
                DB::table('users')->insert(
                    [   'first_name' => $request->input('first_name'),
                        'last_name' => $request->input('last_name'),
                        'email' => $request->input('email'),
                        'role' => $request->input('role'),
                        'password' => Hash::make($request->input('password')),
                    ]
                );
                return redirect()->route('users');
            }
        } else {
            return view('login');
        }
    }
}