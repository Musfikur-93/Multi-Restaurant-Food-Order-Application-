<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\City;

class CityController extends Controller
{

    public function AllCity(){

        $city = City::latest()->get();
        return view('admin.backend.city.all_city',compact('city'));

    } // End Method


    public function StoreCity(Request $request){

        City::create([
            'city_name' => $request->city_name,
            'city_slug' => strtolower(str_replace(' ','-',$request->city_name)),
        ]);


        $notification = array(
            'message' => 'City Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


    public function EditCity($id){

        $city = City::find($id);
        return response()->json($city);

    } // End Method


    public function UpdateCity(Request $request){

        $city_id = $request->city_id;

        City::find($city_id)->update([
            'city_name' => $request->city_name,
            'city_slug' => strtolower(str_replace(' ','-',$request->city_name)),
        ]);


        $notification = array(
            'message' => 'City Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


    public function DeleteCity($id){

        City::find($id)->delete();

        $notification = array(
            'message' => 'City Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method








} // End Main Method
