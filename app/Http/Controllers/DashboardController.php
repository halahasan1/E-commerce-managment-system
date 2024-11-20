<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all(); // Retrieve all users
        $userCount = $users->count(); // Count the users

        return view('admin.dashboard', compact('users', 'userCount'));
    }
}