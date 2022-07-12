<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Http\Requests\Auth\LoginStore;
use App\Http\Requests\Auth\RegistrationStore;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
//    public function register(RegistrationStore $request) {
//        $data = $request->validated();
//
//        $user = User::add($data);
//        $user->generatePassword($request->get('password'));
//        $token = $user->createToken('auth_token')->plainTextToken;
//        event(new Registered($user));
//
//        return response()->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
//    }
//
//    public function login(LoginRequest $request) {
//        if (!Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
//            return response()->json(['message' => 'Не правильний логін або пароль', 'status' => 'failed'], 401);
//        }
//
//        $user = User::where('email', $request['email'])->firstOrFail();
//        $token = $user->createToken('auth_token')->plainTextToken;
//
//        return response()->json(['status' => 'success']);
//    }
//
//    public function logout() {
//        auth()->user()->tokens()->delete();
//
//        return [
//            'message' => 'You have successfully logged out and the token was successfully deleted'
//        ];
//    }

    public function user() {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            return response()->json(new UserResource($user));
        }

        return response()->json(['user' => null]);
    }

}
