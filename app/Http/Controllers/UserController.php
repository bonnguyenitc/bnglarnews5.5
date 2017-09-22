<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{
     public function getDanhSach(){

    	$user = User::all();
    	return view('admin.User.danhsach',['user'=>$user]);
    }

    public function getThem(){
        return view('admin.user.them');
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'Name'=> 'required|min:3|max:100|unique:users,name',
            'Email'=> 'required|email|unique:users,email',
            'Password'=>'required|min:6|max:32',
            'RePassword'=>'required|same:Password',
        ],
        [
            'Name.required'=>'Bạn chưa nhâp tên người dùng',
            'Name.min'=>'Tên thể loại có độ dài 03-100 ký tự',
            'Name.max'=>'Tên thể loại có độ dài 03-100 ký tự',
            'Name.unique' =>'Bị trùng loại tin',
            'Email.required'=> 'Bạn chưa nhập Email',
            'Email.email'=>'Bạn chưa nhập đúng định dạng Email',
            'Email.unique'=>'Email đã tồn tại',
            'Password'=>'Bạn chưa nhập mật khẩu',
            'Password.min'=>'Mật khẩu phải lơn hơn 6 kí tự',
            'Password.max'=>'Mật khẩu có tối đa 32 kí tự',
            'RePassword.required'=>'Bạn chưa nhập lại mật khẩu',
            'RePassword.same'=>'Nhập lại mật khẩu không đúng'
        ]);

        $user = new User;
        $user->name = $request->Name;
        $user->email = $request->Email;
        $user->password = bcrypt($request->Password);
        $user->level = $request->Level;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','Thêm Thành Công');
       
    }

    public function getSua($id){
        $user = User::find($id);
    	
        return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $request,$id){
       

        $this->validate($request,
        [
            'Name'=> 'required|min:3|max:100'
            
        ],
        [
            'Name.required'=>'Bạn chưa nhâp tên người dùng',
            'Name.min'=>'Tên thể loại có độ dài 03-100 ký tự',
            'Name.max'=>'Tên thể loại có độ dài 03-100 ký tự',
        ]);

        $user = User::find($id);
        $user->name = $request->Name;      
        $user->level = $request->Level;

        if ($request->changePassword == "on") {
        	$this->validate($request,
        [
            'Password'=>'required|min:6|max:32',
            'RePassword'=>'required|same:Password',
        ],
        [
            'Password'=>'Bạn chưa nhập mật khẩu',
            'Password.min'=>'Mật khẩu phải lơn hơn 6 kí tự',
            'Password.max'=>'Mật khẩu có tối đa 32 kí tự',
            'RePassword.required'=>'Bạn chưa nhập lại mật khẩu',
            'RePassword.same'=>'Nhập lại mật khẩu không đúng'
        ]);
        
        	$user->password = bcrypt($request->Password);
        }
        
        $user->save();

        return redirect("admin/user/sua/$id")->with('thongbao','Sửa Thành Công');
    }

    public function getXoa($id){
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

    public function getDangNhapAdmin(){

    	return view('admin.login');
    }

    public function postDangNhapAdmin(Request $request){

    	$this->validate($request,[
    		'email'=>'required',
    		'password'=>'required|min:6|max:32'
    	],[
    		'email.required'=>'Bạn chưa nhập Email',
    		'password.required'=>'Bạn chưa nhập mật khẩu',
    		'password.min'=>'Mật khẩu không dưới 6 kí tự',
    		'password.max'=>'Mật khẩu không quá 32 ký tự'

    	]);

    	 $email = $request->email;
         $password = $request->password;
    	if (Auth::attempt(['email'=>$email,'password'=>$password,'level'=>1])) {
    		return redirect('admin/theloai/danhsach');
    	}else{
    		return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
    	}
    }

    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }

}
