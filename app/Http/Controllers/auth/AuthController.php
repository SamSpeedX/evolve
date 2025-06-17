<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'address' => 'required|string',
            'number' => 'required|numeric',
            'password' => 'required|confirmed|min:4',
        ]);

        try {
            $name = $request->input('name');
            $email = $request->input('email');
            $number = $request->input('number');
            $address = $request->input('address');
            $password = $request->input('password');

            $create = User::create([
                'username' => $name,
                'email' => $email,
                'address' => $address,
                'number' => $number,
                'password' => Hash::make($password),
            ]);

            if (!$create) {
                return response()->json([
                    'status' => 'error',
                    'message' => $create,
                ]);
            }

        return response()->json(['status' => 'success', 'message' => 'Account created successfully!']);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'status' => 'success',
                'message' => 'Welcome '. Auth()->user()->username,
            ]);
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
