<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\User;
use DB;

class RegistrationController extends Controller
{
    public function create(){
        return ("registration`");
    }

    public function store(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $dob = $request->input('dob');
        $password = $request->input('password');
        $vk = "https://vk.com/";
        $lang = "en";
        $join = now();
        $date = $join->toDateTimeString();
        
    
       
    
        $data = array(
            'username' => $username,
            'email' => $email,
            'gender' => $gender,
            'dob' => $dob,
            'password' => $password,
            'lang' => $lang,
            'vk' => $vk,
            'created_at' => $date,
        );
    
        try {
            // Insert the user into the database
            DB::table('users')->insert($data);
    
            // Authenticate the user after registration
            $user = DB::table('users')->where('email', $email)->first();
            auth()->loginUsingId($user->id);
    
            // Redirect to the home view or any other desired page
            return redirect()->to('/');

        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
    
            if ($errorCode == '1062') {
                $duplicateEmail_error = "Failed. The email address you used already exists in the database";
                return redirect('/')->withErrors(['error' => $duplicateEmail_error]);
            }
        }
    }
}
