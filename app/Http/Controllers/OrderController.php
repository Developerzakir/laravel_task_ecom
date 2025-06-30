<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function placeOrder()
    // {
    //     $user = auth()->user();
    //     $cartItems = $user->carts()->with('product')->get();

    //     if ($cartItems->isEmpty()) {
    //         return back()->with('error', 'Your cart is empty.');
    //     }

    //     $total = $cartItems->sum(function ($item) {
    //         return $item->quantity * $item->price;
    //     });

    //     $order = $user->orders()->create([
    //         'total_amount' => $total,
    //         'status' => 'pending',
    //     ]);

    //     foreach ($cartItems as $item) {
    //         $order->products()->attach($item->product_id, [
    //             'quantity' => $item->quantity,
    //             'price' => $item->price,
    //         ]);
    //     }

    //     $user->carts()->delete();

    //     return redirect()->route('orders.index')->with('success', 'Order placed successfully.');
    // }

    public function placeOrder()
    {
        $user = auth()->user();

        // Eager load product relationship for cart items
        $cartItems = $user->carts()->with('product')->get();

        // Check if the cart is empty
        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        // Calculate the total amount for the order
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        // Calculate the total number of distinct items in the cart
        // If 'item_count' should be the sum of all quantities, change to:
        // $itemCount = $cartItems->sum('quantity');
        $itemCount = $cartItems->count(); // Counts the number of distinct cart items

        // Generate a unique order number
        $orderNumber = 'ORD-' . strtoupper(Str::random(8)) . '-' . now()->format('YmdHis');

        // Create the order, including the generated order_number and item_count
        $order = $user->orders()->create([
            'order_number' => $orderNumber,
            'total_amount' => $total,
            'item_count' => $itemCount, // <--- Add the calculated item_count here
            'status' => 'pending',
        ]);

        // Attach products from the cart to the newly created order
        foreach ($cartItems as $item) {
            $order->products()->attach($item->product_id, [
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Clear the user's cart after placing the order
        $user->carts()->delete();

        // Redirect to the orders index page with a success message
        return redirect()->route('orders.index')->with('success', 'Order placed successfully.');
    }

    public function index()
    {
        $orders = auth()->user()->orders()->with('products')->latest()->get();
        return view('orders.index', compact('orders'));
    }
}
