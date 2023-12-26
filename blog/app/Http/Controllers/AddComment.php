<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class AddComment extends Controller
{
    public function Comment(Request $request)
    {
        $id = $request->input('postid');
        $comment = $request->input('comment');
        $commenter = Auth()->user()->id;

        $mytime = now();
        $date =  $mytime->toDateTimeString();
    
        $data = [
            'post_id' => $id,
            'text' => $comment,
            'commenter' => $commenter,
            'added_at' => $date
        ];
    
        DB::table('comments')->insert($data);
        $commentCount = DB::table('comments')->where('post_id', $id)->count();
    
        return response()->json(['comments' => $commentCount]);
    }
}
