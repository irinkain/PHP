<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user/index', ['users' => $users]);
    }
    //
    public function login(){
        return view('user.login');
    }
    public function postLogin(LoginRequest $request){
        //        dd($request->all());
        $credentials = $request->except(('_token'));
        if (Auth::attempt($credentials)){
            return redirect()->route('posts.my_posts');
        }else{
            abort(403);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function register(){
        return view('user.register');
    }

    public function postRegister(LoginRequest $request){
        $user = new User($request->all());
        $user -> password = bcrypt($request->input('password'));
        $user->save();
        return $this->postLogin($request);
    }
}
