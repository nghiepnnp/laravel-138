@extends('layouts.layoutadmin')
@section('title', 'Quản lý danh muc')

@section('content')

<div class="container text-right pt-3 pb-5 pl-5">
	<div style="float:left">

	</div>

	<div style="float:right">
		<button class="btn btn-primary btn-sm px-5 py-2"><a href="{{route('menu_index')}}" class="text-light"><i class="fa fa-upload"></i> Index</a></button>
		<button class="btn btn-danger btn-sm px-5 py-2"><a href="{{route('menu_trash')}}" class="text-light"><i class="fa fa-recycle"></i> Trash</a></button>
	</div>
</div>

<div class="clearfix"></div>

<form style="width:90%;margin:0 auto" name="frmadd" method="post" action="{{route('category_postinsert')}}">
@csrf
	<fieldset>
		<legend class="bg- text-primary">Thêm category</legend>
		@includeIf('backend.modules.message')
		<div class="form-group">
			<label for="formGroupExampleInput">Category name</label>
			<input type="text" class="form-control" placeholder="Product name ... " name="name">
		</div>
		<div class="clearfix"></div>
		<div class=" col-7 m-0 p-0">
			<label  for="inlineFormCustomSelect">Parent ID</label>
			<select class="custom-select " id="inlineFormCustomSelect" name="parent">
				<option value="0">Chọn...</option>
				@foreach($row as  $l)
				<option value="{{$l->id}}">{{$l->name}}</option>
				@endforeach
			</select>
		</div>

		<div class=" col-7 m-0 p-0">
			<label  for="inlineFormCustomSelect">Status</label>
			<select class="custom-select " id="inlineFormCustomSelect" name="status">
				<option value="1">1</option>
				<option value="0">0</option>
			</select>
		</div>
<br>
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</fieldset>
</form>
@endsection

