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
        $users = DB::table('users')->get();
        return view('users', [  'data' => $users
        ]);
    }
}
