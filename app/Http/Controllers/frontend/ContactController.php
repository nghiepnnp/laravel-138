<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ContactInsertRequest;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;

use App\Models\Contact;

class ContactController extends Controller{
	function index(){
		return view('frontend.lien-he.index');
	}

	function postinsert(ContactInsertRequest $request){
		$row = new Contact;

		$row->name=$request->name;
		$row->diachi=$request->address;
		$row->email=$request->email;
		$row->phone=$request->phone;
		$row->message=html_entity_decode($request->message);

		$row->created_at = Carbon::now();
		$row->save();
		return redirect()->route("contact_index")->with("message", ["type"=>"success", "msg"=>"Thông tin được nhận"]);

	}
}
