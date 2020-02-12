<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;

class UsersController extends Controller {

	public function getAllUsers() {
		$data = DB::table('users')->orderBy('role', 'desc')->get();
        return view('users.users_table', [  'data' => $data
        ]);
	}

    public function getUser($id) {
    	$data = DB::table('users')->where('id', $id)->get();
    	return view('users.user_details', [  'data' => $data
        ]);
    }

    public function updateUser($id, Request $request) {
    	DB::table('users')->where('id', '=', $id)->update(
    		[	'first_name' => $request->input('first_name'),
    			'last_name' => $request->input('last_name'),
    			'email' => $request->input('email'),
    			'role' => $request->input('role'),
    		]
    	);
    	return back();
    }

    public function deleteUser($id) {
    	DB::table('users')->where('id', '=', $id)->delete();
    	return redirect()->route('users');
    }

    public function createUser(Request $request) {
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
}
