<?php

namespace App\Http\Controllers;

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
        $pwd = $request->input('password');
        $vk = "https://vk.com/";
        $lang = "en";
        $new = "1";
        $join = now();
        $date =  $join->toDateTimeString();

        $pwd = bcrypt($pwd);
        $data=array('name'=>$username,"email"=>$email,"gender"=>$gender,"dob"=>$dob, "password"=>$pwd, "lang"=>$lang, "vk"=>$vk, "created_at"=>$date, "new_acc"=>$new);
        DB::table('users')->insert($data);

        $user = DB::table('users')->where('email', $email)->first();

        auth()->loginUsingId($user->id);

        return redirect()->to('/home');
    }
}
