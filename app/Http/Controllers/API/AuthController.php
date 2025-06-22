<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $loginRequest){

    //     $loginRequest->validate([
    //     'phone' => ['required', 'regex:/^07[7-9][0-9]{7}$/'],
    //     'password' => ['required'],
    // ]);
        $validator = Validator::make($loginRequest->all(), [
            'phone' => ['required', 'regex:/^07[7-9][0-9]{7}$/'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!Auth::attempt($loginRequest->only('phone', 'password'))) {
            return response()->json([
                'message' => 'Invalid phone or password'
            ], 401);
        }
        $user = User::where('phone', $loginRequest->phone)->firstOrFail();

        if(!$user || !Hash::check($loginRequest->password , $user->password)){

            return response()->json([
                'message'=>' phone or password ar wrong',
            ],401);
        }

            $token = $user->createToken('auth_token')->plainTextToken;


            return response()->json([
            'message' => 'Login Successfully',
            'token' => $token,
            'user' => new UserResource($user),
        ]);
    }

    public function register(Request $registerRequest){

        $validator = Validator::make($registerRequest->all(), [
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^07[7-9][0-9]{7}$/', 'unique:users,phone'],
            'gender' => ['required', 'in:male,female'],
            'age' => 'required|integer|min:18|max:100',
            'id_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $idImagePath = $registerRequest->file('id_image')->store('id_images', 'public');

        $user = User::create([
            'name' => $registerRequest->name,
            'phone' => $registerRequest->phone,
            'gender' => $registerRequest->gender,
            'age' => $registerRequest->age,
            'id_image' => $idImagePath,
            'password' => Hash::make($registerRequest->password),
        ]);


        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Registered successfully',
            'token' => $token,
            'user' => $user,
        ], 201);

    }
}
