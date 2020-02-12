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
}
