
<div class="row">
    @foreach($b_p as $p)
    <div class="col-4">
      <img src="{{asset('images/slider/'.$p->name_image)}}" class="img-fluid" >
    </div>
    @endforeach
  </div>