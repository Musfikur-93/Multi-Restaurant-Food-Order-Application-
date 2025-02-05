<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class FilterController extends Controller
{
    public function ListRestaurant(){

        $products = Product::all();
        return view('frontend.list_restaurant', compact('products'));

    } // End of Method

    public function FilterProducts(Request $request){

        //Log::info('request data' , $request->all());

        $categoryId = $request->input('categorys');
        $cityId = $request->input('citys');
        $menuId = $request->input('menus');

        $products = Product::query();

        if($categoryId){
            $products->whereIn('category_id', $categoryId);
        }

        if($cityId){
            $products->whereIn('city_id', $cityId);
        }

        if($menuId){
            $products->whereIn('menu_id', $menuId);
        }

        $filterProducts = $products->get();

        return view('frontend.product_list', compact('filterProducts'))->render();

    } // End of Method







} // End Main Class
