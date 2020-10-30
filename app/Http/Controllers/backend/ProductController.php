<?php

namespace App\Http\Controllers\backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductInsertRequest;
use App\Http\Requests\ProductUpdateRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;



class ProductController extends Controller
{
	function index(){ 
		$list = Product::where('products.trash','<>','1')
		->join("category","products.product_category", "=", "category.id")
		->select("products.*", "category.name as namecat")
		->orderBy('products.created_at', 'desc')->get();
		return view('backend.pages.product.index', compact('list'));

	}
	function trash(){
		$list = Product::where('products.trash','=','1')
		->join("category","products.product_category", "=", "category.id")
		->select("products.*", "category.name as namecat")
		->orderBy('products.created_at', 'desc')->get();
		return view('backend.pages.product.trash', compact('list'));
	}
	function getinsert(){
		$listcat= Category::where(['status'=>1])->orderBy('parent', 'asc')->get();
		return view('backend.pages.product.insert', compact('listcat'));
	}
	function postinsert(ProductInsertRequest $request){
		$user_id=Auth::user()->name;
		$row = new Product;
		$row->name=$request->name;
		$row->slug=Str::slug($request->name,'-');//link sp

		$row->detail=html_entity_decode($request->content);
		$row->metadesc=html_entity_decode($request->mota);
		$row->metakey=html_entity_decode($request->tukhoa);

		$row->product_category=$request->category;
		$row->quantity=$request->quantity;
		$row->price=$request->price;
		$row->sale_price=$request->sale_price;
		$row->status=$request->status;
		$row->created_at=Carbon::now();
		$row->created_by=$user_id;
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;

		if($file = $request->hasFile('image')) {
			$file = $request->file('image') ;
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/product/' ;
			$file->move($destinationPath,$fileName);
			$row->image = $fileName ;
			$row->save();

			return redirect()->route("product_index")->with("message", ["type"=>"success", "msg"=>"Thêm sản phẩm thành công"]);
		}else{
			return redirect()->route("product_index")->with("message", ["type"=>"danger", "msg"=>"Chưa chọn hình sản phẩm"]);
		}

	}
	function getupdate($id){
		$row = Product::find($id);
		$listcat= Category::where(['status'=>1])->orderBy('name', 'desc')->get();
		return view('backend.pages.product.update', compact('listcat', 'row'));
	}
	function postupdate(ProductUpdateRequest $request, $id){
		$user_id=Auth::user()->name;
		$row = Product::find($id);
		$row->name=$request->name;
		$row->slug=Str::slug($request->name,'-');//link sp

		$row->detail=html_entity_decode($request->content);
		$row->metadesc=html_entity_decode($request->mota);
		$row->metakey=html_entity_decode($request->tukhoa);

		$row->product_category=$request->category;
		$row->quantity=$request->quantity;
		$row->price=$request->price;
		$row->sale=$request->sale;
		$row->sale_price=$request->sale_price;
		$row->status=$request->status;
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;

		if($file = $request->hasFile('image')){
			$file = $request->file('image') ;
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/product/' ;
			$file->move($destinationPath,$fileName);
			$row->image = $fileName ;
		}
		if(Product::where([['name','=',$request->name],['id','<>',$id]])->count()){
			return redirect()->route("product_index")->with("message", ["type"=>"danger", "msg"=>"Tên sản phẩm đã tồn tại"]);
		}
		$row->save();
		return redirect()->route("product_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật sản phẩm thành công"]);
	}
	function status($id){
		$user_id=Auth::user()->name;
		$row = Product::find($id);
		if($row==null){
			return redirect()->route("product_index")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		if($row->status == 1){
			$row->status = 0;
		}else{
			$row->status = 1;
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->save();
		return redirect()->route("product_index")->with("message", ["type"=>"success", "msg"=>"Cập nhật thành công"]);
	}
	function deltrash($id){
		$user_id=Auth::user()->name;
		$row = Product::find($id);
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		if($row==null){
			return redirect()->route("product_index")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		$row->trash = 1;
		$row->save();
		return redirect()->route("product_index")->with("message", ["type"=>"success", "msg"=>"Ném vào thùng rác thành công"]);
	}
	function retrash($id){
		$user_id=Auth::user()->name;
		$row = Product::find($id);
		if($row==null){
			return redirect()->route("product_trash")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		$row->updated_at=Carbon::now();
		$row->updated_by=$user_id;
		$row->trash = 0;
		$row->save();
		return redirect()->route("product_trash")->with("message", ["type"=>"success", "msg"=>"Khôi phục sản phẩm thành công"]);
	}
	function delete($id){
		$row = Product::find($id);
		if($row==null){
			return redirect()->route("product_trash")->with("message", ["type"=>"danger", "msg"=>"Sản phẩm không tòn tại"]);
		}
		$row->delete();
		return redirect()->route("product_trash")->with("message", ["type"=>"success", "msg"=>"Xóa vĩnh viễn sản phẩm thành công!"]);
	}

}
