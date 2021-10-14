<!-- Stored in resources/views/child.blade.php -->

@extends('admins.layouts.admin')

@section('title')
<title>Manh Dollar</title>
@endsection
@section('content')

<div class="content-wrapper">

    @include('admins.partials.content-header',['name'=>'Hãng Sản Xuất','key'=>'Danh Sách'])

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('hangsanxuats.themmoi')}}" class="btn btn-success float-right m-2">Thêm Mới Hãng Sản Xuất</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên Hãng Sản Xuất</th>
                                <th scope="col">Hoạt Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hang_sxs as $hang_sx)
                            <tr>
                                <td>{{$hang_sx->ten_hangsx}}</td>
                                <td>{{$hang_sx->thong_tin}}</td>
                                <td>
                                    <a href="{{route('hangsanxuats.sua',['id'=>$hang_sx->id])}}" class="btn btn-default">Sửa</a>
                                    @method('DELETE')

                                    <a href="{{route('hangsanxuats.xoa',['id'=>$hang_sx->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa không?');">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{$hang_sxs->links()}}
                </div>
            </div>


        </div>
    </div>

</div>


@endsection