<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function postlogin (Request $request){
		$user = DB::table('spos_users')->where('username', $request->username)->get();

		if($user->isEmpty()){
			session()->flash('login_message', 'Username yang anda masukan tidak terdaftar! Coba lagi.');
			return redirect ('/login');
		}else{
			foreach($user as $u){
				if(Hash::check($request->password,$u->password)){
					session(['username' => $u->username]);
					session(['user_id' => $u->user_id]);
					return redirect ('/home');
				}else{
					session()->flash('login_message', 'Password yang anda masukan salah! Coba lagi.');
					return redirect ('/login');
				}
			}
		}
    }

	public function logout (){
		session()->forget('username');
		session()->forget('user_id');
		return redirect ('/login');
	}

    public function home (){
        $post = DB::table('spos_posts')->get();
		return view('home',[
			'post' => $post
		]);
	}

    public function posting(){
        //save post
    }

    public function test (){
		echo "Hallo";
	}
}