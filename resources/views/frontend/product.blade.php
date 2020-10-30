@php
use App\Models\Category;
use App\Models\Product;
$list_category = Category::where(['status'=>1,'parent'=>0])->get();
@endphp

@extends('layouts.layoutsite')
@section('title',$title)

@section('content')



  <!-- Main-menu -->
  <div class="container-main-menu">
    <div class="row">
      <div class="col-2">

        @include('frontend.main-menu-left')

      </div> <!-- e-col-c -->
      <div class="col-7 "> 
  
        <!-- slide-show -->
        @include('frontend.slide-show')

      </div>
      <div class="col-2">
        <div class="row">
          <div class="col-6">
            <a href="#"><img src="{{asset('images/banner-right-1.png')}}" width="230" height="130"></a>
          </div>
          <div class="w-100"></div>
          <div class="col-6 mt-3">
            <a href="#"><img src= "{{asset('images/banner-right-2.png')}}" width="230px" height="130"></a>
          </div>
        </div>
      </div>
    </div><!-- end-row -->
  </div> <!-- end-container -->

  <div class="pt-3" style="width:90%;margin:auto">
    <img src="images/banner-bot.jpg" class="img-fluid" width="1400">
  </div>





<div class="" style="width:90%; margin: 0 auto">
  <div class="row">

    <div class="col-2 mt-3">
      <ul class="list-group">
        <li class="list-group-item active">Category</li>
        @foreach($list_category as $cat)
        <a href="{{url('san-pham/'.$cat->slug)}}">
          <li class="list-group-item">{{$cat->name}} </li>
        </a>
        @endforeach
      </ul>
    </div>

    <div class="col-10 m-0">
      <div class="container-products mt-3 p- w-100"> 
        <div class="h4 text-white bg-danger pl-5 py-2 m-0">TẤT CẢ CÁC SẢN PHẨM</div>
        <ul class="p-0">
          @foreach ($list as $ro)
          <li>  
            <div class="card pt-3" id="xahangton" >
              <a href="{{url($ro->slug)}}">
                <div class="img-card px-3">
                  <img src="{{asset('/images/'.$ro->image)}}"   alt="$ro->image" class="img-fluid" style="margin: 0 auto;">
                </div>
                <div class="card-body  " >
                  <p class="card-title font-weight-bold" style="color:#525252">{{$ro->product_name}}</p>
                  <strong class="text-danger">
                   {{$ro->price}} đ
                 </strong>
                 <!--  <p class="card-text " style="color:#22BF38">{{$ro->promotion}}</p> -->
               </div>
             </a>
           </div> 
         </li>
         @endforeach
       </ul>
     </div>
   </div>


 </div><!-- end-row  -->
</div>


<div class="clearfix"></div>
<div  style="width:10%;margin: 0 auto" class="mt-3">
 {{ $list->links() }}

</div>
</div>

@endsection
