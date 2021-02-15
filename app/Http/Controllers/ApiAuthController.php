<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function handleRegister(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|email|max:100',
            'password'=>'required|string|max:50|min:8'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'access_token'=> Str::random(64),
        ]);

        return response()->json($user->access_token);
    }
    public function handleLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email|max:100',
            'password'=>'required|string|max:50|min:8'
        ]);

        $is_user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        
        if(! $is_user)
        {
            $error = "credentials are not correct";
            return response()->json($error);    
        }
            $user = User::where('email' , '=' , $request->email)->first();
            $new_access_token = Str::random(64);
            $user -> update ([
                'access_token' => $new_access_token
            ]); 
            $success = "Login Successefully";
            return response()->json($new_access_token);    
    }

    public function logout(Request $request)
    {
        $access_token = $request->access_token;

        $user = User::where('access_token' , $access_token)->first();

        if ($user == null)
        {
            $error = "Token not correct";
            return response()->json($error);
        }
        else 
        {
            $user->update(['access_token'=>NULL]);
        }
        $success = "Logged Out Successfull";
        return response()->json($success);
    }
}