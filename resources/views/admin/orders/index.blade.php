@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Orders</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Product</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ ucfirst($order->status) }}</td> <!-- Capitalize the status -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
