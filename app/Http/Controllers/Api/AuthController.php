<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\logoutRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        $token = $user->createToken('auth_token');
        return response()->json([
            'message' => 'user created successfully',
            'user' => new UserResource($user),
            'token' => $token->plainTextToken,

        ], 201);
    }

    public function login(LoginRequest $request)
    {

    
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();
        if (!$user ||!Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid email or password',

            ], 401);
        }

        $token = $user->createToken('auth_token');

        return response()->json([

            'message' => 'Login successful',

            'user' => new UserResource($user),

            'token' => $token->plainTextToken

        ], 200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout successful',
        ]);


    }
}
