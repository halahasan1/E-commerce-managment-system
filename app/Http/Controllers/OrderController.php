<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch orders with user and product details
        $orders = Order::with(['user', 'product'])->get();

        return view('admin.orders.index', compact('orders'));
    }
}