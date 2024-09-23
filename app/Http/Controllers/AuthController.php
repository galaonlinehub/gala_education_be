<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        

        $user = User::create([
            'fullname'=>$request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'region_of_residence' => $request->region_of_residence,
            'highest_education_level' => $request->highest_education_level,
            'password' => Hash::make($request->password),
        ]);

        

        return response($user,200);
    }

    public function login(Request $request)
    {
        

        if (Auth::attempt(['email' => $request->login, 'password' => $request->password]) || Auth::attempt(['username' => $request->login, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->accessToken;
            return response(['user' => $user, 'token' => $token]);
        }

        return response(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response(['message' => 'Successfully logged out']);
    }

}
