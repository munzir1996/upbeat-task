<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function orderReport()
    {
        $orders = Order::all();

        return view('admin.reports.order', [
            'orders' => $orders,
        ]);
    }

    public function orderFilter(Request $request)
    {
        $orders = Order::whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->get();

        return view('admin.reports.order', [
            'orders' => $orders,
        ]);
    }

    public function userReport()
    {
        $users = User::all();

        return view('admin.reports.user', [
            'users' => $users,
        ]);
    }

    public function userFilter(Request $request)
    {
        $users = User::whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->get();

        return view('admin.reports.user', [
            'users' => $users,
        ]);
    }
}
