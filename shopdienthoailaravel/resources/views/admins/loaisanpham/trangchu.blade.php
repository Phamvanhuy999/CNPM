<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
<title>Manh Dollar</title>
@endsection
@section('content')

<div class="content-wrapper">

    @include('admins.partials.content-header',['name'=>'Loại sản phẩm','key'=>'Danh Sách'])

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('loaisanphams.themmoi')}}" class="btn btn-success float-right m-2">Thêm Mới Loại Sản Phẩm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên Loại Sản Phẩm</th>
                                <th scope="col">Hoạt Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loai_sps as $loai_sp)
                            <tr>
                                <td>{{$loai_sp->ten_loaisp}}</td>
                                <td>
                                    <a href="{{route('loaisanphams.sua',['id'=>$loai_sp->id])}}" class="btn btn-default">Sửa</a>
                                    @method('DELETE')

                                    <a href="" data-url ="{{route('loaisanphams.xoa',['id'=>$loai_sp->id])}}" id="xoa" class="btn btn-danger" >Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{$loai_sps->links()}}
                </div>
            </div>


        </div>
    </div>

</div>
@section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset("content/js/list.js")}}"></script>
@endsection

@endsection
