@extends('layouts.layoutadmin')
@section('title', 'Quản lý bán gà')

@section('content')
@section('session_header')
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/jquery.dataTables.min.css')}}"/>
<script type="text/javascript" src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>

@endsection
<div class="clearfix py-3">
	<div class="row bg- border ">
		<div class="col-9 h4 text-danger">
			DANH SÁCH SẢN PHẨM
		</div>
		<div class="col-3">
			<div class="float-right">
				<button type="button" class="btn btn-primary">
					<a href="{{route('user_getinsert')}}" class="text-white">Thêm</a>
				</button>
				<button type="button" class="btn btn-danger">
					<a href="{{route('user_trash')}}" class="text-white">Trash</a>
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
			<th  class="text-center">Hình đại diện</th>			
			<th style="width:100px" class="text-center">Họ tên</th>
			<th style="width:120px" class="text-center">Email</th>
			<th style="width:70px" class="text-center">Số điện thoại</th>	
			<th style="width:70px" class="text-center">Địa chỉ</th>	
			<th style="width:30px" class="text-center">Status</th>		
			<th style="width:30px" class="text-center">Sửa</th>		
			<th style="width:30px" class="text-center">Xóa</th>		
		</tr>
	</thead>
	<tbody>
		@foreach($list as $l)
		<tr>
			<td class="text-">{{$l->id}}</td>
			<td class="" style="width:50px"><img src="{{asset('images/user/'.$l->image)}}" alt="" width="100"></td> 
			<td class="text-center">{{$l->name}}</td>
			<td class="text-center"> {{$l->email}} </td>
			<td>{{$l->phone}}</td>
			<td>{{$l->address}}</td>
			<td class="text-center">
				@if ($l->status==1)
				<a href="{{route('user_status',['id' => $l->id])}}" class="btn">
					<img src="{{asset('images/check.png')}}" alt="" width="20">
				</a>
				@else
				<a href="{{route('user_status',['id' => $l->id])}}" class="btn">
					<img src="{{asset('images/cancel.jpg')}}" alt="" width="20">
				</a>
				@endif
			</td>
			<td class="text-center">
				<a href="{{route('user_getupdate',['id' => $l->id])}}" class="btn btn-primary btn-sm">
					<i class="fa fa-pen py-1"></i>
				</a>
			</td>
			<td class="text-center">
				<a href="{{route('user_deltrash',['id' => $l->id])}}" class="btn btn-danger btn-sm">
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


