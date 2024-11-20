@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-5">User List</h1>
    
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('styles')
<style>
    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }
    .table th, .table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
</style>
@endsection