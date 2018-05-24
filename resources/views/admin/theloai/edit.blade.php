@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Edit {{ $theloaiEdit->Ten }}</small>
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
                    <form action="admin/theloai/edit/{{ $theloaiEdit->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="cateName" placeholder="Please Enter Category Name" @if(isset($_POST['cateName'])) value="{{ $_POST['cateName']}}" @endif />
                        </div>
                        <button type="submit" class="btn btn-default">Category Edit</button>
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