<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Slider;

use App\Models\SinglePage;

use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $sale = Product::where(['status'=>1,'sale'=>1,'trash'=>0])->orderBy('id','asc')->take(6)->get();
        $new = Product::where(['status'=>1,'trash'=>0])->orderBy('created_at','desc')->take(6)->get();
        
        $list_category = Category::where(['status'=>1,'trash'=>0, 'parent'=>0])->skip(1)->take(2)->get();
        $all_product = Product::where(['status'=>1])->paginate(12);
        $s_b=Slider::where(['loai'=>'bn-b','status'=>1])->orderBy('created_at')->take(1)->first();
        $s_l=Slider::where(['loai'=>'bn-l','status'=>1])->orderBy('created_at')->take(2)->get();
        $b_p=Slider::where(['loai'=>'bn-pr','status'=>1])->orderBy('created_at')->take(3)->get();

        return view('frontend.home', compact('list_category','sale','all_product','s_b','s_l','b_p','new'));
    }
    public function gioi_thieu(){
    	$gt=SinglePage::where(['loai'=>'gioithieu'])->orderBy('created_at')->take(1)->first();
    	return view('frontend.gioi-thieu', compact('gt'));
    }
    public function bao_hanh(){
        $gt=SinglePage::where(['loai'=>'doitra'])->orderBy('created_at')->take(1)->first();
        return view('frontend.doi-tra-bao-hanh', compact('gt'));
    } 
}
