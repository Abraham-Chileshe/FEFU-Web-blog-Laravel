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

        $data=array('user_id'=>$user_id, 'title'=>$title,"description"=>$desc, "date"=>$date);
        DB::table('posts')->insert($data);

        return redirect()->to('/home');

    }



    public function viewpost()
    {
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->orderBy('posts.id', 'desc')
            ->get();

        return view('blog.home', ['posts' => $posts]);
    }
}
