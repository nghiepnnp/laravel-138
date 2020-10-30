@extends('layouts.layoutadmin')
@section('title', 'Quản lý danh muc')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/classic/ckeditor.js"></script>
<div class="clearfix py-3">
	<div class="row bg- border ">
		<div class="col-9 h4 text-danger">
			CHỈNH SỬA BÀI VIẾT
		</div>
		<div class="col-3">
			<div class="float-right">
				<button type="button" class="btn btn-primary">
					<a href="{{route('post_index')}}" class="text-white">Index</a>
				</button> 
				<button type="button" class="btn btn-danger">
					<a href="{{route('post_trash')}}" class="text-white">Trash</a>
				</button>	
			</div>
		</div>
	</div>
	
</div>
<div class="clearfix"></div>

<form  method="POST" action="{{route('post_postupdate',['id'=>$row->id])}}" style="width:90%;margin:0 auto" 
	enctype="multipart/form-data">
	@csrf
	<fieldset>
		@includeIf('backend.modules.message')
		<div class="form-group">
			<label for="formGroupExampleInput">Tiêu đề bài viết</label>
			<input type="text" class="form-control w-100" name="title"  value="{{$row->title}}">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput">Mô tả bài viết</label>
			<input type="text" class="form-control w-100" name="short"  value="{{$row->short_description}}">
		</div>
		<div class="form-group">
			<div class="mb-2">
				<label  for="inlineFormCustomSelect">Nội dung</label>
				<textarea name="content" id="editor">{{$row->content}}</textarea>
			</div>	
		</div>
		<div class="form-group">
			<input type="file" class="form-control" name="image" style="padding-bottom:40px" >
		</div>
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>
</fieldset>

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