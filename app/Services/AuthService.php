<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(array $credentials, $request)
    {
        $attempt = Auth::attempt($credentials);

        // if (!Auth::attempt($credentials)) {
        if (!$attempt) {
            return null;
        }

        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken('API Token')->plainTextToken;

        return ['user' => $user, 'token' => $token];
    }

    public function logout($request)
    {
        $user = Auth::user();
        $user->tokens()->where('tokenable_id', $user->id)->delete();
        auth()->guard('web')->logout();
    }
}
