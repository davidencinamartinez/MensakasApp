<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminPanelController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getUsers() {
        $users = DB::table('users')->orderBy('role', 'desc')->get();
        return view('users.users_table', [  'data' => $users
        ]);
    }
}
