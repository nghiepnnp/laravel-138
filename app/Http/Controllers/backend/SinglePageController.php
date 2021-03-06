<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SinglePage;
use App\Http\Requests\SinglePageInsertRequest;
use App\Http\Requests\SinglePageUpdateRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;
class SinglePageController extends Controller
{
	function index(){ 
		$list = SinglePage::where(['trash'=>0])
		->orderBy('id', 'desc')->get();
		return view('backend.pages.single-page.index', compact('list'));
	}
	function trash(){
		$list = SinglePage::where(['trash'=>1])
		->orderBy('id', 'desc')->get();
		return view('backend.pages.single-page.trash', compact('list'));
	}

	function getinsert(){
		return view('backend.pages.single-page.insert');
	}
	function postinsert(SinglePageInsertRequest $request){
		$user_id=Auth::user()->name;
		$row = new SinglePage;
		$row->name=$request->name;
		$row->slug=Str::slug($request->name,'-');//link sp
		$row->content=html_entity_decode($request->content);
		
		$row->created_at=Carbon::now();
		$row->created_by=$user_id;
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->save();

		return redirect()->route("singlepage_index")->with("message", ["type"=>"success", "msg"=>"Thêm sản phẩm thành công"]);
		//dd($row);
	}
	function getupdate($id){
		$row = SinglePage::find($id);
		return view('backend.pages.single-page.update', compact('row'));
	}
	function postupdate(SinglePageUpdateRequest $request, $id){
		$user_id=Auth::user()->name;
		$row = SinglePage::find($id);
		$row->name=$request->name;
		$row->slug=Str::slug($request->name,'-');//link sp
		$row->content=html_entity_decode($request->content);
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		if(SinglePage::where([['name','=',$request->name],['id','<>',$id]])->count()){
			return redirect()->route("singlepage_index")->with("message", ["type"=>"danger", "msg"=>"Tên đã tồn tại"]);
		}
		$row->save();
		return redirect()->route("singlepage_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thành công"]);
	}
	function status($id){
		$user_id=Auth::user()->name;
		$row = SinglePage::find($id);
		if($row==null){
			return redirect()->route("singlepage_index")->with("message", ["type"=>"danger", "msg"=>"Chủ đề không tòn tại"]);
		}
		if($row->status == 1){
			$row->status = 0;
		}else{
			$row->status = 1;
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->save();
		return redirect()->route("singlepage_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thành công"]);
	}
	function deltrash($id){
		$user_id=Auth::user()->name;
		$row = SinglePage::find($id);
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		if($row==null){
			return redirect()->route("singlepage_index")->with("message", ["type"=>"danger", "msg"=>"Chủ đề không tòn tại"]);
		}
		$row->trash = 1;
		$row->save();
		return redirect()->route("singlepage_index")->with("message", ["type"=>"success", "msg"=>"Ném vào thùng rác thành công"]);
	}
	function retrash($id){
		$user_id=Auth::user()->name;
		$row = SinglePage::find($id);
		if($row==null){
			return redirect()->route("singlepage_trash")->with("message", ["type"=>"danger", "msg"=>"Chủ đề không tòn tại"]);
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->trash = 0;
		$row->save();
		return redirect()->route("singlepage_trash")->with("message", ["type"=>"success", "msg"=>"Khôi phục thành công"]);
	}
	function delete($id){
		$row = SinglePage::find($id);
		if($row==null){
			return redirect()->route("singlepage_trash")->with("message", ["type"=>"danger", "msg"=>"Chủ đề không tòn tại"]);
		}
		$row->delete();
		return redirect()->route("singlepage_trash")->with("message", ["type"=>"success", "msg"=>"Xóa vĩnh viễn thành công!"]);
	}
}
