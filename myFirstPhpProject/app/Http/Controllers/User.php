<?php

namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Controller
{
    public function index () {
        if (! Session :: get ('login')) {
            return redirect ('login') -> with ('alert', 'You must login first');
        }
        else {
            return view ('user');
        }
    }

    public function login () {
        return view ('login');
    }

    public function loginPost(Request $request) {

        $email = $request-> email;
        $password = $request-> password;

        $data = ModelUser :: where ('email', $email) -> first ();
        if ($data) {// whether the email exists or not
            if (Hash :: check ($password, $data-> password)) {
                Session :: put ('name', $data-> name);
                Session :: put ('email', $data-> email);
                Session :: put ('login', TRUE);
                return redirect ('home_user');
            }
else {
    return redirect ('login') -> with ('alert', 'Password or Email, Wrong!');
}
}
else {
    return redirect ('login') -> with ('alert', 'Password or Email, Wrong!');
}
}

public function logout () {
    Session :: flush ();
    return redirect ('login') -> with ('alert', 'You are logged out');
}

public function register (Request $request) {
    return view ('register');
}

    public function registerPost (Request $request) {
    $this->validate ([$request,
        'email'=>'required | min: 4 | email | unique: users',
            'password'=>'required',
            'confirmation'=>'required | same: password',
    ]);
        $data = new ModelUser ();
        $data-> name = $request-> name;
        $data-> email = $request-> email;
        $data-> password = bcrypt ($request-> password);
        $data-> save ();
        return redirect ('login') -> with ('alert-success', 'You have successfully registered');
    }
}
