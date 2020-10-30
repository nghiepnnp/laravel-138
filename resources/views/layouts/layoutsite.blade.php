<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  

  <title>@yield('title')</title>

  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

  <!-- <link rel="stylesheet" href="{{asset('css/all.css')}}"> -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/style-slide.css')}}">

  <script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>

  <script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>


 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>


<body style="background-color:#F2F3F5">
  <header class=" " > <!-- style="background-color:yellow" --> 
    <div class=" p-0 m-0" style="background-color:#347EDA">
      <div class="row" >
        <div class="col text-white">Chào mừng đến với Website</div>

      </div>
    </div>

    <!-- Logo-seach-cart -->
    <div class="pt-3 pb-2" style="background-color:#189eff" >
      <div class="container " ><!--  style="margin-top:20px" -->
        <div class="row">


          @include('frontend.logo-search')

        </div> <!-- e-row-cart- -->
      </div>
    </div>
  </div>
</div>
</header>



<div class="w-100 bg-" style="background-color:#fff">
  <div class="pl-3" style="width:90%; margin: 0 auto">
    <div class="row">
      <div class="col-9 bg- ">
          
          <!-- Dropdown menu -->
          @include('frontend.dropdown-login')

      </div>
    </div>
  </div>






  <!-- Show hàng HOT -->
  


@yield('content')







<div style="clear:both"></div>
<div class="clearfix"></div>


@include('frontend.footer')

</body>
</html> 