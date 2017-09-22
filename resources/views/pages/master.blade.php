<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/font.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/li-scroller.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/jquery.fancybox.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=vietnamese" rel="stylesheet">
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="{{asset("/")}}">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="{{asset("contact")}}">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p>Friday, December 05, 2045</p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.html" class="logo"><img src="images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="{{asset("/")}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
         @foreach($theloai as $tl)
            @if(count($tl->loaitin) > 0)
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $tl->Ten}}</a>
            <ul class="dropdown-menu" role="menu">
              @foreach($tl->loaitin as $lt)
              <li><a href="{{asset("loaitin/$lt->id/$lt->TenKhongDau.html")}}">{{ $lt->Ten }}</a></li>
              @endforeach
            </ul>
          </li>
            @else
              <li> <a href="#">{{ $tl->Ten}}</a>
            @endif
         @endforeach       
        </ul>
      </div>
    </nav>
  </section>

  @yield('slide')
  
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        @yield('left_content')
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        @yield('right_content')
      </div>
    </div>
  </section>

  <footer id="footer">
    {{-- <div class="footer_top">
      <div class="row"> --}}
        {{-- <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Flickr Images</h2>
          </div>
        </div> --}}
        {{-- <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Tag</h2>
            <ul class="tag_nav">
              <li><a href="#">Games</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Life &amp; Style</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">Photo</a></li>
              <li><a href="#">Slider</a></li>
            </ul>
          </div>
        </div> --}}
        {{-- <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <address>
            Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
            </address>
          </div>
        </div> --}}
      {{-- </div>
    </div> --}}
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; 2050 <a href="{{asset("trangchu")}}">NewsFeed</a></p>
      <p class="developer">Developed By Wpfreeware</p>
    </div>
  </footer>
</div>
<script src="{{ asset('public/js/jquery.min.js') }}"></script> 
<script src="{{ asset('public/js/wow.min.js') }}"></script> 
<script src="{{ asset('public/js/bootstrap.min.js')}}"></script> 
<script src="{{ asset('public/js/slick.min.js') }}"></script> 
<script src="{{ asset('public/js/jquery.li-scroller.1.0.js')}}"></script> 
<script src="{{ asset('public/js/jquery.newsTicker.min.js') }}"></script> 
<script src="{{ asset('public/js/jquery.fancybox.pack.js') }}"></script> 
<script src="{{ asset('public/js/custom.js')}}"></script>
</body>
</html>