<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    use ApiResponse;

    public function login(Request $request)
    {
       $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
        ]);
       
        $user = User::query()->where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email atau password salah.'],
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return $this->success([
            'user' => $user,
            'token' => $token,
        ], 'Login berhasil');
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user && method_exists($user, 'tokens')) {
            $user->tokens()->delete();
        }

        return $this->success(null, 'Logout berhasil');
    }
}
