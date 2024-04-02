<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function customLogin(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];
        
        if (Auth::attempt($credentials)) {
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('welcome');
            }
        } else {
            return redirect()->route('auth.login')->with(['error' => 'Thông tin đăng nhập không chính xác!']);
        }
    }
    
    public function register(){
        return view('auth.register');
    }
    public function logout(){
        Auth::logout();
    }
}
