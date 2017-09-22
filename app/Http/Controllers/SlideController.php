<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slide;


class SlideController extends Controller
{
    public function getDanhSach(){

    	$slide = Slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }

    public function getThem(){
    	
        return view('admin.slide.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
        	'Ten'=>'required|min:3|unique:Slide,Ten|max:300',
        	'MoTa'=>'required|min:3|max:200'
        ],
        [	
        	'Ten.required'=>'Bạn chưa nhâp tên',
            'MoTa.required'=>'Bạn chưa nhâp mô tả'
        ]);

        $slide = new Slide;
        $slide->Ten = $request->Ten;
        $slide->MoTa = $request->MoTa;
        $slide->link = $request->link;

        if($request->has('link'))
        	$slide->link = $request->link;

        if ($request->hasFile('Hinh')) {
        	$file = $request->file('Hinh');
        	$duoi = $file->getClientOriginalExtension();
        	if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
        		return redirect('admin/slide/them')->with('loi','Vui lòng chọn định dạng ảnh JPG,PNG,JPEG');
        	}
        	$name = $file->getClientOriginalName();
        	$Hinh = str_random(4)."_".$name;
        	while(file_exists("public/image/slide/".$Hinh)){
        		$Hinh = str_random(4)."_".$name;
        	}
        	$file->move("public/image/slide",$Hinh);
        	$slide->Hinh = $Hinh;
        }else{
        	$slide->Hinh = "";
        }

        $slide->save();

        return redirect('admin/slide/them')->with('thongbao','Thêm Thành Công');
       
    }

    public function getSua($id){
        $slide = Slide::find($id);
    	
        return view('admin/slide/sua',['slide'=>$slide]);
    }

    public function postSua(Request $request,$id){
        $slide = Slide::find($id);
        $this->validate($request,
        [
        	'Ten'=>'required|min:3|max:300',
        	'MoTa'=>'required|min:3|max:200'
        ],
        [	
        	'Ten.required'=>'Bạn chưa nhâp tên',
            'MoTa.required'=>'Bạn chưa nhâp mô tả'
        ]);

        $slide->Ten = $request->Ten;
        $slide->MoTa = $request->MoTa;
         $slide->link = $request->link;

        if ($request->hasFile('Hinh')) {
        	$file = $request->file('Hinh');
        	$duoi = $file->getClientOriginalExtension();
        	if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
        		return redirect('admin/slide/sua')->with('loi','Vui lòng chọn định dạng ảnh JPG,PNG,JPEG');
        	}
        	$name = $file->getClientOriginalName();
        	$Hinh = str_random(4)."_".$name;
        	while(file_exists("public/image/slide/".$Hinh)){
        		$Hinh = str_random(4)."_".$name;
        	}
        	$file->move("public/image/slide",$Hinh);
        	unlink("public/image/slide/".$slide->Hinh);
        	$slide->Hinh = $Hinh;
        	}


        $slide->save();

        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công');    
    }

    public function getXoa($id){
        $slide = Slide::find($id);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
