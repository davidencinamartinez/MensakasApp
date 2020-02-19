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
  	$location = DB::table('locations')->where('locations.id', '=', $id)->value('name');
  	return view('consumerApp.businesses', ['businesses' => $businesses, 'location' => $location]);
  }

  public function getBusinessDetails($id) {
  	$business = DB::table('businesses')
  	->where('businesses.id', '=', $id)
  	->join('locations', 'locations.id', '=', 'businesses.location_id')
  	->select('businesses.*', 'locations.name as loc_name')
  	->get();
  	$items = DB::table('items')
  	->where('items.bus_id', '=', $id)
  	->select('items.*')
  	->get();
  	return view('consumerApp.business_details', 
  		[	'items' => $items,
  			'business' => $business
  	]);
  }
}
