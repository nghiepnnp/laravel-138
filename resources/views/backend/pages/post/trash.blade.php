@extends('layouts.layoutadmin')
@section('title', 'Quản lý danh muc')

@section('content')
@section('session_header')
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/jquery.dataTables.min.css')}}"/>
<script type="text/javascript" src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>

@endsection
<div class="clearfix py-3">
	<div class="row bg- border ">
		<div class="col-9 h4 text-danger">
			DANH MỤC SẢN PHẨM
		</div>
		<div class="col-3">
			<div class="float-right">
				<button type="button" class="btn btn-primary">
					<a href="{{route('post_getinsert')}}" class="text-white">Thêm</a>
				</button>
				<button type="button" class="btn btn-danger">
					<a href="{{route('post_trash')}}" class="text-white">Trash</a>
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
			<th style="width:50px" class="text-center">Hình đại diện</th>						
			<th style="width:130px" class="text-center">Tiêu đề</th>
			<th style="width:130px" class="text-center">Mô tả</th>
			<th style="width:130px" class="text-center">Nội dung</th>
			<th style="width:70px" class="text-center">Ngày đăng</th>	
			<th style="width:30px" class="text-center">Người đăng</th>			
			<th style="width:30px" class="text-center">Sửa</th>		
			<th style="width:30px" class="text-center">Xóa</th>		
		</tr>
	</thead>
	<tbody>
		@foreach($list as $l)
		<tr>
			<td>{{$l->id}}</td>
			<td><img src="{{asset('images/tin-tuc/'.$l->image)}}" width="70"></td>
			<td>{{$l->title}}</td>
			<td>{{$l->short_description}}</td>
			<td style="height:200px">
				<div class="overflow-auto">{{$l->content}}</div>
			</td>
			<td>{{$l->created_at}}</td>
			<td>{{$l->created_by}}</td>

			<td class="text-center">
				<a href="{{route('post_retrash',['id' => $l->id])}}" class="btn btn-primary btn-sm">
					<i class="fas fa-undo-alt"></i>
				</a>
			</td>
			<td class="text-center">
				<a href="{{route('post_delete',['id' => $l->id])}}" class="btn btn-danger btn-sm">
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