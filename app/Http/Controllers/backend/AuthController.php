<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    function getlogin(){
    	return view('backend.pages.user.login');
    }
    function postlogin(Request $request){
    	$user = $request->user; 
    	$pass = $request->pass;
    	$data1=['name'=>$user, 'password'=>$pass, 'access'=>1];
        $data2=['name'=>$user, 'password'=>$pass, 'access'=>0];
    	if(Auth::attempt($data1)){
    		return redirect()->route('dashboard');
    	}else if(Auth::attempt($data2)){
            return redirect()->route('index');
        }
    	return redirect()->route('login');
    }
     function logout(){
     	if(Auth::check()){
     		Auth::logout();
     	}
     	return redirect('index');

     }
}
