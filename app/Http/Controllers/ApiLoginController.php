<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);
        if (!Auth::attempt($attr)) {
            return response()->json([
                'status_code' => 401,
            ],401);
        }
            $token = auth()->user()
                        ->createToken('auth_token')->plainTextToken;
            $user = auth()->user();
            
            $respon = [
                'status_code' => 200,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_id' => $user->id,
            ];
   
            return response()->json($respon);
    }
}
