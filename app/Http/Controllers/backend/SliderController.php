<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use App\Http\Requests\SliderInsertRequest;
use App\Http\Requests\SliderUpdateRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
	function index(){ 
		$list = Slider::where(['trash'=>0])->orderBy('id', 'asc')->get();
		return view('backend.pages.slider.index', compact('list'));
	}
	function trash(){
		$list = Slider::where(['trash'=>1])->orderBy('id', 'asc')->get();
		return view('backend.pages.slider.trash', compact('list'));
	}
	function getinsert(){
		return view('backend.pages.slider.insert');
	}
	function postinsert(SliderInsertRequest $request){
		$user_id=Auth::user()->name;
		$row = new Slider;
		$row->loai = $request->slide;
		$row->created_at=Carbon::now();
		$row->created_by=$user_id;
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		
		if($file = $request->hasFile('image')){
			$file = $request->file('image') ;
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/slider/' ;
			$file->move($destinationPath,$fileName);
			$row->name_image = $fileName;

			if(Slider::where([['name_image','=',$fileName]])->count()){
				return redirect()->route("slider_index")
				->with("message", ["type"=>"danger", "msg"=>"Tên đã tồn tại"]);
			}
			$row->save();
			return redirect()->route("slider_index")
			->with("message", ["type"=>"success", "msg"=>"Thêm sản phẩm thành công"]);
		}else{
			return redirect()->route("slider_index")
			->with("message", ["type"=>"danger", "msg"=>"Chưa chọn hình sản phẩm"]);
		}

	}
	function getupdate($id){
		$row = Slider::find($id);
		//$row = Slider::where(['trash'=>0])->orderBy('id', 'asc')->get();
		return view('backend.pages.slider.update', compact('row'));
	}
	function postupdate(SliderUpdateRequest $request, $id){
		$user_id=Auth::user()->name;
		$row = Slider::find($id);
		$row->loai = $request->slide;
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;

		if($file = $request->hasFile('image')){
			$file = $request->file('image') ;
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/slider/' ;
			$file->move($destinationPath,$fileName);
			$row->name_image = $fileName ;
		}
		if(Slider::where([['name_image','=', $fileName]])->count()){
			return redirect()->route("slider_index")->with("message", ["type"=>"danger", "msg"=>"Tên đã tồn tại"]);
		}
		$row->save();
		return redirect()->route("slider_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thành công"]);
	}
	function status($id){
		$user_id=Auth::user()->name;
		$row = Slider::find($id);
		if($row==null){
			return redirect()->route("slider_index")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		if($row->status == 1){
			$row->status = 0;
		}else{
			$row->status = 1;
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->save();
		return redirect()->route("slider_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thành công"]);
	}
	function deltrash($id){
		$user_id=Auth::user()->name;
		$row = Slider::find($id);
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		if($row==null){
			return redirect()->route("slider_index")->with("message", ["type"=>"danger", "msg"=>"Không tòn tại"]);
		}
		$row->trash = 1;
		$row->save();
		return redirect()->route("slider_index")->with("message", ["type"=>"success", "msg"=>"Ném vào thùng rác thành công"]);
	}
	function retrash($id){
		$user_id=Auth::user()->name;
		$row = Slider::find($id);
		if($row==null){
			return redirect()->route("slider_trash")->with("message", ["type"=>"danger", "msg"=>"Không tòn tại"]);
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->trash = 0;
		$row->save();
		return redirect()->route("slider_trash")->with("message", ["type"=>"success", "msg"=>"Khôi phục thành công"]);
	}
	function delete($id){
		$row = Slider::find($id);
		if($row==null){
			return redirect()->route("slider_trash")->with("message", ["type"=>"danger", "msg"=>"Không tòn tại"]);
		}
		$row->delete();
		return redirect()->route("slider_trash")->with("message", ["type"=>"success", "msg"=>"Xóa vĩnh viễn thành công!"]);
	}
}
