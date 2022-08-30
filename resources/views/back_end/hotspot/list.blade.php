@extends('back_end.layout.index')
@section('title', 'Quản lý hotspot')
<!-- style -->
@section('include-style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('back-end/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('custom-style')
<style>
    .btn-app.btn-danger {
        color: #fff;
        background-color: #dd4b39;
        border-color: #d73925;
    }

    .btn-app.btn-danger:hover,
    .btn-app.btn-danger:active,
    .btn-app.btn-danger.hover {
        background-color: #d73925;
    }

    .btn-app.btn-primary {
        color: #fff;
        background-color: #3c8dbc;
        border-color: #367fa9;
    }

    .btn-app.btn-primary:hover,
    .btn-app.btn-primary:active,
    .btn-app.btn-primary.hover {
        background-color: #367fa9;
    }

    td {
        vertical-align: middle !important;
    }

    .active {
        color: green;
        font-weight: bold;
    }

    .no-active {
        color: red;
        font-weight: bold;
    }
</style>
@endsection
<!-- content-->
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý hotspot
        <small>Danh sách hotspot</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="./admin"><i class="fa fa-dashboard"></i>Trang chủ admin</a></li>
        <li><a href="{{ route('hotspot') }}">Quản lý hotspot</a></li>
        <li class="active">Danh sách hotspot</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                {{-- <div class="box-header">
                    <a href="{{ route('hotspot.edit') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add
                </a>
            </div> --}}
            @if (session('thongbao'))
            <div class="alert alert-success">
                {!! session('thongbao') !!}
            </div>
            @endif
            @if (session('loi'))
            <div class="alert alert-danger">
                {{ session('loi') }}
            </div>
            @endif
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Ảnh (EN)</th>
                            <th style="width: 200px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($datas->total() > 0)
                        @foreach ($datas as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>
                                @if (!empty($item->photo))
                                <img src="{{asset('upload/images/'. $item->photo)}}" alt="logo" style="width: 150px">
                                @endif
                            </td>
                            <td>
                                @if (!empty($item->photo_en))
                                <img src="{{asset('upload/images/'. $item->photo_en)}}" alt="logo" style="width: 150px">
                                @endif
                            </td>
                            <td>
                                <div>
                                    <a class="btn btn-app btn-primary"
                                        href="{{route("hotspot.edit", ['id' => $item->id])}}"><i class="fa fa-edit"></i>
                                        Edit</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="9">Data not found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $datas->links('', ['type' => 0]) }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
<!--end content-->
<!-- js -->
@section('include-js')
<!-- DataTables -->
<script src="{{ asset('back-end/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('back-end/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
@endsection
@section('custom-js')
@endsection
<!-- end js-->
