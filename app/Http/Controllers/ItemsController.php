<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ItemsController extends Controller {

  public function getAllItems() {
    $data = DB::table('items')
    ->join('businesses', 'businesses.id', '=', 'items.bus_id')
    ->join('extras', 'extras.item_id', '=', 'items.id')
    ->select('businesses.bus_name', 'items.item_name', 'items.item_description', 'items.item_price','extras.extra_name','extras.extra_price')
    ->orderBy('businesses.bus_name','asc')
    ->get();
    return view('items.items_table', [  'data' => $data
    ]);
  }
}
