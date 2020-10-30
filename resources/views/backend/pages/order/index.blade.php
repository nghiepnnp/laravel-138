@extends('layouts.layoutadmin')
@section('title', 'Quản lý đơn hàng')

@section('content')
@section('session_header')
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/jquery.dataTables.min.css')}}"/>
<script type="text/javascript" src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>

@endsection
<div class="clearfix py-3">
	<div class="row bg- border ">
		<div class="col-9 h4 text-danger">
			List Orders
		</div>
		<div class="col-3">
			<div class="float-right">
				<button type="button" class="btn btn-primary">
					<a href="{{route('order_index')}}" class="text-white">Index</a>
				</button>
				<button type="button" class="btn btn-danger">
					<a href="{{route('order_trash')}}" class="text-white">Đơn hủy</a>
				</button>
			</div>
		</div>
	</div>
	
</div>
<div class="clearfix"></div>
@includeIf('backend.modules.message')
<table id="example" class="display table" width="100%" data-page-length="10">
	<thead>
		<tr>
			<th style="width:50px" class="text-center">ID</th>						
			<th style="width:50px" class="text-center">ID_Pr</th>						
			<th style="width:130px" class="text-center">Ngày Order</th>
			<th style="width:130px" class="text-center">Tên KH</th>
			<th style="width:70px" class="text-center">Địa chỉ</th>	
			<th style="width:70px" class="text-center">Số ĐT</th>	
			<th style="width:30px" class="text-center">Email</th>		
			<th style="width:30px" class="text-center">Trạng thái</th>	
			<th style="width:30px" class="text-center">Chi tiết</th>	
			<th style="width:30px" class="text-center">Hủy đơn</th>		
		</tr>
	</thead>
	<tbody>
		@foreach($list as $l)
		<tr>
			<td class="text-">{{$l->id}}</td>
			<td class="text-">{{$l->customer_id}}</td>
			<td class="text-">{{$l->order_date}}</td>
			<td class="text-center">{{$l->fullname}}</td>
			<td>{{$l->address}}</td>
			<td>{{$l->phone}}</td>
			<td>{{$l->email}}</td>
			<td class="text-center">
				@if ($l->status==1)
				<a href="{{route('order_status',['id' => $l->id])}}" class="btn">
					<img src="{{asset('images/check.png')}}" alt="" width="20">
				</a>
				@else
				<a href="{{route('order_status',['id' => $l->id])}}" class="btn">
					<img src="{{asset('images/cancel.jpg')}}" alt="" width="20">
				</a>
				@endif
			</td>
			<td class="text-center">
				<a href="{{route('order_detail',['id' => $l->id])}}" class="btn btn-primary btn-sm">
					<i class="fab fa-angellist"></i>
				</a>
			</td>
			<td class="text-center">
				<a href="{{route('order_deltrash',['id' => $l->id])}}" class="btn btn-danger btn-sm">
					<i class="far fa-trash-alt py-1"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>    
@endsection
@section('session_footer')
<script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
@endsection


