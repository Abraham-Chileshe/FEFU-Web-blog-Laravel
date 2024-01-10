<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AddSurvey extends Controller
{
    public function Survey(Request $request)
    {
        $user_id = auth()->user()->id;
        $name = $request->input('name');
        $email = $request->input('email');
        $age = $request->input('age');
        $country = $request->input('country');
        $rating = $request->input('rating');
        $check = $request->input('check');
        $news = $request->input('news');
        $posts = $request->input('posts');
        $design = $request->input('design');
        $text = $request->input('additional-comments');

        if($news == NULL)
            $news="0";
        if($posts == NULL)
            $posts="0";
        if ($design==NULL)
            $design="0";

        $data = array(
            'user_id' => $user_id,
            'name' => $name,
            'email' => $email,
            'age' => $age,
            'country' => $country,
            'rating' => $rating,
            'visits' => $check,
            'news' => $news,
            'posts' => $posts,
            'design' => $design,
            'comments' => $text,
        );
      

        try {
            // Insert the user into the database
            DB::table('survey')->insert($data);
            return redirect()->to('/');

        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == '1062') {
                $duplicateEmail_error = "You already gave your response to this survey";
                return redirect('/')->withErrors(['error' => $duplicateEmail_error]);
            }
        }

    }
}
