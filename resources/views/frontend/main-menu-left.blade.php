@php
use App\Models\Category;
$listmenu = Category::where(['status'=>1,'parent'=>0, 'trash'=>0])->orderBy('orders','asc')->get();
	@endphp

	<nav class="nav-main p-0 m-0" >
		<ul class="p-0" >
			@foreach($listmenu as $itemmenu)
			@php
			$listmenu2=Category::where(['status'=>1,'parent'=>$itemmenu->id])
			->orderBy('orders','asc')->get();
			@endphp
			@if(count($listmenu2))
			<li>
				<a href="{{url('san-pham/'.$itemmenu->slug)}}">
					<div class="icon-nav-l">
					</div>
					{{$itemmenu->name}}
					<span class="menu-arror"></span>
				</a>
					<div class="row">
						<div class="col">
							<ul>  
								@foreach($listmenu2 as $itemmenu2)
								<li><a href="{{url('san-pham/'.$itemmenu2->slug)}}">{{$itemmenu2->name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div> 
				</li>
				@else
				<li>
					<a href="{{url('san-pham/'.$itemmenu->slug)}}">
						<div class="icon-nav-l"></div>
						{{$itemmenu->name}}<span class="menu-arror"></span>
					</a>
				</li>
				@endif
				@endforeach
			</ul>
		</nav>

