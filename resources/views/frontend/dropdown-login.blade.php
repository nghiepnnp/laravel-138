@php
use App\Models\Menu;
$listmenu = Menu::where(['status'=>1,'parent'=>0])->orderBy('parent','asc')->get();
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-   m-0 p-0">

	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item ">
				<a class="nav-link text-dark bg-light " href="#" style="padding-right:40px">
					<i class="fas fa-bars "></i>  Danh mục sản phẩm </a>
				</li>

				@foreach($listmenu as $itemmenu)
				@php
				$listmenu2=Menu::where(['status'=>1,'parent'=>$itemmenu->id])
				->orderBy('parent','asc')->get();
				@endphp
				<li class="nav-item">
					<a class="nav-link  text-dark" href="{{$itemmenu->slug}}">{{$itemmenu->name}}</a>
				</li>
				
				@endforeach
			</ul>
		</div>
	</nav>
</div>
<div class="col-3 p-0 m-0 bg-" ><!--  Login-Sigin -->
	<div class="c-login " >
		<ul>
			<li class="">
				<a href="{{route('login')}}" class="border-right border-danger pr-3 text-danger">Đăng nhập</a>
			</li>
			<li>
				<a href="" class=" pl-3 text-danger ">Đăng ký</a>
			</li>
		</ul>
	</div>
</div>

