@extends('layouts.layoutadmin')
@section('title', 'Thêm mới Slider')

@section('content')

<div class="container text-right pt-3 pb-5 pl-5">
	<div style="float:left">	

	</div>

	<div style="float:right">
		<button class="btn btn-primary btn-sm px-5 py-2"><a href="{{route('product_index')}}" class="text-light"><i class="fa fa-upload"></i> Index</a></button>
		<button class="btn btn-danger btn-sm px-5 py-2"><a href="{{route('product_trash')}}" class="text-light"><i class="fa fa-recycle"></i> Trash()</a></button>
	</div>
</div>

<div class="clearfix"></div>

<form style="width:90%;margin:0 auto" method="post" action="{{route('slider_postupdate', ['id'=>$row->id])}}" 
	enctype="multipart/form-data" name="add" ><!-- onsubmit="return check_form()" -->
	@csrf

	<fieldset>
		<legend class="bg- text-primary">Edit Slider</legend>
		@includeIf('backend.modules.message')

		<div class="form-group">
			<label  for="inlineFormCustomSelect">Loại</label>
			<select class="custom-select " id="inlineFormCustomSelect" name="slide">
				<option value="slideshow">Slideshow</option>
				<option value="bn-l">Banner RS</option>
				<option value="bn-b">Banner BS</option>
				<option value="bn-pr">Banner Product</option>
			</select>
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput">Image</label><br>
			<img src="{{asset('images/slider/'.$row->name_image)}}">
			<input type="file" class="form-control w-100" id="formGroupExampleInput" name="image"  style="height:45px">
		</div>
	<br>
	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</fieldset>
</form>

<script>
	ClassicEditor
	.create( document.querySelector( '#editor' ))
	.then( editor => {
		console.log( editor );
	} )
	.catch( error => {
		console.error( error );
	} );
</script>
@endsection