<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\str_random; 

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon; 
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ForgotPasswordController extends Controller
{
  public function getEmail()
  {

     return view('customauth.passwords.email');
  }

 public function postEmail(Request $request)
  {
    $request->validate([
        'email' => 'required|email|exists:users',
    ]);
    
    $token = str::random(64);

      DB::table('password_resets')->insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
      );

      Mail::send('customauth.verify', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Reset Password Notification');
      });

      return back()->with('message', 'We have e-mailed your password reset link!');
  }
}