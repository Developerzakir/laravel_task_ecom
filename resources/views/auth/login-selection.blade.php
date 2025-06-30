@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Select Login Type') }}</div>

                <div class="card-body text-center">
                    <form method="GET" action="{{ route('login.post') }}">
                        @csrf
                        <button type="submit" name="user_type" value="admin" 
                                class="btn btn-primary btn-lg m-3">
                            Admin Login
                        </button>
                        <button type="submit" name="user_type" value="customer" 
                                class="btn btn-secondary btn-lg m-3">
                            Customer Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection