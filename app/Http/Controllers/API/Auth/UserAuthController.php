<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\UserAuthRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    public function register(UserAuthRegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->json([
            'user' => $user->only(['id', 'name', 'email',]),
            'token' => $user->createToken('mobile-user', ['role:user'])->plainTextToken,
        ], Response::HTTP_CREATED);

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Wrong crediantials'],
            ]);
        }

        return response()->json([
            'user' => $user->only(['id', 'name', 'phone']),
            'token' => $user->createToken('mobile-user', ['role:user'])->plainTextToken,
        ], Response::HTTP_OK);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json('User Logged out', Response::HTTP_OK);
    }
}
