@extends('pages.master')
@section('title',"$loaitin->Ten")
@section('left_content')
<div class="left_content">
  <div class="single_post_content">
    <h2><span>{{$loaitin->Ten}}</span></h2>

    @foreach($tintuc as $tt)
      <div class="single_post_content_left loaitin">
      <ul class="business_catgnav  wow fadeInDown">
        <li>
          <figure class="bsbig_fig"> <a href="" class="featured_img"> <img alt="" src="{{asset("public/image/tintuc/$tt->Hinh")}}"> <span class="overlay"></span> </a><figcaption> <a href="{{asset("baiviet/$tt->id/$tt->TieuDeKhongDau.html")}}">{{$tt->TieuDe}}</a> </figcaption><p>{{$tt->TomTat}}</p></figure></li>
      </ul>
    </div>
    @endforeach

  </div>
    <div class="pager">
      {{$tintuc->links()}}
    </div> 
  </div>

  @endsection
  @section('right_content')
  <aside class="right_content">
   @include('inc/popularpost')
   <div>
     
     <img src="http://adi.admicro.vn/adt/adn/2017/08/cpc30-adx59814d5a658cf.gif" alt="">
     <img src="http://adi.admicro.vn/adt/adn/2017/07/300x6-adx595b62e7be139.gif" alt="">
   </div>
  </aside>
  @endsection
