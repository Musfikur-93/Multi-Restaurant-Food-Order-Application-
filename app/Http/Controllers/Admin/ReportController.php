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

class ReportController extends Controller
{
    public function AdminAllReport(){

        return view('admin.backend.report.all_report');

    } // End Method


} // End Main Method
