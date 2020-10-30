<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    function index()
    {
    	$title='Sản phẩm';
    	$list = Product::where(['status'=>1])->orderBy('created_at','desc')->paginate(10);
    	return view('frontend.product', compact('list','title'));


    }

    function category($slug)
    {
    	$rowcat=Category::where(['status'=>1, 'slug'=>$slug])->first();
    	$listcat1=Category::where(['status'=>1,'parent'=>$rowcat->id])->get();
    	$acat=array();
    	$acat[]=$rowcat->id;
    	if(count($listcat1))
    	{
    		foreach($listcat1 as $cat1)
    		{
    			$acat[]=$cat1->id;
    			$listcat2=	Category::where(['status'=>1,'parent'=>$cat1->id])->get();
    			if(count($listcat2))
    			{
    				foreach($listcat2 as $cat2)
    				{
    					$acat[]=$cat2->id;
    				}
    			}
    		}
    	}
    	$list=Product::where(['status'=>1,'product_category'=>$rowcat->id])
    	->whereIn('product_category',$acat)
    	->orderBy('created_at','desc')->paginate(10);
    	$title=$rowcat->name;
    	return view('frontend.product-category', compact('list', 'title'));


    }

    function detail($slug)
    {
    	$row=Product::where(['status'=>1, 'slug'=>$slug])->first();
    	$title=$row->name;

        $listcat1=Category::where(['status'=>1,'parent'=>$row->product_category])->get();
        $acat=array();
        $acat[]=$row->product_category;
        if(count($listcat1))
        {
            foreach($listcat1 as $cat1)
            {
                $acat[]=$cat1->id; 
                $listcat2=  Category::where(['status'=>1,'parent'=>$cat1->id])->get();
                if(count($listcat2))
                {
                    foreach($listcat2 as $cat2)
                    {
                        $acat[]=$cat2->id;
                    }
                }
            }
        }

        $listother=Product::where([['status','=','1'],['id','<>',$row->id]])
        ->whereIn('product_category',$acat)
        ->orderBy('created_at','desc')->take(6)->get();

    	return view('frontend.product-detail', compact('row', 'title','listother'));
    }
}



#{{url('')}}s