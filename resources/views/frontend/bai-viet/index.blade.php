@extends('layouts.layoutsite')
@section('title','Máy ảnh ngon, bổ, rẻ')

@section('content')
<div style="background-color:#F6F5F5">
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="h5 py-1 pl-5 text-light" style="width:250px;background:#335AEC">TIN TỨC</div>
			@foreach($list as $l)
			<div class="row">
				<div class="col-sm-3">
					<a href="{{url('tin-tuc/'.$l->slug)}}">
						<img src="{{asset('images/tin-tuc/'.$l->image)}}" height="100">
					</a>
				</div>
				<div class="col-sm-9">
					<a href="{{url('tin-tuc/'.$l->slug)}}">
						<strong>
							@php
							echo "$l->title";
							@endphp
						</strong>
					</a>
					<p>
						@php
						echo "$l->short_description";
						@endphp
					</p>
				</div>
			</div><hr>
			@endforeach
			<div  style="width:10%;margin: 0 auto" class="mt-3">
				{{ $list->links() }}
			</div>
		</div>


		<div class="col-sm-4 flex-column">
			<div class="h5 py-1 pl-5 text-light" style="width:150px;background:#DB3E3E">NỔI BẬT</div>
			@foreach($list as $l)
			<div class="row">
				<div class="col-sm-4"><a href="{{url('tin-tuc/'.$l->slug)}}">
					<img src="{{asset('images/tin-tuc/'.$l->image)}}" width="100"></div>
				</a>
				<div class="col-sm-8">
					<a href="{{url('tin-tuc/'.$l->slug)}}">
						<strong>
							@php
							echo "$l->title";
							@endphp
						</strong>
					</a>

				</div>
			</div><hr>
			@endforeach
		</div>
	</div>
</div>
</div>
@endsection