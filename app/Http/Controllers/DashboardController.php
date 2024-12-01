<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Status;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalCustomer = Customer::count();
        $totalOrder = Order::count();
        $totalStatus = Status::count();
        $totalTransaksi = Transaksi::count();
        $latestStatus = Status::limit(20)->get();
        return view('content.dasboard',compact('totalCustomer','totalOrder','totalStatus','totalTransaksi','latestStatus'));

}
}
