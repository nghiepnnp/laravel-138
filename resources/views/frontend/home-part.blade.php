@php
use App\Models\Category;
use App\Models\Product;
use App\Library\MyLib;

$category_all = Category::where(['status'=>1])->get();
$list_catid = MyLib::category_listid($category_all,$catid, [$catid]);
$product_list = Product::where(['status'=>1])->whereIn('product_category',$list_catid)->orderBy('created_at')->take(6)->get();

@endphp

 <div class="row">
   @foreach($product_list as $pr) 
   <div class="col-sm-2 float-left">
     <div class="card pt-3 ">
      <a href="{{url($pr->slug)}}">
        <div class="img-card px-3">
          <img src="{{asset('images/product/'.$pr->image)}}"   alt="Apple Iphone Xs Max" class="img-fluid">
        </div>
        <div class="card-body">
          <p class="card-title font-weight-bold" style="color:#525252">
            {{$pr->name}}
          </p>
          <strong class="text-danger">
            {{number_format($pr->price)}} đ
          </strong>
          <p class="card-text " style="color:#22BF38"></p>
        </div>
      </a>
    </div>  
  </div>   
  @endforeach
</div>
