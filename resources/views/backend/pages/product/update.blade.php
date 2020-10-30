 @extends('layouts.layoutadmin')
 @section('title', 'Quản lý bán gà')

 @section('content')

 <div class="container text-right pt-3 pb-5 pl-5">
 	<div style="float:left">	

 	</div>

 	<div style="float:right">
 		<button class="btn btn-primary btn-sm px-5 py-2"><a href="index.php/product/List/1" class="text-light"><i class="fa fa-upload"></i> Upload</a></button>
 		<button class="btn btn-danger btn-sm px-5 py-2"><a href="index.php/product/trash" class="text-light"><i class="fa fa-recycle"></i> Trash()</a></button>
 	</div>
 </div>

 <div class="clearfix"></div>

 <form style="width:90%;margin:0 auto" method="post" action="{{route('product_postupdate',['id'=>$row->id])}}" 
 enctype="multipart/form-data" name="add" ><!-- onsubmit="return check_form()" -->
 @csrf

 <fieldset>
 	<legend class="bg- text-primary">Cập nhật sản phẩm</legend>
 	@includeIf('backend.modules.message')
 	<div class="row">
 		<div class="col-8">
 			<div class="form-group">
 				<label for="formGroupExampleInput">Tên sản phẩm</label>
 				<input type="text" class="form-control w-100" id="formGroupExampleInput" name="name"  value="{{old('name', $row->name)}}">
 				@if($errors ->has('name'))
 				<span class="text-danger">{{$errors->first('name')}}</span>
 				@endif
 			</div>
 			<div class="mb-2">
 				<label  for="inlineFormCustomSelect">Chi tiết</label>
 				<textarea name="content" id="editor">{{old('content', $row->detail)}}</textarea>	
 			</div>
 			<div class="form-group">
 				<label for="formGroupExampleInput">Mô tả (SEO)</label>
 				<input type="text" class="form-control w-100" id="formGroupExampleInput" placeholder="Mô tả ... " name="mota"   
 				value="{{old('mota', $row->metadesc)}}" >
 			</div>
 			<div class="form-group">
 				<label for="formGroupExampleInput">Từ khóa (SEO)</label>
 				<input type="text" class="form-control w-100" id="formGroupExampleInput" placeholder="Từ khóa SEO ... " name="tukhoa"  value="{{old('tukhoa', $row->metakey)}}">
 			</div>

 		</div> <!-- End-col-7 -->
 		<div class="col-4">
 			<!-- Category Products -->
 			<div class="">
 				<label  for="inlineFormCustomSelect">Chọn loại sản phẩm</label>
 				<select class="custom-select" id="inlineFormCustomSelect" name="category">
 					<option value="">Chọn...</option>
 					@foreach($listcat as $c)
 					@if($row->product_category == $c->id)
 					<option selected value="{{$c->id}}">{{$c->name}}</option>
 					@else
 					<option value="{{$c->id}}">{{$c->name}}</option>
 					@endif

 					@endforeach
 				</select>
 				@if($errors ->has('category'))
 				<span class="text-danger">{{$errors->first('category')}}</span>
 				@endif
 			</div>
 			<div class="form-group">
 				<label for="formGroupExampleInput">Số lượng</label>
 				<input type="number" class="form-control w-100" id="formGroupExampleInput" name="quantity"  min="1" 
 				value="{{old('mota',$row->quantity)}}">
 			</div>
 			<div class="form-group">
 				<label for="formGroupExampleInput">Giá sản phẩm</label>
 				<input type="number" class="form-control w-100" id="formGroupExampleInput"  value="{{old('price', $row->price)}}" 
 				name="price"  min="0">
 			</div>
 				<div class="">
 				<label  for="inlineFormCustomSelect">Khuyến mại</label>
 				<select class="custom-select " id="inlineFormCustomSelect" name="sale">

 					<option value="@php echo $row->sale == 1?'1':'0'; @endphp">
 						@php echo $row->sale == 1?"Có":"Không"; @endphp
 					</option>
 					<option value="@php echo $row->sale == 1?'0':'1'; @endphp">
 						@php echo $row->sale == 1?"Không":"Có"; @endphp
 					</option>
 				</select>
 			</div>
 			<div class="form-group">
 				<label for="formGroupExampleInput">Giá khuyến mại</label>
 				<input type="number" class="form-control w-100" id="formGroupExampleInput" 
 				value="{{old('sale_price', $row->sale_price)}}" name="sale_price"  min="0">
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