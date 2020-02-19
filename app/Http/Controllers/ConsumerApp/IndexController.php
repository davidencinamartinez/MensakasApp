<?php

namespace App\Http\Controllers\ConsumerApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class IndexController extends Controller {

  public function getLocations() {
    $locations = DB::table('locations')->get();
    return view('consumerApp.index', [  'locations' => $locations
        ]);
  }

  public function getBusinesses($id) {
  	$businesses = DB::table('businesses')->where('businesses.location_id', '=', $id)->get();
  	return view('consumerApp.businesses', ['businesses' => $businesses]);
  }
}
