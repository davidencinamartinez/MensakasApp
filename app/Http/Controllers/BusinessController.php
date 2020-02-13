<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BusinessController extends Controller {

  public function getAllBusinesses() {
    $data = DB::table('businesses')
    ->join('categories','categories.id','=','businesses.category_id')
    ->select('businesses.id', 'businesses.bus_name', 'categories.name as bus_category', 'businesses.address','businesses.postal_code')
    ->orderBy('bus_name','asc')
    ->get();
    return view('business.business_table', [  'data' => $data
    ]);
  }

    public function getBusiness($id) {
      $data = DB::table('businesses')->where('id', $id)->get();
      $cat = DB::table('categories')->get();
      return view('business.business_details', [  'data' => $data, 
                                                  'categories' => $cat
        ]);
    }

    public function updateBusiness($id, Request $request) {
      DB::table('businesses')->where('id', '=', $id)->update(
        [	'bus_name' => $request->input('bus_name'),
          'category_id' => $request->input('category_id'),
          'bus_description' => $request->input('bus_description'),
          'postal_code' => $request->input('postal_code'),
        ]
      );
      return back();
    }

    public function deleteBusiness($id) {
      DB::table('businesses')->where('id', '=', $id)->delete();
      return redirect()->route('businesses');
    }

    public function createBusiness(Request $request) {
        DB::table('businesses')->insert(
            [   'category_id' => $request->input('category_id'),
                'bus_name' => $request->input('bus_name'),
                'bus_description' => $request->input('bus_description'),
                'address' => $request->input('address'),
                'postal_code' => $request->input('postal_code'),
            ]
        );
        return redirect()->route('businesses');
    }
}
