<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->baseUrl = config("app.api_url_base");
    }
    public function login(Request $request)
    {
        //login
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response("Bad request. Please verify email and password.", 400);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            Session::flash('status', 'Login Unuccessful');
            return view('index');
        }
        Session::flash('status', 'Login Successful');
        $accessToken = $user->createToken('AppToken')->plainTextToken;
        return view('dashboard', ['user' => $user]);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response("Token deleted", 200);
    }
}
