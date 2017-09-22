@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{asset("admin/user/sua/$user->id")}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="Name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label>Thay đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="Password" placeholder="Nhập mật khẩu" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control password" name="RePassword" placeholder="Nhập lại mật khẩu" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"  disabled="" class="form-control" name="Email" placeholder="Please Enter Email"  value="{{$user->email}}" />
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="Level" value="1" 
                                        @if($user->level == 1)
                                            {{"checked"}}
                                        @endif
                                     type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="Level" value="0"
                                        @if($user->level == 0)
                                            {{"checked"}}
                                        @endif
                                     type="radio">Member
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                    if ($(this).is(":checked")) {
                        $(".password").removeAttr('disabled');
                    } else {
                        $(".password").attr('disabled','');
                    }
            });
            
        });


    </script>
    
@endsection