<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
      
            $email = $request->input('email');
            $password = $request->input('pwd');


        
            $user = DB::table('users')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
         
        
            if ($user === NULL) {
                $duplicateEmail_error = "Failed to Login. Either your email or password is wrong";
                return redirect('/')->withErrors(['error' => $duplicateEmail_error]);
               
            }else{

                try {
                 
                    auth()->loginUsingId($user->id);
                    return redirect()->to('/');
        
                } catch (\Illuminate\Database\QueryException $e) {
                    return("Failed");
                }
              
              
               
    
            }
        
           
    }
    




    public function destroy() {
        auth()->logout();
        return redirect()->to('/');
    } // Destroy the user session  // Redirect to the login page
}
