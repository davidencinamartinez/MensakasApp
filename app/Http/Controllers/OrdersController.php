<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrdersController extends Controller {

  public function getAllOrders() {
    $data = DB::table('orders')->orderBy('order_date', 'desc')
    ->join('businesses', 'businesses.id', '=', 'orders.bus_id')
    ->select('orders.id', 'orders.order_date', 'orders.order_total', 'orders.order_status', 'businesses.bus_name')
    ->get();
    return view('orders.orders_table', [  'data' => $data
    ]);
  }

  public function getOrder($id) {
    $data = DB::table('orders')->where('id', $id)->get();
    $business = DB::table('orders')
      ->join('businesses', 'businesses.id', '=', 'orders.bus_id')
      ->select('businesses.bus_name')
      ->where('orders.bus_id', '=', $id)
      ->first();
    $order_items = DB::table('order_items')
      ->join('items','items.id','=','order_items.item_id')
      ->select('items.item_name', 'items.item_price')
      ->where('order_id', '=', $id)
      ->get();
    $order_extras = DB::table('order_extras')
      ->join('extras','extras.id','=','order_extras.extra_id')
      ->select('extras.extra_name', 'extras.extra_price')
      ->where('order_id', '=', $id)
      ->get();
    return view('orders.order_details', [ 'data' => $data,
                                          'business' => $business,
                                          'items' => $order_items,
                                          'extras' => $order_extras,
    ]);
  }
  
}