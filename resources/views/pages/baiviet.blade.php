@extends('pages.master')
@section('title',$baiviet->TieuDe)
@section('left_content')
<div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{{asset("trangchu")}}">Home</a></li>
              <li><a href="#">{{$loaithe->Ten}}</a></li>
              <li class="active">{{$loaitinn->Ten}}</li>
            </ol>
            <h1>{{$baiviet->TieuDe}}</h1>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Wpfreeware</a> <span><i class="fa fa-calendar"></i>6:49 AM</span> <a href="#"><i class="fa fa-tags"></i>Technology</a> </div>
            <div class="single_page_content"> <img class="img-center" src="{{asset("public/image/tintuc/$baiviet->Hinh")}}" alt="">
              <p>{{$baiviet->TomTat}}</blockquote>
              <ul>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
              </ul>
              <h2>This is h2 title</h2>
              <h3>This is h3 title</h3>
              <h4>This is h4 title</h4>
              <h5>This is h5 title</h5>
              <h6>This is h6 Title</h6>
              <button class="btn default-btn">Default</button>
              <button class="btn btn-red">Red Button</button>
              <button class="btn btn-yellow">Yellow Button</button>
              <button class="btn btn-green">Green Button</button>
              <button class="btn btn-black">Black Button</button>
              <button class="btn btn-orange">Orange Button</button>
              <button class="btn btn-blue">Blue Button</button>
              <button class="btn btn-lime">Lime Button</button>
              <button class="btn btn-theme">Theme Button</button>
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2>Tin Liên Quan <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                @foreach($tinlienquan as $key => $tlq)
                  @if($key > count($tinlienquan) -4)
                <li>
                  <div class="media"> <a class="media-left" href="{{asset("baiviet/$tlq->id/$tlq->TieuDeKhongDau.html")}}"> <img src="{{asset("public/image/tintuc/$tlq->Hinh")}}" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="{{asset("baiviet/$tlq->id/$tlq->TieuDeKhongDau.html")}}"> {{$tlq->TieuDe}}</a> </div>
                  </div>
                </li>
                @endif
                @endforeach
              </ul>
            </div>
          </div>
        </div>
@endsection
@section('right_content')
	<aside class="right_content">
          @include('inc/popularpost')
          <div>
            <img src="http://adi.admicro.vn/adt/adn/2017/08/cpc30-adx59814d5a658cf.gif" alt="">

          </div>         
        </aside>
@endsection