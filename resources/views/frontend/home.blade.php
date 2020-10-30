@extends('layouts.layoutsite')
@section('title','Kinh doanh máy ảnh')
@section('content')
<div class="container-main-menu">
  <div class="row">
    <div class="col-2">
      @include('frontend.main-menu-left')
    </div>
    <div class="col-7 "> 
      @include('frontend.slide-show')
    </div>
    <div class="col-2">
      <div class="row">
        @foreach($s_l as $s)

        <div class="col-6">
          <a href=""><img src="{{asset('images/slider/'.$s->name_image)}}" width="280px" height="145"></a>
        </div>
        <div class="w-100 pb-3"></div>
        @endforeach

      </div>
    </div>
  </div>
</div>

<div class="pt-3" style="width:90%;margin:auto">
  <img src="{{asset('images/slider/'.$s_b->name_image)}}" class="img-fluid" width="1400">
</div>
<div class="container-products bg-light">
  @include('frontend.new-product')
</div></div>
<div class="bg-light" style="width:90%; margin: 10px auto">
  @include('frontend.banner-product')
</div>
</div>
<div class="container-products bg-light">
  @include('frontend.sale-product')
</div>


</div>






@if(count($list_category))

@foreach($list_category as $c)

<div class="container-products">
 <div class="h4 text-white bg-dark mt-3 py-2 pl-5">{{$c->name}}</div>
 @includeIf('frontend.home-part', ['catid'=>$c->id])
</div>

@endforeach

@endif




<!-- Tất cả sản phẩm -->
@include('frontend.all-product')



@endsection