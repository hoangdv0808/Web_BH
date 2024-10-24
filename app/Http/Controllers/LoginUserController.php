<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as Auth;
use App\Notifications\RegistrationSuccess;
use Illuminate\Http\Request;

class LoginUserController extends Controller
{
    public function login(){
        return view('user.login.login');
    }

    public function postLogin(Request $req){

        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){

        return redirect()->route('user.home');
        }
        return redirect()->back()->with('error','email hoặc mật khẩu sai');
    }

    public function register(){
        return view('user.login.register');
    }
    public function postRegister(Request $req) {
            try {
                User::create([
                    'full_name' => $req['full_name'],
                    'email' => $req['email'],
                    'phone' => $req['phone'],
                    'password' => Hash::make($req['password']),
                ]);
            }
            catch (\Throwable $th) {
            }
        return redirect()->route('user.login');
    }

    public function project(){
        return view('user.project');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('user.login'); ;
    }
}
