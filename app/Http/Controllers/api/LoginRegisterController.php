<?php

namespace App\Http\Controllers\api;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    
        public function register(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
    
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);
    
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                'user' => $user,
                'token' => $token
            ], 201);
        }
    
        public function login(Request $request)
        {
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            if (!auth()->attempt($validated)) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
    
            $user = auth()->user();
            
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }
    
        public function logout()
        {
            auth()->user()->tokens()->delete();
            return response()->json(['message' => 'Logged out']);
        }
    }
