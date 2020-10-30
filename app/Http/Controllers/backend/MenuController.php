<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Http\Requests\MenuInsertRequest;
use App\Http\Requests\MenuUpdateRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{
    function index(){ 
		$list = Menu::where(['trash' => 0])->orderBy('parent','desc')->get();
		return view('backend.pages.menu.index', compact('list'));
	}
	function trash(){
		$list = Menu::where(['trash'=> 1])
		->orderBy('parent', 'desc')->get();
		return view('backend.pages.menu.trash', compact('list'));
	}

	function getinsert(){
		$row = Menu::where(['status'=>1])->orderBy('parent', 'asc')->get();
		return view('backend.pages.menu.insert', compact('row'));
	}
	function postinsert(MenuInsertRequest $request){
		$user_id=Auth::user()->name;
		$row = new Menu;

		$row->name=$request->name;
		$row->slug=Str::slug($request->name,'-');//link sp
		
		$row->status=$request->status;
		$row->parent=$request->parent;

		$row->created_at=Carbon::now();
		$row->created_by=$user_id;
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		
		if(Menu::where(['name'=>$request->name])->count()){
			return redirect()->route("menu_index")->with("message", ["type"=>"danger", "msg"=>"Tên menu đã tồn tại"]);
		}
		$row->save();
		return redirect()->route("menu_index")->with("message", ["type"=>"success", "msg"=>"Thêm sản phẩm thành công"]);
		//dd($row);
	}
	function getupdate($id){
		$row = Menu::find($id);
		$parent= Menu::where(['trash'=>0])->orderBy('parent', 'asc')->get();
		return view('backend.pages.menu.update', compact('row','parent'));
	}
	function postupdate(MenuUpdateRequest $request, $id){
	$user_id=Auth::user()->name;
		$row = Menu::find($id);
		$row->name=$request->name;
		$row->slug=Str::slug($request->name,'-');//link sp
		
		$row->status=$request->status;
		$row->parent=$request->parent;


		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		if(Menu::where([['name','=',$request->name],['id','<>',$id]])->count()){
			return redirect()->route("menu_index")->with("message", ["type"=>"danger", "msg"=>"Tên sản phẩm đã tồn tại"]);
		}
		$row->save();
		return redirect()->route("menu_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật sản phẩm thành công"]);
	}
	function status($id){
		$user_id=Auth::user()->name;
		$row = Menu::find($id);
		if($row==null){
			return redirect()->route("menu_index")->with("message", ["type"=>"danger", "msg"=>"Không tòn tại"]);
		}
		if($row->status == 1){
			$row->status = 0;
		}else{
			$row->status = 1;
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->save();
		return redirect()->route("menu_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thành công"]);
	}
	function deltrash($id){
		$user_id=Auth::user()->name;
		$row = Menu::find($id);
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		if($row==null){
			return redirect()->route("menu_index")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		$row->trash = 1;
		$row->save();
		return redirect()->route("menu_index")->with("message", ["type"=>"success", "msg"=>"Ném vào thùng rác thành công"]);
	}
	function retrash($id){
		$user_id=Auth::user()->name;
		$row = Menu::find($id);
		if($row==null){
			return redirect()->route("menu_trash")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->trash = 0;
		$row->save();
		return redirect()->route("menu_trash")->with("message", ["type"=>"success", "msg"=>"Khôi phục sản phẩm thành công"]);
	}
	function delete($id){
		$row = Menu::find($id);
		if($row==null){
			return redirect()->route("menu_trash")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		$row->delete();
		return redirect()->route("menu_trash")->with("message", ["type"=>"success", "msg"=>"Xóa vĩnh viễn sản phẩm thành công!"]);
	}
}
