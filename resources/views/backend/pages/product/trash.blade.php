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
			DANH SÁCH SẢN PHẨM THÙNG RÁC
		</div>
		<div class="col-3">
			<div class="float-right">
				<button type="button" class="btn btn-primary">
					<a href="{{route('product_index')}}" class="text-white">Update</a>
				</button>
				<button type="button" class="btn btn-danger">
					<a href="{{route('product_index')}}" class="text-white">Thoát</a>
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
			<th style="width:50px" class="text-center">Hình ảnh</th>			
			<th style="width:130px" class="text-center">Tên sản phẩm</th>
			<th style="width:120px" class="text-center">Loại sản phẩm</th>
			<th style="width:70px" class="text-center">Ngày đăng</th>		
			<th style="width:30px" class="text-center">Restore</th>		
			<th style="width:30px" class="text-center">Xóa</th>		
		</tr>
	</thead>
	<tbody>
		@foreach($list as $l)
		<tr>
			<td class="text-">{{$l->id}}</td>
			<td class="pl-5" style="width:20px"><img src="{{asset('images/'.$l->image)}}" alt="" width="50"></td> 
			<td class="text-">{{$l->product_name}}</td>
			<td class="text-center">
				{{$l->namecat}}
			</td>
			<td>{{$l->created_at}}</td>
			<td class="text-center">
				<a href="{{route('product_retrash',['id' => $l->id])}}" class="btn btn-primary btn-sm">
					<i class="fas fa-undo-alt"></i>
				</a>
			</td>
			<td class="text-center">
				<a href="{{route('product_delete',['id' => $l->id])}}" class="btn btn-danger btn-sm">
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


