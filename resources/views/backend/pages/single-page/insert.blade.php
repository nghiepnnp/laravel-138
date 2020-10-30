insert.blade.phpa @extends('layouts.layoutadmin')
@section('title', 'Quản lý Pags')

@section('content')

<div class="container text-right pt-3 pb-5 pl-5">
	<div style="float:left">	

	</div>

	<div style="float:right">
		<button class="btn btn-primary btn-sm px-5 py-2"><a href="{{route('singlepage_index')}}" class="text-light"><i class="fa fa-upload"></i> Upload</a></button>
		<button class="btn btn-danger btn-sm px-5 py-2"><a href="{{route('singlepage_trash')}}" class="text-light"><i class="fa fa-recycle"></i> Trash()</a></button>
	</div>
</div>

<div class="clearfix"></div>

<form style="width:90%;margin:0 auto" method="post" action="{{route('singlepage_postinsert')}}" 
enctype="multipart/form-data" name="add" ><!-- onsubmit="return check_form()" -->
@csrf

<fieldset>
	<legend class="bg- text-primary">THÊM PAGE </legend>
	@includeIf('backend.modules.message')

	<div class="form-group">
		<label for="formGroupExampleInput">Tên Pages</label>
		<input type="text" class="form-control w-100" id="formGroupExampleInput" placeholder="Name page ...  " name="name"   value="{{old('name')}}" >
	</div>

	<div class="mb-2">
		<label  for="inlineFormCustomSelect">Chi tiết</label>
		<textarea name="content" id="editor">{{old('content')}}</textarea>	
	</div>





</div>
<br>

<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</fieldset>
</form>
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script>
	ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.then( editor => {
		console.log( editor );
	})
	.catch( error => {
		console.error( error );
	} );
</script>
@endsection