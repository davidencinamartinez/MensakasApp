<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class BusinessController extends Controller {

  public function getAllBusinesses() {
    if (Auth::user()) {
      if (Auth::user()->role != 4) {
          return view('login');
      } else {
        $data = DB::table('businesses')
        ->join('categories','categories.id','=','businesses.category_id')
        ->join('locations', 'locations.id', '=', 'businesses.location_id')
        ->select('businesses.id', 'businesses.bus_name', 'categories.name as bus_category', 'locations.name','businesses.address','locations.postal_code', 'businesses.bus_status')
        ->orderBy('bus_name','asc')
        ->get();
        return view('adminPanel.business.business_table', [  'data' => $data
        ]);
      }
    } else {
      return view('login');
    }
  }

  public function getBusiness($id) {
    if (Auth::user()) {
      if (Auth::user()->role != 4) {
          return view('login');
      } else {
        $data = DB::table('businesses')
        ->join('locations', 'locations.id', '=', 'businesses.location_id')
        ->select( 'businesses.id','businesses.bus_name', 'businesses.bus_description', 'businesses.location_id', 'businesses.address', 'businesses.category_id', 'locations.id as location_identifier', 'locations.name', 'businesses.opening_schedule', 'businesses.closing_schedule', 'businesses.bus_status')
        ->where('businesses.id', $id)
        ->get();
        $cat = DB::table('categories')->get();
        $locations = DB::table('locations')->get();
        return view('adminPanel.business.business_details', 
          [   'data' => $data, 
              'categories' => $cat,
              'locations' => $locations
          ]);
      }
    } else {
      return view('login');
    }
  }

  public function updateBusiness($id, Request $request) {
    if (Auth::user()) {
      if (Auth::user()->role != 4) {
          return view('login');
      } else {
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
    } else {
      return view('login');
    }
  }

      public function deleteBusiness($id) {
        if (Auth::user()) {
          if (Auth::user()->role != 4) {
              return view('login');
          } else {
            DB::table('businesses')->where('id', '=', $id)->update(
              [ 'bus_status' => 2]
            );
            return redirect()->route('businesses');
          }
    } else {
      return view('login');
    }
  }

    public function createBusiness(Request $request) {
      if (Auth::user()) {
        if (Auth::user()->role != 4) {
            return view('login');
        } else {
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
    } else {
      return view('login');
    }
  }
}
