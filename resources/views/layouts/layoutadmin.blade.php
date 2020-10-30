<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>@yield('title')</title>


  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <!-- Bootstrap CSS -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
  <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

  @yield('session_header')
  <!-- Font Awesome CSS -->
  

  <!-- Custom CSS -->
  <link href="{{asset('backend/css/style.css')}}" rel="stylesheet" type="text/css" />
  
  <link href="{{asset('backend/css/customer.css')}}" rel="stylesheet" type="text/css" />

  <!-- BEGIN CSS for this page -->

  <!-- END CSS for this page -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


  <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>






</head>

<body class="adminbody">

  <div id="main">

    <div class="headerbar">
      <div class="headerbar-left bg-dark">
        <a href="index.php" class="logo"><span>Admin</span></a>
      </div>
    </div>

    <div class="left main-sidebar"> 
      <div class="sidebar-inner leftscroll" >

        <div id="sidebar-menu">
          <ul>
            <li class="submenu" >
              <a class="" href="{{route('dashboard')}}"><i class="fa fa-tags"></i><span> Dashboard </span></a>
            </li>
            <li class="submenu">
              <a  href="{{route('category_index')}}"><i class="fa fa-at"></i><span> Category </span> <span class="menu-arrow"></span></a>
            </li>

            <li class="submenu">
              <a href="{{route('product_index')}}"><i class="fa fa-fw fa-file-text-o"></i> <span> Product </span> <span class="menu-arrow"></span></a>
            </li>

            <li class="submenu">
              <a href="{{route('user_index')}}"><i class="fa fa-fw fa-th"></i> <span> User </span> <span class="menu-arrow"></span></a>
            </li>
            <li class="submenu">
              <a href="{{route('post_index')}}"><i class="fa fa-fw fa-image"></i> <span> Bài viết </span> <span class="menu-arrow"></span></a>
            </li>

            <li class="submenu">
              <a href="{{route('order_index')}}"><i class="fa fa-fw fa-image"></i> <span> Orders </span> <span class="menu-arrow"></span></a>

            </li>
            <li class="submenu">
              <a href="{{route('topic_index')}}"><i class="fa fa-fw fa-image"></i> <span> Topic </span> <span class="menu-arrow"></span></a>
            </li>
            <li class="submenu">
              <a href="{{route('slider_index')}}"><i class="fa fa-fw fa-image"></i> <span> Slider </span> <span class="menu-arrow"></span></a>
            </li>
            <li class="submenu">
              <a href="{{route('contact_index')}}"><i class="fa fa-fw fa-image"></i> <span> Contact </span> <span class="menu-arrow"></span></a>
            </li>  
            <li class="submenu">
              <a href="{{route('singlepage_index')}}"><i class="fa fa-fw fa-image"></i> <span> Trang Đơn </span> <span class="menu-arrow"></span></a>
            </li>



            <li class="submenu">
              <a href="{{route('menu_index')}}"><span class="label radius-circle bg-primary float-right">9</span><i class="fa fa-fw fa-indent"></i><span> Menu Levels </span></a>
              <ul>
                <li>
                  <a href="#"><span>Second Level</span></a>
                </li>
                <li class="submenu">
                  <a href="#"><span>Third Level</span> <span class="menu-arrow"></span> </a>
                  <ul style="">
                    <li><a href="#"><span>Third Level Item</span></a></li>
                    <li><a href="#"><span>Third Level Item</span></a></li>
                  </ul>
                </li>                                
              </ul>
            </li> 
          </ul>

          <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

      </div>

    </div>
    <!--     End Sidebar -->
  </div>







  <div class="content-page ">
    <div class="content">
      <div class="container-fluid">


        @yield('content')


      </div>
    </div>  
  </div>









  <footer class="footer">
    <span class="text-right">
      <!--  Copyright <a target="_blank" href="#">© 2019</a> -->
    </span>
    <span class="float-right">
      Powered by <a target="_blank" href="#"><b>Nghiep Sama</b></a>
    </span>
  </footer>
  @yield('session_footer')



  
  <!-- <script src="{{asset('backend/js/jquery-3.3.1.min.js')}}"></script> -->

  <script src="{{asset('backend/js/detect.js')}}"></script>
  <script src="{{asset('backend/js/fastclick.js')}}"></script>
  <script src="{{asset('backend/js/jquery.blockUI.js')}}"></script>
  <script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
</body>
</html>