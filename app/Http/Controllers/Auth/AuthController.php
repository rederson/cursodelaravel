<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function formRegister()
    {
        return view('auth.register');
    }

    public function formLogin()
    {
        if(Auth::check())
            return redirect()->route('users.index');

        return view('auth.login');
    }

    public function login(LoginStoreRequest $request)
    {
        $credentials = $request->validated();

        //dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //Authentication passed...
            return redirect()->intended(route('users.index'));
        }
        // caso não esteja logado é redirecionado pelo código abaixo
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
