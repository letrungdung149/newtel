<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login(Request $request)
    {
        $info = [
            'name' => $request->name,
            'password' => $request->password
        ];
        $info = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($info)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        } else {
            return back()->withErrors([
                'name' => 'The provided credentials do not match our records.'
            ])->onlyInput('name');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function storeRegister(Request $request)
    {
        return view('auths.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => 'nui@gmail.com',
            'password' => Hash::make($request->password)
        ]);
        return redirect()->intended('/');
    }

}