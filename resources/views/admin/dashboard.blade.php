@extends('layouts.app')

@section('content')
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Dashboard</div>
        <div class="list-group list-group-flush">
            <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action bg-light">Home</a>
            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action bg-light">Products</a>
            <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action bg-light">Orders</a>
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-light">Users</a>
            <a href="{{ route('logout') }}" class="list-group-item list-group-item-action bg-light">Logout</a>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <h3>Total Users: {{ $userCount }}</h3>
            
            <div class="row mt-4">
                @foreach ($users as $user)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text">Email: {{ $user->email }}</p>
                                <p class="card-text">Joined: {{ $user->created_at->format('d M, Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        overflow-x: hidden; /* Prevent horizontal scroll */
    }
    #wrapper {
        display: flex;
        width: 100%;
    }
    #sidebar-wrapper {
        min-height: 100vh;
    }
    .sidebar-heading {
        padding: 15px;
        font-size: 1.5rem;
        font-weight: 500;
    }
    .list-group-item {
        border: none;
    }
    .list-group-item:hover {
        background-color: #ddd;
    }
    #page-content-wrapper {
        flex: 1;
        padding: 20px;
    }
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: scale(1.05);
    }
</style>
@endsection