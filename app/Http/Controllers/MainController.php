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

	public function new_post(){
        $category = DB::table('spos_category')->get();
		$user = DB::table('spos_users')->where('user_id', '!=', session('user_id'))->get();
		return view('new_post',[
			'category' => $category,
			'user' => $user
		]);
    }

    public function posting(Request $request){
        if ($request->hasFile('foto')){
			$path = $request->foto->store('foto');
			$id_foto = DB::table('spos_photos')->insertGetId([
				'photo_dir' => $path,
			], 'photo_id');
		}else{
			$id_foto = null;
		}
		
		if (empty($request->tag)) {
			$final_tagged = null;
	   	}else{
			$tagged = '';
			foreach($request->tag as $t){
				$tagged = $tagged.$t.',';
			}
			$final_tagged = substr($tagged, 0, -1);
		}
		
		$id_post = DB::table('spos_posts')->insertGetId([
			'user_id' => session('user_id'),
			'category_id' => $request->kategori,
			'photo_id' => $id_foto,
			'title' => $request->title,
			'post' => $request->post
		], 'post_id');

		if($tagged !== null){
			DB::table('spos_relationships')->insert([
				'user_id' => session('user_id'),
				'post_id' => $id_post,
				'tagged' => $final_tagged
			]);
		}

		return redirect('/home');
    }

	public function detail_post($id)
    {
        $post = DB::table('spos_posts')
			->leftJoin('spos_category', 'spos_category.category_id', '=', 'spos_posts.category_id')
			->leftJoin('spos_photos', 'spos_photos.photo_id', '=', 'spos_posts.photo_id')
			->leftJoin('spos_users', 'spos_users.user_id', '=', 'spos_posts.user_id')
            ->select('*')
			->where('spos_posts.post_id', $id)->first();
        $tag_id = DB::table('spos_relationships')->where('post_id', $id)->first();
		if($tag_id === null){
			$tag_name = "Tidak ada tag";
		}else{	
			$tag_name = "";
			$tag_id_exploded = explode(",",$tag_id->tagged);
			foreach($tag_id_exploded as $te){
				if($te !== null){
					$tagged_user = DB::table('spos_users')->where('user_id', $te)->first();
					$tag_name = $tag_name.$tagged_user->username.', ';
				}
			}
			$tag_name = substr($tag_name, 0, -2);
		}

        return view('detail_post', [
            'post' => $post, 
            'tag_name' => $tag_name
        ]);
    }

    public function test (){
		echo "Hallo";
	}
}