<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\{
    LoginRequest,
    RegisterRequest
};
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{
    /**
     * Enregistrement d'un administrateur
     *
     * @return JsonResponse
     **/
    public function register(RegisterRequest $registerRequest) : JsonResponse
    {
        try {
            $user = User::create(
                $registerRequest->safe()->except(["password"]) + [
                    "password" => Hash::make($registerRequest->validated("password"))
                ]
            );

            $token = $user->createToken("token-name")->plainTextToken;
            return response()->json([
                "user" => $user,
                "token" => $token,
            ], 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    /**
     * Connexion d'un administrateur
     *
     * @return JsonResponse
     **/

    public function login(LoginRequest $loginRequest) : JsonResponse
    {
        try {
            $user = User::where('email', $loginRequest->validated('email'))->first();

            $token = $user->createToken("token-name")->plainTextToken;

            // Vérification de l'utilisateur et du mot de passe
            if (!$user || !Hash::check($loginRequest->validated('password'), $user->password)) {
                return response()->json([
                    "message" => "L'email ou le mot de passe est incorrect",
                ]);
            }
            return response()->json([
                "user" => $user,
                "token" => $token,
            ], 200);
        } catch (Exception $exception) {
            return response()->json(["message" => $exception->getMessage()], 400);
        }
    }
}
