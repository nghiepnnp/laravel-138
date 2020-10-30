<?php

namespace App\Http\Controllers\backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

use App\Http\Requests\UserInsertRequest;
use App\Http\Requests\UserUpdateRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
	function index(){ 
		$list = User::where(['trash'=> 0])
		->orderBy('access', 'desc')->get();
		return view('backend.pages.user.index', compact('list'));

	}
	function trash(){
		$list = User::where(['trash'=> 1])
		->orderBy('id', 'desc')->get();
		return view('backend.pages.user.trash', compact('list'));
	}
	
	function status($id){
		$user_id=Auth::user()->name;
		$row = User::find($id);
		if($row==null){
			return redirect()->route("user_index")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		if($row->status == 1){
			$row->status = 0;
		}else{
			$row->status = 1;
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->save();
		return redirect()->route("user_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thành công"]);
	}
	function deltrash($id){
		$user_id=Auth::user()->name;
		$row = User::find($id);
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		if($row==null){
			return redirect()->route("user_index")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		$row->trash = 1;
		$row->save();
		return redirect()->route("user_index")->with("message", ["type"=>"success", "msg"=>"Ném vào thùng rác thành công"]);
	}
	function retrash($id){
		$user_id=Auth::user()->name;
		$row = User::find($id);
		if($row==null){
			return redirect()->route("user_trash")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->trash = 0;
		$row->save();
		return redirect()->route("user_trash")->with("message", ["type"=>"success", "msg"=>"Khôi phục sản phẩm thành công"]);
	}
	function delete($id){
		$row = User::find($id);
		if($row==null){
			return redirect()->route("user_trash")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		$row->delete();
		return redirect()->route("user_trash")->with("message", ["type"=>"success", "msg"=>"Xóa vĩnh viễn sản phẩm thành công!"]);
	}



	function getinsert(){
		//$listcat= User::where(['status'=>1])->orderBy('name', 'desc')->get();
		return view('backend.pages.user.insert');//, compact('listcat')
	}
	function postinsert(UserInsertRequest $request){
		$user_id=Auth::user()->name;
		$row = new User;
		$row->name=$request->name;
		
		$row->email=$request->email;
		$row->password=bcrypt($request->pass);
		$row->phone=$request->phone;
		
		$row->created_at=Carbon::now();
		$row->created_by=$user_id;


		if($file = $request->hasFile('avatar')) {
			$file = $request->file('avatar') ;
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/user/' ;
			$file->move($destinationPath,$fileName);
			$row->image = $fileName ;
			$row->save();

			return redirect()->route("user_index")->with("message", ["type"=>"success", "msg"=>"Thêm user thành công"]);
		}else{
			$row->save();
			return redirect()->route("user_index")->with("message", ["type"=>"danger", "msg"=>"Chưa chọn avatar"]);
		}
		//$row->save();
		/*//return redirect()->route("user_index");*/
		dd($row);

	}
	function getupdate($id){
		$row = User::find($id);
		return view('backend.pages.user.update', compact('row'));
	}
	function postupdate(UserUpdateRequest $request, $id){
		$user_id=Auth::user()->name;
		$row = User::find($id);
		$row->name=$request->name;
		$row->email=$request->email;
		$row->password=bcrypt($request->pass);
		$row->phone=$request->phone;
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;

		if($file = $request->hasFile('avatar')){
			$file = $request->file('avatar') ;
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/user/' ;
			$file->move($destinationPath,$fileName);
			$row->image = $fileName ;
		}
		if(User::where([['name','=',$request->name],['id','<>',$id]])->count()){
			return redirect()->route("user_index")->with("message", ["type"=>"danger", "msg"=>"User đã tồn tại"]);
		}
		$row->save();
		return redirect()->route("user_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thông tin thành công"]);
	}
	

}
