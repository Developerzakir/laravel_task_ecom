@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-6">
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
            @else
            <img src="https://placehold.co/600x400" class="img-fluid rounded" alt="Placeholder Image">
            @endif
        </div>
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <div class="mb-3">
                <span class="badge bg-primary">{{ $product->category->name }}</span>
            </div>
            <h3 class="text-success mb-3">${{ number_format($product->price, 2) }}</h3>
            
            <div class="mb-4">
                <h5>Description</h5>
                <p>{{ $product->description }}</p>
            </div>
            
            @auth
            @if(!auth()->user()->is_admin)
            <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-4">
                @csrf
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="quantity" class="col-form-label">Quantity</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" id="quantity" name="quantity" 
                               class="form-control" value="1" min="1" style="width: 70px;">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </form>
            @endif
            @else
            <div class="alert alert-info">
                Please <a href="{{ route('login') }}">login</a> to add this product to your cart.
            </div>
            @endauth
            
            <div class="mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Products
                </a>
            </div>
        </div>
    </div>
</div>
@endsection