<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    ##------------------------------------------------REGISTER
    public function register(Request $request)
    {
        //VALIDATION DATA
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:255',
            'email' => 'email|required|max:255|unique:users,email',
            'password' => ['confirmed', 'required', Rules\Password::defaults()],
        ], [], []);

        if ($validator->fails()) {
            return ApiResponse::senResponse(422, 'Register Validation Errors', $validator->errors());
        }

        //STORE DATA AFTER VALIDATION 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $data['token'] = $user->createToken('APItoken')->plainTextToken;
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        return ApiResponse::senResponse(201, 'User Account
        
        Registered Successfully', $data);
        ##------------------------------------------------REGISTER
    }


    ##------------------------------------------------LOGIN
    public function login(Request $request)
    {
        //VALIDATION DATA
        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required',
        ], [], []);

        if ($validator->fails()) {
            return ApiResponse::senResponse(422, 'Login Validation Errors', $validator->errors());
        }

        //CHECK USER INFO 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $userCurrent = Auth::user();
            $data['token'] = $userCurrent->createToken('APItoken')->plainTextToken;
            $data['name'] = $userCurrent->name;
            $data['email'] = $userCurrent->email;
            return ApiResponse::senResponse(200, 'Login Successfully', $data);
        } else {
            return ApiResponse::senResponse(200, 'User Credentials does\'t exist', []);
        }
    }


    ##------------------------------------------------LOGOUT
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::senResponse(200, 'Logged Out Successfully', null);
    }
}
