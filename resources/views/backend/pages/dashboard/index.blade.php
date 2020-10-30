
@extends('layouts.layoutadmin')
@section('title', 'Quản lý trang Web')

@section('content')

<div class="clearfix py-3">
	<div class="row bg- border ">
		<div class="col-9 h4 text-danger">
			WELCOME !!!
		</div>
		<div class="col-3">
			<div class="float-right">
				<button type="button" class="btn btn-primary">
					<a href="{{route('logout')}}" class="text-white">Đăng xuất</a>
				</button>
			</div>
		</div>
	</div>
</div>
@endsection