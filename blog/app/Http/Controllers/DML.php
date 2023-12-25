<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DML extends Controller
{

    public function lang_update(){
        if(auth()->user()->lang == "en")
            $lang = "ru";
        else
            $lang = "en";

        $data=array('lang'=>$lang);
        DB::table('users')->where('id', auth()->user()->id)->update($data);

        return redirect()->to('/');
    }

    
  
}
