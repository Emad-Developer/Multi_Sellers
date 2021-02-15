<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    } 

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
            'password'=>Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect(route('auth_login'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email|max:100',
            'password'=>'required|string|max:50|min:8'            
        ]);
        $is_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if (!$is_login) {
            return back();
        }
        return redirect(route('home'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('auth_login'));
    }

    // Github Login
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    // Github handleLogin
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $email = $user->email;
        $db_user = User:: where('email','=',$email)->first();
        if ($db_user == null) {
            $register = User::create([
                'name' =>$user->name,
                'email' =>$user->email,
                'password' =>Hash::make('12345678'),
                'oauth_token' =>$user->token,
            ]);
            Auth::login($register);
        }
        else {
            Auth::login($db_user);
        }

        return redirect(route('home'));
    }

    // Facebook Login
    public function redirectToProviderFace()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook handleLogin
    public function handleProviderCallbackFace()
    {
        $user = Socialite::driver('facebook')->user();
        $email = $user->email;
        $db_user = User:: where('email','=',$email)->first();
        if ($db_user == null) {
            $register = User::create([
                'name' =>$user->name,
                'email' =>$user->email,
                'password' =>Hash::make('12345678'),
                'oauth_token' =>$user->token,
            ]);
            Auth::login($register);
        }
        else {
            Auth::login($db_user);
        }

        return redirect(route('home'));
    }
}

