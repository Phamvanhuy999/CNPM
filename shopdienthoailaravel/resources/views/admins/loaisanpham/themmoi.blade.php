<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
    <title>Manh Dollar</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admins.partials.content-header',['name'=>'Loại sản phẩm','key'=>'Thêm Mới'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label >Tên Loại Sản Phẩm</label>
                                <input type="text" class="form-control" id=""  placeholder="Tên Loại Sản Phẩm">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm Mới</button>
                        </form>
                    </div>


                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

