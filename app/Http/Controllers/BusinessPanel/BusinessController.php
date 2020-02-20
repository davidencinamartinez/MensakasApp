<?php

namespace App\Http\Controllers\BusinessPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use DB;

class BusinessController extends Controller {
  public function getOrders() {
    if (Auth::user()) {
      if (Auth::user()->role != 3) {
          return view('login');
      } else {
        $data = DB::table('orders')->orderBy('order_date', 'desc')
        ->join('businesses', 'businesses.id', '=', 'orders.bus_id')
        ->where('businesses.id', '=', Auth::user()->bus_id)
        ->select('orders.id', 'orders.order_date', 'orders.order_total', 'orders.order_status', 'orders.pickup_time', 'businesses.bus_name')
        ->get();
        return view('businessPanel.index', [  'data' => $data
        ]);
      }
    } else {
      return view('login');
    }
  }
}