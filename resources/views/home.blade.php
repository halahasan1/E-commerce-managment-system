@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="mt-5">Welcome to Our Website!</h1>
    <p class="lead">Your one-stop solution for all your needs.</p>
    
    <div class="floating-image">
        <img src="{{ asset('uploads/pawel-czerwinski-5DlorNZEfGc-unsplash.jpg') }}" alt="Floating Image" class="img-fluid">
    </div>

    <div class="mt-5">
        <a href="{{ route('products.index') }}" class="btn btn-primary">Explore Products</a>
    </div>
</div>
@endsection

@section('styles')
<style>
    .floating-image {
        position: relative;
        animation: float 3s ease-in-out infinite;
        margin: 20px auto;
    }

    @keyframes float {
        0%, 100% {
            transform: translatey(0);
        }
        50% {
            transform: translatey(-10px);
        }
    }
</style>
@endsection