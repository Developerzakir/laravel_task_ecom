@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Order Management</h1>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td>{{ $order->item_count }}</td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status == 'pending') bg-warning
                                    @elseif($order->status == 'processing') bg-info
                                    @elseif($order->status == 'completed') bg-success
                                    @elseif($order->status == 'declined') bg-danger
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-info" data-bs-toggle="modal" 
                                       data-bs-target="#orderModal{{ $order->id }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if($order->status == 'pending')
                                    <form action="{{ route('admin.orders.approve', $order) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.orders.decline', $order) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                                
                                <!-- Order Details Modal -->
                                <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Order #{{ $order->order_number }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <h6>Customer Information</h6>
                                                        <p>
                                                            <strong>Name:</strong> {{ $order->user->name }}<br>
                                                            <strong>Email:</strong> {{ $order->user->email }}<br>
                                                            <strong>Phone:</strong> {{ $order->shipping_phone }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Shipping Address</h6>
                                                        <p>
                                                            {{ $order->shipping_address }}<br>
                                                            {{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip_code }}
                                                        </p>
                                                    </div>
                                                </div>
                                                
                                                <h6>Order Items</h6>
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Price</th>
                                                            <th>Qty</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($order->products as $product)
                                                        <tr>
                                                            <td>{{ $product->name }}</td>
                                                            <td>${{ number_format($product->pivot->price, 2) }}</td>
                                                            <td>{{ $product->pivot->quantity }}</td>
                                                            <td>${{ number_format($product->pivot->price * $product->pivot->quantity, 2) }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="3">Subtotal</th>
                                                            <th>${{ number_format($order->total_amount, 2) }}</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection