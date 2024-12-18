<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;

class CartController extends Controller
{

    public function AddToCart($id){

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

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

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('validity','>=',Carbon::now()->format('Y-m-d'))->first();

        $cart = session()->get('cart',[]);
        $totalAmount = 0;
        $clientId = [];

        foreach ($cart as $car) {
            $totalAmount += ($car['price'] * $car['quantity']);
            $pd = Product::find($car['id']);
            $cid = $pd->client_id;
            array_push($clientId,$cid);
        }

        if ($coupon) {
            if (count(array_unique($clientId)) === 1) {
                $cvendorId = $coupon->client_id;

                if ($cvendorId == $clientId[0]) {
                    Session::put('coupon',[
                        'coupon_name' => $coupon->coupon_name,
                        'discount' => $coupon->discount,
                        'discount_amount' => $totalAmount - ($totalAmount * $coupon->discount/100),
                    ]);

                    $couponData = Session()->get('coupon');

                    return response()->json(array(
                        'validity' => true,
                        'success' => 'Coupon Applied Successfully',
                        'couponData' => $couponData,
                    ));
                }else{
                    return response()->json(['error' => 'This Coupon Not Valid for this Restrurant']);
                }
            }else{
                return response()->json(['error' => 'This Coupon for one of the selected Restrurant']);
            }
        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }

    } // End Method


    public function CouponRemove(){

        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully!']);

    } // End Method




} // End Main Method
