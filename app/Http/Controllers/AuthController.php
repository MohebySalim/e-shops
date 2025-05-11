<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|exists:role,id', // Ensure the role exists
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Attempt to authenticate
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Redirect based on role
        if ($user->role->role === 'admin') {
            return response()->json(['message' => 'Login successful', 'redirect_to' => '/admin-dashboard']);
        } elseif ($user->role->role === 'seller') {
            return response()->json(['message' => 'Login successful', 'redirect_to' => '/seller-dashboard']);
        } else {
            return response()->json(['message' => 'Login successful', 'redirect_to' => '/home']);
        }
    }

    /**
     * Handle user logout.
     */
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out successfully']);
    }
}