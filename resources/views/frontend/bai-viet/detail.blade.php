@extends('layouts.layoutsite')
@section('title','Máy ảnh ngon, bổ, rẻ')

@section('content')
<style>


</style>
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="h5 py-1 pl-5 text-light" style="width:250px;background:#335AEC">TIN TỨC</div>
			<p>{{$row->title}}</p>
			<p>	{{$row->created_at}}, bởi {{$row->created_by}}</p>
			<p>{{$row->short_description}}</p>
			<p>
				@php
				echo $row->content;
				@endphp
			</p>
		</div>

		<div class="col-sm-4">
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

		@endsection