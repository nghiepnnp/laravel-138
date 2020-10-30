@extends('layouts.layoutadmin')
@section('title', 'Quản lý chủ đề')

@section('content')
@section('session_header')
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/jquery.dataTables.min.css')}}"/>
<script type="text/javascript" src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>

@endsection
<div class="clearfix py-3">
	<div class="row bg- border ">
		<div class="col-9 h4 text-danger">
			DANH SÁCH CHỦ ĐỀ
		</div>
		<div class="col-3">
			<div class="float-right">
				<button type="button" class="btn btn-danger">
					<a href="{{route('topic_index')}}" class="text-white">Index</a>
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
			<th style="width:50px" class="text-center">Tên chủ đề</th>						
			<th style="width:50px" class="text-center">Ngày tạo</th>						
			<th style="width:50px" class="text-center">Người tạo</th>						
			<th style="width:50px" class="text-center">Ngày sửa</th>						
			<th style="width:50px" class="text-center">Người sửa</th>						
				
			<th style="width:30px" class="text-center">Restore</th>		
			<th style="width:30px" class="text-center">Xóa</th>		
		</tr>
	</thead>
	<tbody>
		@foreach($list as $l)
		<tr>
			<td>{{$l->id}}</td>
			<td>{{$l->name}}</td>

			<td>{{$l->created_at}}</td>
			<td>{{$l->created_by}}</td>
			<td>{{$l->updated_at}}</td>
			<td>{{$l->updated_by}}</td>
			<td class="text-center">
				<a href="{{route('product_retrash',['id' => $l->id])}}" class="btn btn-primary btn-sm">
					<i class="fas fa-undo-alt"></i>
				</a>
			</td>
			<td class="text-center">
				<a href="{{route('topic_delete',['id' => $l->id])}}" class="btn btn-danger btn-sm">
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