<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AddLike extends Controller
{
    public function Like(Request $request)
    {
        $id = $request->input('postid');
        $liker = Auth()->user()->id;
    
        $data = [
            'post_id' => $id,
            'Liker' => $liker
        ];
    
        $exists_like = DB::table('likes')
            ->where([
                ['post_id', '=', $id],
                ['Liker', '=', $liker],
            ])
            ->first();
    
        if ($exists_like === null) {
            // No record found
            DB::table('likes')->insert($data);
        } else {
            // Record found
            DB::delete('DELETE FROM likes WHERE post_id = ? AND Liker = ?', [$id, $liker]);
        }
    
        $likeCount = DB::table('likes')->where('post_id', $id)->count();
    
        return response()->json(['likes' => $likeCount]);
    }
}
