<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\LoaiTin;
use App\TheLoai;
use App\Comment;

class TinTucController extends Controller
{
    public function getDanhSach(){

    	$tintuc = TinTuc::orderBy('id','DESC')->get();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getThem(){
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
        	'LoaiTin'=>'required',
        	'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe|max:300',
        	'TomTat'=>'required|min:3|max:200',
        	'NoiDung'=>'required|min:3'
        ],
        [	
        	'LoaiTin.required'=>'Bạn chưa chọn loại tin',
        	'TieuDe.required'=>'Bạn chưa nhâp tên tiêu đề',
            'TomTat.required'=>'Bạn chưa nhâp tên tóm tắt',
            'NoiDung.required'=>'Bạn chưa nhâp tên nội dung',
            'TieuDe.min'=>'Tên thể loại có độ dài 03-300 ký tự',
            'TieuDe.max'=>'Tên thể loại có độ dài 03-300 ký tự',
            'TomTat.min'=>'Tên thể loại có độ dài 03-200 ký tự',
            'TomTat.max'=>'Tên thể loại có độ dài 03-200 ký tự',
            'NoiDung.min'=>'Tên thể loại có độ dài tối thiểu 03 ký tự',
        ]);

        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->SoLuotXem = 0;

        if ($request->hasFile('Hinh')) {
        	$file = $request->file('Hinh');
        	$duoi = $file->getClientOriginalExtension();
        	if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
        		return redirect('admin/tintuc/them')->with('loi','Vui lòng chọn định dạng ảnh JPG,PNG,JPEG');
        	}
        	$name = $file->getClientOriginalName();
        	$Hinh = str_random(4)."_".$name;
        	while(file_exists("public/image/tintuc/".$Hinh)){
        		$Hinh = str_random(4)."_".$name;
        	}
        	$file->move("public/image/tintuc",$Hinh);
        	$tintuc->Hinh = $Hinh;
        }else{
        	$tintuc->Hinh = "";
        }

        $tintuc->save();

        return redirect('admin/tintuc/them')->with('thongbao','Thêm Thành Công');
       
    }

    public function getSua($id){
        $tintuc = TinTuc::find($id);
        $theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	
        return view('admin/tintuc/sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postSua(Request $request,$id){
        $tintuc = TinTuc::find($id);
        $this->validate($request,
        [
        	'LoaiTin'=>'required',
        	'TieuDe'=>'required|min:3|max:300',
        	'TomTat'=>'required|min:3|max:200',
        	'NoiDung'=>'required|min:3'
        ],
        [	
        	'LoaiTin.required'=>'Bạn chưa chọn loại tin',
        	'TieuDe.required'=>'Bạn chưa nhâp tên tiêu đề',
            'TomTat.required'=>'Bạn chưa nhâp tên tóm tắt',
            'NoiDung.required'=>'Bạn chưa nhâp tên nội dung',
            'TieuDe.min'=>'Tên thể loại có độ dài 03-300 ký tự',
            'TieuDe.max'=>'Tên thể loại có độ dài 03-300 ký tự',
            'TomTat.min'=>'Tên thể loại có độ dài 03-200 ký tự',
            'TomTat.max'=>'Tên thể loại có độ dài 03-200 ký tự',
            'NoiDung.min'=>'Tên thể loại có độ dài tối thiểu 03 ký tự'
        ]);

        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        if ($request->hasFile('Hinh')) {
        	$file = $request->file('Hinh');
        	$duoi = $file->getClientOriginalExtension();
        	if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
        		return redirect('admin/tintuc/them')->with('loi','Vui lòng chọn định dạng ảnh JPG,PNG,JPEG');
        	}
        	$name = $file->getClientOriginalName();
        	$Hinh = str_random(4)."_".$name;
        	while(file_exists("public/image/tintuc/".$Hinh)){
        		$Hinh = str_random(4)."_".$name;
        	}
        	$file->move("public/image/tintuc",$Hinh);
        	unlink("public/image/tintuc/".$tintuc->Hinh);
        	$tintuc->Hinh = $Hinh;
        	}


        $tintuc->save();

        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');    
    }

    public function getXoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc->delete();

        return redirect('admin/tintuc/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

    public function getLoaiTin($idTheLoai){
		$loaitin = LoaiTin::where('idTheLoai',$idTheLoai)->get();
		foreach($loaitin as $lt){
			echo "<option value=".$lt->id.">".$lt->Ten."</option>";		
		}
	}
}
