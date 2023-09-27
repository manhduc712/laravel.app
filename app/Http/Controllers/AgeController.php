<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    public $data = [];

    public function index()
    {
        $this->data['title'] = 'Age';

        return view('contents.age', $this->data);
    }

    public function checkAge(Request $request)
    {
        $age = $request->input('age');
        $request->session()->put('age', $age);
        $sessionAge = $request->session()->get('age');
        if ($sessionAge === $age) {
            return redirect(route('account'));
        }
    }
}
