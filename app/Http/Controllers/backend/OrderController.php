<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


use App\Models\Orders;
use App\Models\OrderDetail;
use App\Models\Product;

class OrderController extends Controller
{

	function index(){ 
		$list = Orders::where(['trash' => 0])
		->orderBy('order_date','asc')->get();
		return view('backend.pages.order.index', compact('list'));
	}

	function trash(){
		$list = Orders::where(['trash' => 1])
		->orderBy('order_date', 'asc')->get();
		return view('backend.pages.order.trash', compact('list'));
	}
	function status($id){
		$row = Orders::find($id);
		if($row==null){
			return redirect()->route("order_index")->with("message", ["type"=>"danger", "msg"=>"Liên hệ tồn tại"]);
		}
		if($row->status == 1){
			$row->status = 0;
		}else{
			$row->status = 1;
		}
		$row->save();
		return redirect()->route("order_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thành công"]);
	}
	function deltrash($id){
		$row = Orders::find($id);
		if($row==null){
			return redirect()->route("order_index")->with("message", ["type"=>"danger", "msg"=>"Liên hệ tồn tại"]);
		}
		$row->trash = 1;
		$row->save();
		return redirect()->route("order_index")
		->with("message", ["type"=>"success", "msg"=>"Ném vào thùng rác thành công"]);
	}
	function retrash($id){
		$row = Orders::find($id);
		if($row==null){
			return redirect()->route("order_trash")->with("message", ["type"=>"danger", "msg"=>"Liên hệ tồn tại"]);
		}
		$row->trash = 0;
		$row->save();
		return redirect()->route("order_trash")->with("message", ["type"=>"success", "msg"=>"Khôi phục sản phẩm thành công"]);
	}
	function delete($id){
		$row = Orders::find($id);
		if($row==null){
			return redirect()->route("order_trash")->with("message", ["type"=>"danger", "msg"=>"Liên hệ tồn tại"]);
		}
		$row->delete();
		return redirect()->route("order_trash")->with("message", ["type"=>"success", "msg"=>"Xóa vĩnh viễn liên hệ thành công!"]);
	}
	function detail($id){
		$row = Orders::find($id);
		return view('backend.pages.order.detail', compact('row'));
	}
}
