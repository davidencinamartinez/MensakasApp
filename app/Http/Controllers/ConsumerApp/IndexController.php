<?php

namespace App\Http\Controllers\ConsumerApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use DB;

class IndexController extends Controller {

  public function getLocations() {
    $locations = DB::table('locations')->get();
    return view('consumerApp.index', [  'locations' => $locations
        ]);
  }

  public function register(Request $request) {
      DB::table('users')->insert(
          [   'first_name' => $request->input('first_name'),
              'last_name' => $request->input('last_name'),
              'email' => $request->input('email'),
              'address' => $request->input('address'),
              'role' => 1,
              'password' => Hash::make($request->input('password')),
          ]
      );
      return redirect('locations'.$request->input(''))->route('users');
            
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
    $bus_id = DB::table('businesses')->where('businesses.id', '=', $id)->value('id');
  	$items = DB::table('items')
  	->where('items.bus_id', '=', $id)
  	->select('items.*')
  	->get();
    $extras = DB::table('extras')
    ->where('extras.bus_id', '=', $id)
    ->select('extras.*')
    ->get();
  	return view('consumerApp.business_details', 
  		[	'items' => $items,
        'bus_title' => $bus_id,
  			'business' => $business,
        'extras' => $extras,
  	]);
  }

  public function postOrder(Request $request, $id) {
    DB::table('orders')->insert(
      [ 'order_date' => Carbon::now()->addHours(1),
        'consumer_id' => Auth::user()->id,
        'bus_id' => $id,
        'order_total' => $request->order_total,
        'comments' => $request->comments,
      ]);
    $lastOrder = DB::table('orders')->latest('id')->value('id');
    $items = $request->item;
    $extras = $request->extra;
    foreach ($items as $item_id) {
      DB::table('order_items')->insert(
        [ 'order_id' => intval($lastOrder),
          'item_id' => intval($item_id)
        ]);
    }
    if ($extras) {
      foreach ($extras as $extra_id) {
      DB::table('order_extras')->insert(
        [ 'order_id' => intval($lastOrder),
          'extra_id' => intval($extra_id)
        ]);
      }  
    }
    return view('consumerApp.payment', 
      [ 'total' => $request->order_total,
        'order_id' => $lastOrder,
        'date' => Carbon::now()->addHours(1)->format('d/m/Y H:i'),
      ]
    );
  }

  public function orderPayment(Request $request) {
    DB::table('orders')
    ->where('orders.id', '=', $request->order_id)
    ->update([
      'orders.status' => 1
      ]);

    return redirect()->route('index');
  }
}
