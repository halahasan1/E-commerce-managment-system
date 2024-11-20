@extends('layouts.app')

@section('content')
    
<div class="container">
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a>
    <a href="{{ route('products.deleted') }}" class="btn btn-custom">View Deleted Products</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Categories</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>
                        <img src="{{ asset($product->image) }}" class="img-fluid" alt="{{ $product->name }}" style="max-width: 100px; height: auto;">
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @foreach($product->categories as $category)
                            {{ $category->name }} @if(!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            
        </tbody>
    </table>
</div>
@endsection