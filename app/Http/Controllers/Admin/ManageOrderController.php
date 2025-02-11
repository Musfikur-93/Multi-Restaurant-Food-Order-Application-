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
use Barryvdh\DomPDF\Facade\Pdf;

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

        $totalPrice = 0;
        foreach($orderItems as $item){
            $totalPrice += $item->price * $item->qty;
        }

        return view('admin.backend.order.admin_order_details',compact('order','orderItems','totalPrice'));

    } // End Method

    public function PendingToConfirm($id){

        Order::find($id)->update(['status' => 'confirm']);
        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('confirm.order')->with($notification);

    } // End Method

    public function ConfirmToProcessing($id){

        Order::find($id)->update(['status' => 'processing']);
        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('processing.order')->with($notification);

    } // End Method

    public function ProcessingToDeliverd($id){

        Order::find($id)->update(['status' => 'deliverd']);
        $notification = array(
            'message' => 'Order Deliverd Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('deliverd.order')->with($notification);

    } // End Method


    public function AllClientOrders(){

        $clientId = Auth::guard('client')->id();

        $orderItemGroupData = OrderItem::with(['product','order'])
        ->where('client_id',$clientId)
        ->orderBy('order_id','DESC')
        ->get()
        ->groupBy('order_id');

        return view('client.backend.order.all_orders',compact('orderItemGroupData'));

    } // End Method


    public function ClientOrdersDetails($id){

        $cid = Auth::guard('client')->id();
        $order = Order::with('user')->where('id',$id)->first();
        $orderItems = OrderItem::with('product')->where('order_id',$id)->where('client_id',$cid)->orderBy('id','desc')->get();

        $totalPrice = 0;
        foreach($orderItems as $item){
            $totalPrice += $item->price * $item->qty;
        }

        return view('client.backend.order.client_order_details',compact('order','orderItems','totalPrice'));

    } // End Method


    public function UserOrderList(){
        $userId = Auth::user()->id;
        $allUserOrder = Order::where('user_id',$userId)->orderBy('id','DESC')->get();
        return view('frontend.dashboard.order.order_list',compact('allUserOrder'));

    } // End Method


    public function UserOrdersDetails($id){

        $order = Order::with('user')->where('id',$id)->first();
        $orderItems = OrderItem::with('product')->where('order_id',$id)->orderBy('id','desc')->get();

        $totalPrice = 0;
        foreach($orderItems as $item){
            $totalPrice += $item->price * $item->qty;
        }

        return view('frontend.dashboard.order.user_order_details',compact('order','orderItems','totalPrice'));

    } // End Method


    public function UserInvoiceDownload($id){

        $order = Order::with('user')->where('id',$id)->first();
        $orderItems = OrderItem::with('product')->where('order_id',$id)->orderBy('id','desc')->get();

        $totalPrice = 0;
        foreach($orderItems as $item){
            $totalPrice += $item->price * $item->qty;
        }

        $pdf = Pdf::loadView('frontend.dashboard.order.user_order_invoice', compact('order','orderItems','totalPrice'));
        return $pdf->download('invoice.pdf');

    } // End Method




} // End Main Method
