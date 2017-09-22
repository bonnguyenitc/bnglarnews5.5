<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\TinTuc;
use App\LoaiTin;
use DB;
use Illuminate\Database\Eloquent\Builder;


class PageController extends Controller
{
	function __construct(){
		$theloai = TheLoai::all();
        $popularpost = TinTuc::where('NoiBat', 1)->take(4)->get();
		view()->share('theloai',$theloai);
        view()->share('popularpost',$popularpost);
	}
    function trangchu(){
    	$slide = Slide::all();
        //tin xa hoi
        $theloaixahoi = TheLoai::find(1);
        $tintucxahoi = $theloaixahoi->tintuc;
        //tin the gioi
        $theloaithegioi = TheLoai::find(2);
        $tintucthegioi = $theloaithegioi->tintuc;
        // $tintucthegioi = DB::select('select tintuc.* from tintuc inner join loaitin on tintuc.idLoaiTin=loaitin.id inner join theloai on loaitin.idTheLoai = theloai.id where theloai.id = 2 order by theloai.id desc');

        //tin the thao
        $tintucthethao = TheLoai::find(5);
        $tintucthethao = $tintucthethao->tintuc;
        //tin van hoa
        $tintucvanhoa = TheLoai::find(4);
        $tintucvanhoa = $tintucvanhoa->tintuc;

        // tin sớm nhât
        
    	return view('pages.home',['slide'=>$slide,'tintucxahoi'=>$tintucxahoi,'tintucthegioi'=>$tintucthegioi,'tintucthethao'=>$tintucthethao,'tintucvanhoa'=>$tintucvanhoa]);
    }

    function contact(){
    	
    	return view('pages.contact');
    }
    function loaitin($id){
    	$loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)->paginate(10);
    	return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    function baiviet($id,$tieudekhongdau=null){
    	$baiviet = TinTuc::find($id);
        $loaitinn = LoaiTin::find($baiviet->idLoaiTin);
        $loaithe = TheLoai::find($loaitinn->idTheLoai);
        $tinlienquan = TinTuc::where('idLoaiTin',$baiviet->loaitin->id)->get();
    	return view('pages.baiviet',['baiviet'=>$baiviet,'loaitinn'=>$loaitinn,'loaithe'=>$loaithe,'tinlienquan'=>$tinlienquan]);
    }
}
