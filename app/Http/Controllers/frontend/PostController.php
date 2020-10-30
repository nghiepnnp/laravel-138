<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Models\Post;
class PostController extends Controller
{
	function index(){
		$list = Post::where(['status'=>1])->orderBy('created_at','desc')->paginate(5);
		return view('frontend.bai-viet.index', compact('list')); 
	}
	function postdetail($slug){
		$row=Post::where(['status'=>1, 'slug'=>$slug])->first();
		$list = Post::where(['status'=>1])->orderBy('created_at','desc')->get();
    	return view('frontend.bai-viet.detail', compact('row', 'list'));
	}
}
