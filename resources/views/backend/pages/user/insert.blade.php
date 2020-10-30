@extends('layouts.layoutadmin')
@section('title', 'Quản lý danh muc')

@section('content')

<div class="container text-right pt-3 pb-5 pl-5">
	<div style="float:left">

	</div>

	<div style="float:right">
		<button class="btn btn-primary btn-sm px-5 py-2"><a href="" class="text-light"><i class="fa fa-upload"></i> Upload</a></button>
		<button class="btn btn-danger btn-sm px-5 py-2"><a href="" class="text-light"><i class="fa fa-recycle"></i> Trash</a></button>
	</div>
</div>

<div class="clearfix"></div>

<form style="width:90%;margin:0 auto" name="frmadd" method="post" action="{{route('user_postinsert')}}" enctype="multipart/form-data">
	@csrf
	<fieldset>
		<legend class="bg- text-primary">Thêm category</legend>
		@includeIf('backend.modules.message')
		<div class="h4">Thông tin tài khoản</div>
		<div class="form-group">
			<label for="formGroupExampleInput">Tài khoản</label>
			<input type="text" class="form-control" placeholder="user name ... " name="name">
			@if($errors ->has('name'))
			<span class="text-danger">{{$errors->first('name')}}</span>
			@endif
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput">Email đăng nhập</label>
			<input type="email" class="form-control" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput">Phone</label>
			<input type="tel" class="form-control" placeholder="Email" name="phone">
		</div>
		
		<div class="form-group">
			<label for="formGroupExampleInput">Mật khẩu</label>
			<input type="password" class="form-control" placeholder="Pass " name="pass">
		</div>
		
		<div class="form-group">
			<label for="formGroupExampleInput">Nhập lại mật khẩu</label>
			<input type="password" class="form-control" placeholder="Pass" name="repass">
		</div>
		



		<div class="h4">Thông tin cá nhân</div>

		<div class="clearfix"></div>
		<div class=" col-7 m-0 p-0">
			<label  for="inlineFormCustomSelect">Hình đại diện</label>
			<input type="file" name="avatar">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput">Ngày sinh nhật</label>
			<input type="date" class="form-control" placeholder="Pass" name="birthday">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput">Địa chỉ</label>
			<input type="text" class="form-control" placeholder="Pass" name="address">
		</div>

		<br>
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</fieldset>
</form>
@endsection

