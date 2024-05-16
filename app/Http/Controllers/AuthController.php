<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthService $authService)
    {
        $this->auth = $authService;
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->validated();
        $result = $this->auth->login($credentials, $request);

        return response()->json($result, 200);

        if ($result) {
            $this->respond($result);
        } else {
            $this->respond(["message" => "Authentication Failed"], 401);
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->auth->logout($request);
            $this->respond(null, 204);
        } catch (Exception $e) {
            $this->respond($e, 500);
        }
    }
}
