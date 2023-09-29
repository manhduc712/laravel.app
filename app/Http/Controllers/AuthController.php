<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $user = User::where('username', $request->input('username'))->first();
        if ($user && password_verify($request->input('password'), $user->password)) {
            if($user->status_id == 2){
                return back()->with('error', 'Your account has been blocked');
            }
            $userData = [
                'username' => $user->username,
                'department_id' => $user->department_id,
            ];
            session()->put('user_info', $userData);
            return redirect(route('home'))->with('success', 'Login success');
        } else {
            return back()->with('error', 'Wrong username or password');
        }
    }

    public function logout()
    {
        session()->forget('user_info');
        return redirect(route('home'))->with('success', 'Logout success');
    }
}
