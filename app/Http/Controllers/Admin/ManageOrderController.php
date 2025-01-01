<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class ManageOrderController extends Controller
{
    public function PendingOrder(){
        $allData = Order::where('status','Pending')->orderBy('id','DESC')->get();
        return view('admin.backend.order.pending_order',compact('allData'));
    } // End Method

    public function ConfirmOrder(){
        $allData = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('admin.backend.order.confirm_order',compact('allData'));
    } // End Method

    public function ProcessingOrder(){
        $allData = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('admin.backend.order.processing_order',compact('allData'));
    } // End Method

    public function DeliverdOrder(){
        $allData = Order::where('status','deliverd')->orderBy('id','DESC')->get();
        return view('admin.backend.order.deliverd_order',compact('allData'));
    } // End Method


    public function AdminOrderDetails($id){

        $order = Order::with('user')->where('id',$id)->first();
        $orderItems = OrderItem::with('product')->where('order_id',$id)->orderBy('id','desc')->get();

        $totalAmount = 0;
        foreach($orderItems as $item){
            $totalAmount += $item->price * $item->quantity;
        }

        return view('admin.backend.order.admin_order_details',compact('order','orderItems','totalAmount'));

    } // End Method



} // End Main Method
