<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
      
            $login = $request->input('email');
            $user = DB::table('users')->where('email', $login)->orWhere('username', $login)->first();
         
        
            if (!$user) {
                //return redirect()->back()->withErrors(['email' => 'Invalid login credentials']);
            }
        
            $request->validate([
                'password' => 'required|min:8',
            ]);
        
            if (Auth::attempt(['email' => $user->email, 'password' => $request->password]) ||
                Auth::attempt(['username' => $user->username, 'password' => $request->password])) {
                Auth::loginUsingId($user->id);
                //return redirect('/');
            } else {
                //return redirect()->back()->withErrors(['password' => 'Invalid login credentials']);
            }
    }
    




    public function destroy() {
        auth()->logout();
        return redirect()->to('/home');
    } // Destroy the user session  // Redirect to the login page
}
