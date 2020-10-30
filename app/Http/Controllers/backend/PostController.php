<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\PostInsertRequest;
use App\Http\Requests\PostUpdateRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	function index(){ 
		$list = Post::where(['trash'=> 0])
		->orderBy('created_at', 'desc')->get();
		return view('backend.pages.post.index', compact('list'));
	}
	function trash(){
		$list = Post::where(['trash'=> 1])
		->orderBy('created_at', 'desc')->get();
		return view('backend.pages.post.trash', compact('list'));
	}
	
	function status($id){
		$user_id=Auth::user()->name;
		$row = Post::find($id);
		if($row==null){
			return redirect()->route("post_index")->with("message", ["type"=>"danger", "msg"=>"Bài viết không tồn tại"]);
		}
		if($row->status == 1){
			$row->status = 0;
		}else{
			$row->status = 1;
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->save();
		return redirect()->route("post_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật bài viết thành công"]);
	}
	function deltrash($id){
		$user_id=Auth::user()->name;
		$row = Post::find($id);
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		if($row==null){
			return redirect()->route("post_index")->with("message", ["type"=>"danger", "msg"=>"Bài viết không tồn tại"]);
		}
		$row->trash = 1;
		$row->save();
		return redirect()->route("post_index")->with("message", ["type"=>"success", "msg"=>"Ném vào thùng rác thành công"]);
	}
	function retrash($id){
		$user_id=Auth::user()->name;
		$row = Post::find($id);
		if($row==null){
			return redirect()->route("post_trash")->with("message", ["type"=>"danger", "msg"=>"Bài viết không tòn tại"]);
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->trash = 0;
		$row->save();
		return redirect()->route("post_trash")->with("message", ["type"=>"success", "msg"=>"Khôi phục bài viết thành công"]);
	}
	function delete($id){
		$row = Post::find($id);
		if($row==null){
			return redirect()->route("post_trash")->with("message", ["type"=>"danger", "msg"=>"Bài viết  không tòn tại"]);
		}
		$row->delete();
		return redirect()->route("post_trash")->with("message", ["type"=>"success", "msg"=>"Xóa vĩnh viễn thành công!"]);
	}



	function getinsert(){
		return view('backend.pages.post.insert');
	}
	function postinsert(PostInsertRequest $request){
		$user_id=Auth::user()->name;
		$row = new Post;

		$row->title=html_entity_decode($request->title);
		$row->slug=Str::slug($request->title,'-');

		$row->short_description=html_entity_decode($request->short);
		$row->content=html_entity_decode($request->content);

		$row->created_at=Carbon::now();
		$row->created_by=$user_id;


		if($file = $request->hasFile('image')) {
			$file = $request->file('image') ;
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/tin-tuc/' ;
			$file->move($destinationPath,$fileName);
			$row->image = $fileName;
			$row->save();
			return redirect()->route("post_index")
			->with("message", ["type"=>"success", "msg"=>"Thêm bài viết thành công"]);
		}else{$row->save();
			return redirect()->route("post_index")
			->with("message", ["type"=>"danger", "msg"=>"Chưa chọn avatar"]);
		}
	}
	function getupdate($id){
		$row = Post::find($id);
		return view('backend.pages.post.update', compact('row'));
	}
	function postupdate(PostUpdateRequest $request, $id){
		$user_id=Auth::user()->name;
		$row = Post::find($id);
		$row->title=html_entity_decode($request->title);
		$row->slug=Str::slug($request->title,'-');
		$row->short_description=html_entity_decode($request->short);
		$row->content=html_entity_decode($request->content);

		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;

		if(Post::where([['title','=',$request->title],['id','<>',$id]])->count()){
			return redirect()->route("post_index")->with("message", ["type"=>"danger", "msg"=>"Bài viết đã tồn tại"]);
		}
		if($file = $request->hasFile('image')) {
			$file = $request->file('image') ;
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/tin-tuc/' ;
			$file->move($destinationPath,$fileName);
			$row->image = $fileName;
			$row->save();
			return redirect()->route("post_index")
			->with("message", ["type"=>"success", "msg"=>"Sửa bài viết thành công"]);
		}else{$row->save();
			return redirect()->route("post_index")
			->with("message", ["type"=>"danger", "msg"=>"Chưa chọn avatar"]);
		}
	}
}
