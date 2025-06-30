<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function dashboard()
    // {
    //     return view('admin.dashboard');
    // }

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



    //================admin login/logout methods====================
    public function adminDashboard()
    {
        return view('admin.dashboard');

    } //End method

    public function adminLogin()
    {
        if (Auth::check()) {
            return redirect('/admin/dashboard'); // Redirect if already logged in
        }

        return view('admin.admin_login');

    } //End method


    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    } //End adminLogout method

}
