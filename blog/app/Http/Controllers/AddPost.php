<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class AddPost extends Controller
{
    public function postinsert(Request $request)
    {
        $mytime = now();
        $date =  $mytime->toDateTimeString();
        $user_id = auth()->user()->id;
        $title = $request->input('title');
        $desc= $request->input('description');
        $path = "";

        $file = $request->file('photo');
        // Check if a file was uploaded
        if ($file) {
            // Ensure the 'uploads/students/' directory exists
            $uploadPath = 'uploads/';
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Move the file to the specified directory
            $file->move($uploadPath, $filename);

            $data=array('user_id'=>$user_id, 'title'=>$title, 'path'=>$uploadPath.$filename, "description"=>$desc, "date"=>$date);
            DB::table('posts')->insert($data);
        }else{

            $data=array('user_id'=>$user_id, 'title'=>$title, 'path'=>$path, "description"=>$desc, "date"=>$date);
            DB::table('posts')->insert($data);
        }

    
        

       

        return redirect()->to('/');
      

    }

  
}
