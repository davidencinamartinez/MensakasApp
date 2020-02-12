<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller {

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
}
