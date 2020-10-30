 @extends('layouts.layoutadmin')
 @section('title', 'Quản lý bán gà')

 @section('content')

 <div class="container text-right pt-3 pb-5 pl-5">
 	<div style="float:left">	

 	</div>

 	<div style="float:right">
 		<button class="btn btn-primary btn-sm px-5 py-2"><a href="{{route('topic_index')}}" class="text-light"><i class="fa fa-upload"></i> Index</a></button>
 		<button class="btn btn-danger btn-sm px-5 py-2"><a href="{{route('topic_trash')}}" class="text-light"><i class="fa fa-recycle"></i> Trash()</a></button>
 	</div>
 </div>

 <div class="clearfix"></div>

 <form style="width:90%;margin:0 auto" method="post" action="{{route('topic_postinsert')}}">
 	@csrf

 	<fieldset>
 		<legend class="bg- text-primary">Sửa tên topic</legend>
 		@includeIf('backend.modules.message')
 		<div class="form-group">
 			<label for="formGroupExampleInput">Tên Topic</label>
 			<input type="text" class="form-control w-100" id="formGroupExampleInput" placeholder="Name topic ... " 
 			name="name"  value="{{old('name')}}">
 		</div>


 		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
 	</fieldset>
 </form>
 @endsection