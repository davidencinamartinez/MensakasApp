<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BusinessController extends Controller {

  public function getAllBusinesses() {
    $data = DB::table('businesses')
    ->join('categories','categories.id','=','businesses.category_id')
    ->join('locations', 'locations.id', '=', 'businesses.location_id')
    ->select('businesses.id', 'businesses.bus_name', 'categories.name as bus_category', 'locations.name','businesses.address','locations.postal_code')
    ->orderBy('bus_name','asc')
    ->get();
    return view('business.business_table', [  'data' => $data
    ]);
  }

    public function getBusiness($id) {
      $data = DB::table('businesses')
      ->join('locations', 'locations.id', '=', 'businesses.location_id')
      ->select( 'businesses.id','businesses.bus_name', 'businesses.bus_description', 'businesses.location_id', 'businesses.address', 'businesses.category_id', 'locations.id as location_identifier', 'locations.name', 'businesses.opening_schedule', 'businesses.closing_schedule')
      ->where('businesses.id', $id)
      ->get();
      $cat = DB::table('categories')->get();
      $locations = DB::table('locations')->get();
      return view('business.business_details', [  'data' => $data, 
                                                  'categories' => $cat,
                                                  'locations' => $locations
        ]);
    }

    public function updateBusiness($id, Request $request) {
      DB::table('businesses')->where('id', '=', $id)->update(
        [ 'category_id' => $request->input('category_id'),
          'location_id' => $request->input('location_id'),
        	'bus_name' => $request->input('bus_name'),
          'bus_description' => $request->input('bus_description'),
          'address' => $request->input('bus_address'),
          'opening_schedule' => $request->input('opening_schedule'),
          'closing_schedule' => $request->input('closing_schedule')
        ]
      );
      return redirect()->route('businesses');
    }

    public function deleteBusiness($id) {
      DB::table('businesses')->where('id', '=', $id)->delete();
      return redirect()->route('businesses');
    }

    public function createBusiness(Request $request) {
        DB::table('businesses')->insert(
          [ 'category_id' => $request->input('category_id'),
            'location_id' => $request->input('location_id'),
            'bus_name' => $request->input('bus_name'),
            'bus_description' => $request->input('bus_description'),
            'address' => $request->input('bus_address'),
            'opening_schedule' => $request->input('opening_schedule'),
            'closing_schedule' => $request->input('closing_schedule')
          ]
        );
        return redirect()->route('businesses');
    }
}
