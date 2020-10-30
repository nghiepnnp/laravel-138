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
			Đơn hàng đã hủy
		</div>
		<div class="col-3">
			<div class="float-right">
				<button type="button" class="btn btn-primary">
					<a href="{{route('order_index')}}" class="text-white">Index</a>
				</button>
				<button type="button" class="btn btn-danger">
					<a href="{{route('order_trash')}}" class="text-white">Trash</a>
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
			<th style="width:30px" class="text-center">Chi tiết</th>	
			<th style="width:30px" class="text-center">Xóa</th>		
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
				<a href="{{route('order_retrash',['id' => $l->id])}}" class="btn btn-primary btn-sm">
					<i class="fa fa-undo-alt"></i>
				</a>
			</td>
			<td class="text-center">
				<a href="{{route('order_delete',['id' => $l->id])}}" class="btn btn-danger btn-sm">
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


