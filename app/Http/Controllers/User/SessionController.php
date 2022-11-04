<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone_number' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials) == false) {
            return response('Номер телефона или пароль неверны, пожалуйста попробуйте снова',201);
        }
        $token=$request->user()->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=>$request->user(),
            'token'=>$token

        ];
        return response($response,201);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
