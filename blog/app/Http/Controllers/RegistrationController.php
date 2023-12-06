<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create(){
        return ("registration`");
    }

    public function store()
    {
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'dob' => 'required',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['username', 'email', 'gender','dob','password']));
        
        auth()->login($user);
        
        return redirect()->to('/home');
    }
}
