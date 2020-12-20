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

    public function is_hired(User $user){
        if($user->is_hired ==1){
            $user->is_hired=0;
        }
        else{
            $user->is_hired=1;
        }
        $user->save();

        $admin = User::where('is_admin',1)->get();
        Mail::raw("Hire user!",function ($message) use ($user,$admin){
            $message->to($admin->email)
            ->subject("User N". $user->id. "  ". $user->name. "has already hired!");
        });

        response("ok",200);
    }
}
