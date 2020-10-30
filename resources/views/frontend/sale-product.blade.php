
 <div class="h4 text-white bg-danger mt-3 py-2 pl-5">SẢN PHẨM KHYẾN MẠI</div>
 <div class="row">
   @foreach($sale as $pr) <div class="col-sm-2 float-left">
     <div class="card pt-3 ">
      <a href="{{url($pr->slug)}}">
        <div class="img-card px-3">
          <img src="{{asset('images/product/'.$pr->image)}}"   alt="Apple Iphone Xs Max" class="img-fluid">
        </div>
        <div class="card-body">
          <p class="card-title font-weight-bold" style="color:#525252">
            {{$pr->name}}
          </p>
          <strike> {{number_format($pr->price)}} đ</strike>
          <strong class="text-danger">
            {{number_format($pr->sale_price)}} đ
          </strong>
          <p class="card-text " style="color:#22BF38"></p>
        </div>
      </a>
    </div>  
  </div>
  @endforeach