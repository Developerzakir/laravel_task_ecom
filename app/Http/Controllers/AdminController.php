<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function orders()
    {
        $orders = Order::with('user', 'products')->get();
        return view('admin.orders', compact('orders'));
    }

    public function approveOrder(Order $order)
    {
        $order->update(['status' => 'approved']);
        return back()->with('success', 'Order approved successfully.');
    }

    public function declineOrder(Order $order)
    {
        $order->update(['status' => 'declined']);
        return back()->with('success', 'Order declined successfully.');
    }
}
