<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function RestaurantDetails($id){

        $client = Client::find($id);
        return view('frontend.details_page',compact('client'));

    } // End Method




} // End Main Method
