<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    //

    public function create(){
        return view('Mail/create');
    }

    public function sendMail(){
        Mail::raw("My mail", function ($message){
            $message->to(request('mail'))
                ->subject("This is important mail!!!");
        });
        return redirect()->back();
    }
}
