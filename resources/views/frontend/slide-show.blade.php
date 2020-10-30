@php
use App\Models\Slider;
$list_slider = Slider::where(['status'=>1,'loai'=>'slideshow'])->orderBy('created_at')->get();
@endphp


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

    @foreach($list_slider as $slider)

    @if($loop->first)
    <div class="carousel-item active">
     <img class="d-block w-100" src="{{asset('images/slider/'.$slider->name_image)}}" alt="{{$slider->name_image}}">
   </div>
   @else
   <div class="carousel-item">
     <img class="d-block w-100" src="{{asset('images/slider/'.$slider->name_image)}}" alt="{{$slider->name_image}}">
   </div>
   @endif
   @endforeach
 </div>
 <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
  </div>