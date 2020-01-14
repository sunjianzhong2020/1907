<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
class LoginController extends Controller
{
        public function login(){
       return view('admin.login.login');
   }
    public function do_login(Request $request){
       $post = $request -> except('_token');
//       dd($post);
       $user = Login::where($post)->first();
//       dd($user);
       if($user){
           session(['admin'=>$user]);
           request()->session()->save();
           return redirect('/brand');
       }
        return redirect('/login/login')->with('msg','没有此用户');
   }
   public function login_out(){
       session(['admin'=>null]);
       request()->session()->save();
       return redirect('/login/login');
    }
}
