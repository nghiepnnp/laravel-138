<?php
namespace App\Http\Controllers\backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ContactInsertRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;

use App\Models\Contact;

class ContactController extends Controller
{
	function index(){ 
		$list = Contact::where(['trash' => 0])
		->orderBy('id','desc')->get();
		return view('backend.pages.contact.index', compact('list'));
	}

	function trash(){
		$list = Contact::where(['trash' => 1])
		->orderBy('id', 'desc')->get();
		return view('backend.pages.contact.trash', compact('list'));
	}
	function status($id){
		$row = Contact::find($id);
		if($row==null){
			return redirect()->route("contact_index")->with("message", ["type"=>"danger", "msg"=>"Liên hệ tồn tại"]);
		}
		if($row->status == 1){
			$row->status = 0;
		}else{
			$row->status = 1;
		}
		$row->updated_at=Carbon::now();

		$row->save();
		return redirect()->route("contact_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thành công"]);
	}
	function deltrash($id){
		$user_id=Auth::user()->name;
		$row = Contact::find($id);
		$row->updated_at=Carbon::now();
		if($row==null){
			return redirect()->route("contact_index")->with("message", ["type"=>"danger", "msg"=>"Liên hệ tồn tại"]);
		}
		$row->trash = 1;
		$row->save();
		return redirect()->route("contact_index")->with("message", ["type"=>"success", "msg"=>"Ném vào thùng rác thành công"]);
	}
	function retrash($id){
		$row = Contact::find($id);
		if($row==null){
			return redirect()->route("contact_trash")->with("message", ["type"=>"danger", "msg"=>"Liên hệ tồn tại"]);
		}
		$row->updated_at=Carbon::now();

		$row->trash = 0;
		$row->save();
		return redirect()->route("contact_trash")->with("message", ["type"=>"success", "msg"=>"Khôi phục sản phẩm thành công"]);
	}
	function delete($id){
		$row = Contact::find($id);
		if($row==null){
			return redirect()->route("contact_trash")->with("message", ["type"=>"danger", "msg"=>"Liên hệ tồn tại"]);
		}
		$row->delete();
		return redirect()->route("contact_trash")->with("message", ["type"=>"success", "msg"=>"Xóa vĩnh viễn liên hệ thành công!"]);
	}

}

