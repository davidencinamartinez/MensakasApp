<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;

class SimulationController extends Controller {

  public function getAllOrders() {
    $data = DB::table('orders')->orderBy('order_date', 'desc')->get();
      return view('business_simulation.simulation_orders_table', [  'data' => $data
    ]);
  }

  public function getOrder($id) {
    $data = DB::table('orders')->where('id', $id)->get();
    $order_items = DB::table('order_items')
      ->join('items','items.id','=','order_items.item_id')
      ->select('items.item_name as item')
      ->where('order_id', '=', $id)
      ->get();
    $order_extras = DB::table('order_extras')
      ->join('extras','extras.id','=','order_extras.extra_id')
      ->select('extras.extra_name as extra')
      ->where('order_id', '=', $id)
      ->get();
    return view('business_simulation.simulation_orders_table', [ 'data' => $data,
                                          'items' => $order_items,
                                          'extras' => $order_extras
    ]);
  }
}
