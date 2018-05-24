@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại tin
                        <small>Sửa {{ $loaitinEdit->Ten }}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif

                    @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                    @endif
                        <form action="admin/loaitin/edit/{{ $loaitinEdit->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" name="theLoai">
                                @foreach ($theloai as $tl)
                                    <option 
                                        @if ($tl->id == $loaitinEdit->idTheLoai)
                                            {{ "selected" }}
                                        @endif
                                        value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại tin</label>
                            <input type="text" class="form-control" name="loaiTin" placeholder="Nhập tên loại tin" value="{{ $loaitinEdit->Ten }}">
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
    <!-- /#page-wrapper -->
@endsection