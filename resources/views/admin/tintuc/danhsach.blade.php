@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Tóm Tắt</th>
                                <th>Thể Loại</th>
                                <th>Loại Tin</th>
                                <th>Số lượng xem</th>
                                <th>Nỗi bật</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc as $tt)
                            <tr class="even gradeC" align="center">
                                <th>{{$tt->id}}</th>
                                <th><p>{{$tt->TieuDe}}</p>
                                    <img width="100px" src="{{asset("public/image/tintuc/$tt->Hinh")}}" alt="{{$tt->Hinh}}">
                                </th>

                                <th>{{$tt->TomTat}}</th>
                                <th>{{$tt->loaitin->theloai->Ten}}</th>
                                <th>{{$tt->loaitin->Ten}}</th>
                                <th>{{$tt->SoLuotXem}}</th>
                                <th>{{($tt->NoiBat==1)?'Có':'Không'}}</th>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{asset("admin/tintuc/xoa/$tt->id")}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{asset("admin/tintuc/sua/$tt->id")}}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection