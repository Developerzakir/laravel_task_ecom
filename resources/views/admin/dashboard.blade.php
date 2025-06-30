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

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-tags me-2"></i> Categories
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('categories.create') }}" class="btn btn-success">
                            <i class="fas fa-plus-circle me-2"></i> Add New Category
                        </a>
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-success">
                            <i class="fas fa-list me-2"></i> View Categories
                        </a>
                    </div>
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