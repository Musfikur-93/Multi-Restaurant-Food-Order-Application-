<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Carbon\Carbon;

class FilterController extends Controller
{
    public function ListRestaurant(){
        $products = Product::all();
        return view('frontend.list_restaurant', compact('products'));
    } // End of Method

} // End Main Class
