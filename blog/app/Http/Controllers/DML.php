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

    public function delete(Request $request){
        $postid = $request->input('postid');
        
        try {
            // Insert the user into the database
            DB::table('posts')->where('id', $postid)->delete();
            return redirect()->to('/');

        } catch (\Illuminate\Database\QueryException $e) {
            return('failed');
        }
    }

    public function delete_user(Request $request){
        $user_id = $request->input('userid');
        
        try {
            // Insert the user into the database
            DB::table('users')->where('id', $user_id)->delete();
            DB::table('admins')->where('user_id', $user_id)->delete();
            DB::table('posts')->where('user_id', $user_id)->delete();
            DB::table('survey')->where('user_id', $user_id)->delete();
            DB::table('likes')->where('Liker', $user_id)->delete();
            DB::table('comments')->where('commenter', $user_id)->delete();
            return redirect()->to('/admin');

        } catch (\Illuminate\Database\QueryException $e) {
            return('failed');
        }
      
    }

    public function add_admin(Request $request){
        $user_id = $request->input('userid');
        
        $data = array(
            'user_id' => $user_id,
            
        );
      

        try {
            // Insert the user into the database
            DB::table('admins')->insert($data);
            return redirect()->to('/admin');

        } catch (\Illuminate\Database\QueryException $e){
            return('Failed to Add');
        }
    }

    public function remove_admin(Request $request){
        $user_id = $request->input('userid');

       

        try {
            // Insert the user into the database
            DB::table('admins')->where('user_id', $user_id)->delete();
            return redirect()->to('/admin');

        } catch (\Illuminate\Database\QueryException $e) {
            return('failed');
        }
        
        
    }

    
  
}
