@extends('pages.master')
@section('title','Trang Chủ')
@section('slide')
<section id="sliderSection">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="slick_slider">
        @foreach($slide as $sl)
        <div class="single_iteam"> <a href="{{$sl->link}}"> <img src="{{ asset("public/image/slide/$sl->Hinh")}}" alt=""></a>
          <div class="slider_article">
            <h2><a class="slider_tittle" href="{{$sl->link}}">{{ $sl->Ten }}</a></h2>
            <p>{{$sl->MoTa}}</p>
          </div>
        </div>
        @endforeach 
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <div class="latest_post">
        <h2><span>Quảng Cáo</span></h2>
          <img src="https://i.pinimg.com/736x/be/0a/b7/be0ab7e1a7f2f5a319e190ec0bad1e31--cute-girls-vietnam.jpg"  width="100%" alt="">
      </div>
    </div>
  </div>
</section>
@endsection

@section('left_content')
<div class="left_content">
  <div class="single_post_content">
    <h2><span>Xã Hội</span></h2>
    @foreach($tintucxahoi as $key => $ttxh)
    @if($key == count($tintucxahoi)-1)
    <div class="single_post_content_left">
      <ul class="business_catgnav  wow fadeInDown">
        <li>
          <figure class="bsbig_fig"> <a href="pages/single_page.html" class="featured_img"> <img alt="" src="{{asset("public/image/tintuc/$ttxh->Hinh")}}"> <span class="overlay"></span> </a>
            <figcaption> <a href="{{asset("baiviet/$ttxh->id/$ttxh->TieuDeKhongDau.html")}}">{{ $ttxh->TieuDe }}}</a> </figcaption>
            <p>{{$ttxh->TomTat}}</p>
          </figure>
        </li>
      </ul>
    </div>
    @endif
    @endforeach
    <div class="single_post_content_right">
      <ul class="spost_nav">
        @foreach($tintucxahoi as $ttxh)
    @if($ttxh->id != count($tintucxahoi) && $ttxh->id >(count($tintucxahoi) - 6))
      <li>
          <div class="media wow fadeInDown"> <a href="{{asset("baiviet/$ttxh->id/$ttxh->TieuDeKhongDau.html")}}" class="media-left"> <img alt="" src="{{asset("public/image/tintuc/$ttxh->Hinh")}}"> </a>
            <div class="media-body"> <a href="{{asset("baiviet/$ttxh->id/$ttxh->TieuDeKhongDau.html")}}" class="catg_title"> {{$ttxh->TieuDe}}</a> </div>
          </div>
        </li>
    @endif
    @endforeach   
      </ul>
    </div>
  </div>
  <div class="fashion_technology_area">
    <div class="fashion">
      <div class="single_post_content">
        <h2><span>Thế Giới</span></h2>
        @foreach($tintucthegioi as $tttg)
          @if($tttg->id == count($tintucthegioi)+160)
            <ul class="business_catgnav wow fadeInDown">
          <li>
            <figure class="bsbig_fig"> <a href="{{asset("baiviet/$tttg->id/$tttg->TieuDeKhongDau.html")}}" class="featured_img"> <img alt="" src="{{asset("public/image/tintuc/$tttg->Hinh")}}"> <span class="overlay"></span> </a>
              <figcaption> <a href="{{asset("baiviet/$tttg->id/$tttg->TieuDeKhongDau.html")}}">{{$tttg->TieuDe}}</a> </figcaption>
              <p>{{$tttg->TomTat}}</p>
            </figure>
          </li>
        </ul>
          @endif
        @endforeach
        
        <ul class="spost_nav">
            @foreach($tintucthegioi as $tttg)
    @if($tttg->id != count($tintucthegioi)+160 && $tttg->id >(count($tintucthegioi) + 156))
      <li>
          <div class="media wow fadeInDown"> <a href="{{asset("baiviet/$tttg->id/$tttg->TieuDeKhongDau.html")}}" class="media-left"> <img alt="" src="{{asset("public/image/tintuc/$tttg->Hinh")}}"> </a>
            <div class="media-body"> <a href="{{asset("baiviet/$tttg->id/$tttg->TieuDeKhongDau.html")}}" class="catg_title"> {{$tttg->TieuDe}}</a> </div>
          </div>
        </li>
    @endif
    @endforeach  
        </ul>
      </div>
    </div>
    <div class="technology">
      <div class="single_post_content">
        <h2><span>Thể Thao</span></h2>
        <ul class="business_catgnav">
          @foreach($tintucthethao as $key => $tttt)
              @if($key == count($tintucthethao)-1)
                <li>
            <figure class="bsbig_fig wow fadeInDown"> <a href="{{asset("baiviet/$tttt->id/$tttt->TieuDeKhongDau.html")}}" class="featured_img"> <img alt="" src="{{asset("public/image/tintuc/$tttt->Hinh")}}"> <span class="overlay"></span> </a>
              <figcaption> <a href="{{asset("baiviet/$tttt->id/$tttt->TieuDeKhongDau.html")}}">{{$tttt->TieuDe}}</a> </figcaption>
              <p>{{$tttt->TomTat}}</p>
            </figure>
          </li>
              @endif
          @endforeach
        </ul>
        <ul class="spost_nav">
          @foreach($tintucthethao as $key => $tttt)
              @if($key != count($tintucthethao)-1 && $key > count($tintucthethao)-5 )
                <li>
            <div class="media wow fadeInDown"> <a href="{{asset("baiviet/$tttt->id/$tttt->TieuDeKhongDau.html")}}" class="media-left"> <img alt="" src="{{asset("public/image/tintuc/$tttt->Hinh")}}""> </a>
              <div class="media-body"> <a href="{{asset("baiviet/$tttt->id/$tttt->TieuDeKhongDau.html")}}" class="catg_title">{{$tttt->TieuDe}}</a> </div>
            </div>
          </li>
              @endif
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <div class="single_post_content">
    <h2><span>Văn hóa</span></h2>
    <div class="single_post_content_left">
      <ul class="business_catgnav">
        @foreach($tintucvanhoa as $key => $ttvh)
              @if($key == count($tintucvanhoa)-1)
                <li>
            <figure class="bsbig_fig wow fadeInDown"> <a href="{{asset("baiviet/$ttvh->id/$ttvh->TieuDeKhongDau.html")}}" class="featured_img"> <img alt="" src="{{asset("public/image/tintuc/$ttvh->Hinh")}}"> <span class="overlay"></span> </a>
              <figcaption> <a href="{{asset("baiviet/$ttvh->id/$ttvh->TieuDeKhongDau.html")}}">{{$ttvh->TieuDe}}</a> </figcaption>
              <p>{{$ttvh->TomTat}}</p>
            </figure>
          </li>
              @endif
          @endforeach 
      </ul>
    </div>
    <div class="single_post_content_right">
      <ul class="spost_nav">
        @foreach($tintucvanhoa as $key => $ttvh)
              @if($key != count($tintucvanhoa)-1 && $key > count($tintucvanhoa)-7 )
                <li>
            <div class="media wow fadeInDown"> <a href="{{asset("baiviet/$ttvh->id/$ttvh->TieuDeKhongDau.html")}}" class="media-left"> <img alt="" src="{{asset("public/image/tintuc/$ttvh->Hinh")}}"> </a>
              <div class="media-body"> <a href="{{asset("baiviet/$ttvh->id/$ttvh->TieuDeKhongDau.html")}}" class="catg_title"> {{$ttvh->TieuDe}}</a> </div>
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
  <div class="single_sidebar">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
      <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
      <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="category">
        <ul>
          <li class="cat-item"><a href="#">Sports</a></li>
          <li class="cat-item"><a href="#">Fashion</a></li>
          <li class="cat-item"><a href="#">Business</a></li>
          <li class="cat-item"><a href="#">Technology</a></li>
          <li class="cat-item"><a href="#">Games</a></li>
          <li class="cat-item"><a href="#">Life &amp; Style</a></li>
          <li class="cat-item"><a href="#">Photography</a></li>
        </ul>
      </div>
      <div role="tabpanel" class="tab-pane" id="video">
        <div class="vide_area">
          <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="comments">
        <ul class="spost_nav">
        
        </ul>
      </div>
    </div>
  </div>
  <div class="single_sidebar wow fadeInDown">
    <h2><span>Sponsor</span></h2>
    <a class="sideAdd" href="#"><img src="http://tiepthitieudung.com/dataimages/201506/01/large/anh-sieu-hai-huoc-cua-be-nhan-ngay-quoc-te-thieu-nhi-4_1433129012.jpg" alt=""></a> </div>
    <div class="single_sidebar wow fadeInDown">
      <h2><span>Category Archive</span></h2>
      <select class="catgArchive">
        <option>Select Category</option>
        <option>Life styles</option>
        <option>Sports</option>
        <option>Technology</option>
        <option>Treads</option>
      </select>
    </div>
    <div class="single_sidebar wow fadeInDown">
      <h2><span>Links</span></h2>
      <ul>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Rss Feed</a></li>
        <li><a href="{{asset("admin/dangnhap")}}">Login</a></li>
        <li><a href="#">Life &amp; Style</a></li>
      </ul>
    </div>
  </aside>
  @endsection
