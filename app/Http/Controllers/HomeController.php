<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    public function index()
    {
        return view('contents.home');
    }

    public function testGmail()
    {
        $name = 'Nguyen Van A';
        Mail::send('mail.hello', compact('name'), function($email) use($name){
            $email->subject('Test send mail');
            $email->to('ducnm071202@gmail.com', $name);
        }); 

    }
}
