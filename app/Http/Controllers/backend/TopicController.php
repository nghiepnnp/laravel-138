<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Topic;
use App\Http\Requests\TopicInsertRequest;
use App\Http\Requests\TopicUpdateRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
	function index(){ 
		$list = Topic::where(['trash'=>0])
		->orderBy('id', 'desc')->get();
		return view('backend.pages.topic.index', compact('list'));
	}
	function trash(){
		$list = Topic::where(['trash'=>1])
		->orderBy('id', 'desc')->get();
		return view('backend.pages.topic.trash', compact('list'));
	}

	function getinsert(){
		return view('backend.pages.topic.insert');
	}
	function postinsert(TopicInsertRequest $request){
		$user_id=Auth::user()->name;
		$row = new Topic;
		$row->name=$request->name;
		$row->slug=Str::slug($request->name,'-');//link sp
		$row->created_at=Carbon::now();
		$row->created_by=$user_id;
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->save();

		return redirect()->route("topic_index")->with("message", ["type"=>"success", "msg"=>"Thêm sản phẩm thành công"]);
		//dd($row);
	}
	function getupdate($id){
		$row = Topic::find($id);
		//$row = Topic::where(['status'=>1])->orderBy('name', 'desc')->get();
		return view('backend.pages.topic.update', compact('row'));
	}
	function postupdate(TopicUpdateRequest $request, $id){
		$user_id=Auth::user()->name;
		$row = Topic::find($id);
		$row->name=$request->name;
		$row->slug=Str::slug($request->name,'-');//link sp
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		if(Topic::where([['name','=',$request->name],['id','<>',$id]])->count()){
			return redirect()->route("topic_index")->with("message", ["type"=>"danger", "msg"=>"Tên đã tồn tại"]);
		}
		$row->save();
		return redirect()->route("topic_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thành công"]);
	}
	function status($id){
		$user_id=Auth::user()->name;
		$row = Topic::find($id);
		if($row==null){
			return redirect()->route("topic_index")->with("message", ["type"=>"danger", "msg"=>"Chủ đề không tòn tại"]);
		}
		if($row->status == 1){
			$row->status = 0;
		}else{
			$row->status = 1;
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->save();
		return redirect()->route("topic_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thành công"]);
	}
	function deltrash($id){
		$user_id=Auth::user()->name;
		$row = Topic::find($id);
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		if($row==null){
			return redirect()->route("topic_index")->with("message", ["type"=>"danger", "msg"=>"Chủ đề không tòn tại"]);
		}
		$row->trash = 1;
		$row->save();
		return redirect()->route("topic_index")->with("message", ["type"=>"success", "msg"=>"Ném vào thùng rác thành công"]);
	}
	function retrash($id){
		$user_id=Auth::user()->name;
		$row = Topic::find($id);
		if($row==null){
			return redirect()->route("topic_trash")->with("message", ["type"=>"danger", "msg"=>"Chủ đề không tòn tại"]);
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->trash = 0;
		$row->save();
		return redirect()->route("topic_trash")->with("message", ["type"=>"success", "msg"=>"Khôi phục thành công"]);
	}
	function delete($id){
		$row = Topic::find($id);
		if($row==null){
			return redirect()->route("topic_trash")->with("message", ["type"=>"danger", "msg"=>"Chủ đề không tòn tại"]);
		}
		$row->delete();
		return redirect()->route("topic_trash")->with("message", ["type"=>"success", "msg"=>"Xóa vĩnh viễn thành công!"]);
	}
}
