<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function AddToCart($id){

        $products = Product::find($id);

        $cart = session()->get('cart',[]);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $priceToShow = isset($products->discount_price) ? $products->discount_price : $products->price;
            $cart[$id] = [
                'id' => $id,
                'name' => $products->name,
                'image' => $products->image,
                'price' => $priceToShow,
                'client_id' => $products->client_id,
                'quantity' => 1,
            ];
        }

        session()->put('cart',$cart);

       // return response()->json($cart);

       $notification = array(
        'message' => 'Add to Cart Successfully',
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    } // End Method


    public function CartUpdateQuentity(Request $request){

        $cart = session()->get('cart',[]);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart',$cart);
        }

        return response()->json([
            'message' => 'Quantity Updated',
            'alert-type' => 'success'
        ]);

    } // End Method


    public function CartRemove(Request $request){

        $cart = session()->get('cart',[]);

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart',$cart);
        }

        return response()->json([
            'message' => 'Product Remove Successfully',
            'alert-type' => 'success'
        ]);

    } // End Method


    public function ApplyCoupon(Request $request){

    } // End Method




} // End Main Method
