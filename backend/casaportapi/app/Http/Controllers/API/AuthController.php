<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
  
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }


        $user = JWTAuth::user();
        $userId = $user->id;
    
        return response()->json(['token' => $token, 'user_id' => $userId,'user'=>$user]);
    }

 
    public function getUserID(Request $request)
{
    // Authenticate the user based on the provided token
    if (Auth::guard('api')->check()) {
        $user = Auth::guard('api')->user();
        $userId = $user->id;

        return response()->json(['user_id' => $userId]);
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
}
