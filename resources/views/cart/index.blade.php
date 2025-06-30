@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    
    @if($cartItems->isEmpty())
    <div class="alert alert-info">Your cart is empty.</div>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>
                    <form action="{{ route('cart.update', $item) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control" style="width: 70px;">
                        <button type="submit" class="btn btn-sm btn-info mt-1">Update</button>
                    </form>
                </td>
                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                <td>
                    <form action="{{ route('cart.remove', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th>${{ number_format($cartItems->sum(function($item) { return $item->price * $item->quantity; }), 2) }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    
    <div class="text-right">
        <form action="{{ route('order.place') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success btn-lg">Place Order</button>
        </form>
    </div>
    @endif
</div>
@endsection