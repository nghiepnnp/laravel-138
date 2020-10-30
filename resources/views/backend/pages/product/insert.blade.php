<!-- <script>function check_form()
{ var frm = window.document.add;if(frm.name.value==''){ alert('Vui lòng nhập tên sản phẩm!'); return false; }else if(frm.brand.value == 0){alert('Vui lòng chọn  Brand ID!'); return false; }else if(frm.category.value == 0){ 	alert('Vui lòng chọn Category ID !');  return false; }}</script> -->

@extends('layouts.layoutadmin')
@section('title', 'Thêm sản phẩm mới')

@section('content')

<div class="container text-right pt-3 pb-5 pl-5">
	<div style="float:left">	

	</div>

	<div style="float:right">
		<button class="btn btn-primary btn-sm px-5 py-2"><a href="{{route('product_getinsert')}}" class="text-light"><i class="fa fa-upload"></i> Add</a></button>
		<button class="btn btn-danger btn-sm px-5 py-2"><a href="{{route('product_trash')}}" class="text-light"><i class="fa fa-recycle"></i> Trash()</a></button>
	</div>
</div>

<div class="clearfix"></div>

<form style="width:90%;margin:0 auto" method="post" action="{{route('product_postinsert')}}" 
enctype="multipart/form-data" name="add" ><!-- onsubmit="return check_form()" -->
@csrf

<fieldset>
	<legend class="bg- text-primary">Thêm sản phẩm mới</legend>
	@includeIf('backend.modules.message')
	<div class="row">
		<div class="col-8">
			<div class="form-group">
				<label for="formGroupExampleInput">Tên sản phẩm</label>
				<input type="text" class="form-control w-100" id="formGroupExampleInput" placeholder="Product name ... " name="name"  value="{{old('name')}}">
				@if($errors ->has('name'))
				<span class="text-danger">{{$errors->first('name')}}</span>
				@endif
			</div>
			<div class="mb-2">
				<label  for="inlineFormCustomSelect">Chi tiết</label>
				<textarea name="content" id="editor" placeholder="This is some sample content."  value="{{old('content')}}"></textarea>
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Mô tả (SEO)</label>
				<input type="text" class="form-control w-100" id="formGroupExampleInput" placeholder="Mô tả ... " name="mota"   value="{{old('mota')}}" >
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Từ khóa (SEO)</label>
				<input type="text" class="form-control w-100" id="formGroupExampleInput" placeholder="Từ khóa SEO ... " name="tukhoa"  value="{{old('tukhoa')}}">
			</div>

		</div> <!-- End-col-7 -->
		<div class="col-4">
			<!-- Category Products -->
			<div class="">
				<label  for="inlineFormCustomSelect">Chọn loại sản phẩm</label>
				<select class="custom-select" id="inlineFormCustomSelect" name="category">
					<option value="">Chọn...</option>
					@foreach($listcat as $c)
						<option value="{{$c->id}}">{{$c->name}}</option>
					@endforeach
				</select>
				@if($errors ->has('category'))
				<span class="text-danger">{{$errors->first('category')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Số lượng</label>
				<input type="number" class="form-control w-100" id="formGroupExampleInput" name="quantity"  min="1" value="{{old('mota',1)}}">
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Giá sản phẩm</label>
				<input type="number" class="form-control w-100" id="formGroupExampleInput"  value="{{old('price', 10000)}}" name="price"  min="0">
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Giá khuyến mại</label>
				<input type="number" class="form-control w-100" id="formGroupExampleInput" value="{{old('sale_price', 10000)}}" name="sale_price"  min="0">
			</div>
			<div class="">
				<label  for="inlineFormCustomSelect">Trạng thái</label>
				<select class="custom-select " id="inlineFormCustomSelect" name="status">
					<option value="1">Hiện</option>
					<option value="0">Không hiện</option>
				</select>
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Hình ảnh</label>
				<input type="file" class="form-control w-100" id="formGroupExampleInput" name="image"  style="height:45px">
			</div>

		</div> <!-- End-col-5 -->
	</div>
	<br>

	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</fieldset>
</form>

<script>
	ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.then( editor => {
		console.log( editor );
	} )
	.catch( error => {
		console.error( error );
	} );
</script>
@endsection