@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">View Products</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <a href="{{ route('admin.orders') }}" class="btn btn-primary">Manage Orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection