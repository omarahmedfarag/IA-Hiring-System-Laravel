<?php

namespace App\Http\Controllers\Api;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
       $validatedData = $request->validate([
            "name" => "required|max:55",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);
        $validatedData['password'] = bcrypt( $request->password );

        $user = User::create($validatedData);
       $userAcessToken =  $user->createToken('authToken')->accessToken;
       return response([
           "User" => $user,
           "AccessToken" => $userAcessToken
       ],Response::HTTP_CREATED);

    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if(!auth()->attempt($loginData) )
        {
            return response([ 'message' => 'InvalidCredentials' ]); 
        }
        $user = Auth::user();
        $userAcessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(["User" => $user, "ID" => Auth::id(),"AccessToken" => $userAcessToken]);

    }


}
