@extends('layouts.layoutsite')
@section('title',$title)

@section('content')

<div style="width:90%; margin: 0 auto;" class="mt-3">

	<div class="card" style=" height: 900px">
		<div class="row">
			<aside class="col-sm-5 border-right">
				<article class="gallery-wrap"> 
					<div class="img-big-wrap">
						<div> <a href="#"><img src="{{asset('images/'.$row->image)}}" class="img-fluid"></a></div>
					</div> 
					<div class="img-small-wrap">
						<div class="item-gallery"> <img src="{{asset('images/'.$row->image)}}" class="img-fluid"> </div>
						<div class="item-gallery"> <img src="{{asset('images/'.$row->image)}}" class="img-fluid"> </div>
						<div class="item-gallery"> <img src="{{asset('images/'.$row->image)}}" class="img-fluid"> </div>
						<div class="item-gallery"> <img src="{{asset('images/'.$row->image)}}" class="img-fluid"> </div>

					</div> 
				</article>
			</aside>
			<aside class="col-sm-7">
				<article class="card-body p-5">
					<h3 class="title mb-3">{{$row->name}}</h3>
					Giá: 
					<strong class="text-danger">
						{{number_format($row->price)}} đ
					</strong> <br><br>	
					<dl class="item-property">
						<dt>Mô tả</dt>
						<dd><p></p></dd>
					</dl> 
					<dl class="param param-feature">
						<dt>Loại</dt>
						<dd></dd>
					</dl> 
					<dl class="param param-feature">
						<dt>Xuất xứ</dt>
						<dd></dd>
					</dl>

					<hr>
					<div class="row">
						<div class="col-sm-5">
							<b>Số lượng:</b>
							<input type="number" name="quantity" min="1" max="5" class="pl-5" value="1">
						</div>					
						<div class="col-sm-7">
							
						</div>
					</div> 
					<hr>
					<a href="#" class="btn btn-lg btn-primary text-uppercase text-light">Mua ngay </a>
					<a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng </a>
				</article> 
			</aside> 
		</div>
		<h4 class="pl-5 pt-5">Mô tả sản phẩm</h4>
		@php
		echo "$row->detail";
		@endphp
		<div class="clearfix"></div>
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=453204072181431&autoLogAppEvents=1"></script>
		<div class="fb-comments" data-href="{{url($row->slug)}}" data-width="980" data-numposts="5"></div>



		<h4 class="pl-5 pt-5">SẢN PHẨM LIÊN QUAN</h4>

		<div class="container-products mt-3 p- w-100"> 
			<div class="row">
				@foreach($listother as $pr) <div class="col-sm-2 float-left">
					<div class="card pt-3">
						<a href="{{url($pr->slug)}}">
							<div class="img-card px-3">
								<img src="{{asset('images/'.$pr->image)}}"   alt="Apple Iphone Xs Max" class="img-fluid">
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
		</div>
	</div> 
</div>
<div style="margin-bottom:1000px"></div>

@endsection