<div class="single_sidebar">
  <h2><span>Popular Post</span></h2>
  <ul class="spost_nav">
    @foreach($popularpost as $key => $pp)
    <li>
      <div class="media wow fadeInDown"> <a href="{{asset("baiviet/$pp->id/$pp->TieuDeKhongDau.html")}}" class="media-left"> <img alt="" src="{{asset("public/image/tintuc/$pp->Hinh")}}"> </a>
        <div class="media-body"> <a href="{{asset("baiviet/$pp->id/$pp->TieuDeKhongDau.html")}}" class="catg_title"> {{$pp->TieuDe}}</a> </div>
      </div>
    </li>
    @endforeach

  </ul>
</div>