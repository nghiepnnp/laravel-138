<div class="container-products">
 <div class="h4 text-white bg-primary mt-3 py-2 pl-5">TẤT CẢ SẢN PHẨM</div>
 <div class="row">
   @foreach($all_product as $pr) <div class="col-sm-2 float-left p-0 m-0">
     <div class="card py-3 ">
      <a href="{{url($pr->slug)}}">
        <div class="img-card px-3">
          <img src="{{asset('images/'.$pr->image)}}"   alt="Apple Iphone Xs Max" class="img-fluid">
        </div>
        <div class="card-body">
          <p class="card-title font-weight-bold" style="color:#525252">
            {{$pr->name}}
          </p>
          <strong class="text-danger">
           {{number_format($pr->price)}} đ
         </strong>
         <p class="card-text " style="color:#22BF38"></p>
       </div>
     </a>
   </div>  
 </div>
 @endforeach
</div>
<div class="clearfix"></div>
<div  style="width:15%;margin: 0 auto" class="mt-3">
 {{ $all_product->links() }}
</div>
</div>