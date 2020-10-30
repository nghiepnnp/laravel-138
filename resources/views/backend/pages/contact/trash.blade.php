@extends('layouts.layoutadmin')
@section('title', 'Quản lý liên hệ')

@section('content')
@section('session_header')
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/jquery.dataTables.min.css')}}"/>
<script type="text/javascript" src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>

@endsection
<div class="clearfix py-3">
	<div class="row bg- border ">
		<div class="col-9 h4 text-danger">
			DANH SÁCH LIÊN HỆ
		</div>
		<div class="col-3">
			<div class="float-right">
				<button type="button" class="btn btn-danger">
					<a href="{{route('contact_index')}}" class="text-white">Index</a>
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
			<th style="width:50px" class="text-center">Họ tên</th>						
			<th style="width:50px" class="text-center">Địa chỉ</th>						
			<th style="width:130px" class="text-center">Số điện thoại</th>
			<th style="width:130px" class="text-center">Email</th>
			<th style="width:130px" class="text-center">Nội dung</th>
			<th style="width:70px" class="text-center">Ngày gửi</th>		
			<th style="width:30px" class="text-center">Restore</th>		
			<th style="width:30px" class="text-center">Xóa</th>		
		</tr>
	</thead>
	<tbody>
		@foreach($list as $l)
		<tr>
			<td>{{$l->id}}</td>
			<td>{{$l->name}}</td>
			<td>{{$l->diachi}}</td>
			<td>{{$l->phone}}</td>
			<td>{{$l->email}}</td>
			<td>{{$l->message}}</td>
			<td>{{$l->created_at}}</td>
				<td class="text-center">
				<a href="{{route('contact_retrash',['id' => $l->id])}}" class="btn btn-primary btn-sm">
					<i class="fas fa-undo-alt"></i>
				</a>
			</td>
			<td class="text-center">
				<a href="{{route('contact_deltrash',['id' => $l->id])}}" class="btn btn-danger btn-sm">
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