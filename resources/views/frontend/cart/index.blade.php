@extends('layouts.layoutsite')
@section('title','Kinh doanh máy ảnh')
@section('content')

<div class="container-products">
	<div class="h4 text-white bg- mt-3 py-2 pl-5">GIỎ HÀNG CỦA TÔI</div>
	<table class="table">
		<thead>
			<tr class="bg-light">
				<th scope="col">Sản phẩm</th>
				<th scope="col">Hình ảnh</th>
				<th scope="col">Giá</th>
				<th scope="col">Số lượng</th>
				<th scope="col">Thành tiền</th>
				<th scope="col">Xóa</th>
			</tr>
		</thead>
		<tbody>
			@foreach($list as $l)
			<tr>

				<td>{{$l->name}}</td>
				<td><img src="{{asset('images/'.$l->image)}}" alt="{{$l->image}}" width="90"></td>
				<td>{{$l->price}}</td>
				<td>{{$l->quantity}}</td>
				<td>
					@php
					$p = $l->price;
					$q = $l->quantity;
					echo $p*$q;
					@endphp
				</td>
				<td >
					<a href="" class="text-danger"><i class="far fa-trash-alt py-1"></i></a>
				</td>
			</tr>
			@endforeach


		</tbody>
	</table>
</div>
</div>

@endsection