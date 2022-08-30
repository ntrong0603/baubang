@extends('back_end.layout.index')
@section('title', 'User')
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
        Quản lý user
        <small>Danh sách user</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="./admin"><i class="fa fa-dashboard"></i>Trang chủ admin</a></li>
        <li><a href="{{ route('user') }}">Quản lý user</a></li>
        <li class="active">Danh sách user</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('user.view_add') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
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
                                <th>Tên user</th>
                                <th>Email</th>
                                <th>Hiển Thị</th>
                                <th style="width: 200px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) == 0)
                            <tr>
                                <td colspan="5" align="center"
                                    style="font-weight: bold; font-size: 20px; color: #cccccc;">Not Data</td>
                            </tr>
                            @else
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{  $item->email }}</td>
                                <td class="no-sort">
                                    @if ($item->active == 1)
                                    <a href="{{ action('UserController@setActiveOrHighlights', ['action'=>'active','id' => $item->id]) }}"
                                        title="" alt="" class="active">Active</a>
                                    @else
                                    <a href="{{ action('UserController@setActiveOrHighlights', ['action'=>'active','id' => $item->id]) }}"
                                        title="" alt="" class="no-active">Lock</a>
                                    @endif</td>
                                <td class="no-sort ">
                                    <a href="{{ route('user.view_edit', ['id' => $item->id]) }}"
                                        class="btn btn-app btn-primary">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('user.delete', ['id' => $item->id]) }}"
                                        class="btn btn-danger btn-app "
                                        onclick="return confirm('Are you sure {{ $item->name }}?')">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
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
