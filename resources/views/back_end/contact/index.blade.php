@extends('back_end.layout.index')
@section('title', 'Liên hệ')
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
        Quản lý liên hệ
        <small>Danh sách liên hệ</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="./admin"><i class="fa fa-dashboard"></i>Trang chủ admin</a></li>
        <li><a href="{{ route('contact') }}">Quản lý liên hệ</a></li>
        <li class="active">Danh sách liên hệ</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
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
                    <form action="" method="GET" class="product-sort">
                        <div class="product-sort_items">
                            <label for="">Tên khách hàng</label>
                            <input type="text" name="name" class="form-control" value="{{@$paramQuery['name']}}">
                        </div>
                        <div class="product-sort_items">
                            <label for="">Ngành nghề</label>
                            <input type="text" name="profection" class="form-control"
                                value="{{@$paramQuery['profection']}}">
                        </div>
                        <div class="product-sort_items">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="{{@$paramQuery['email']}}">
                        </div>
                        <div class="product-sort_items">
                            <label for="">Tỉnh, thành phố</label>
                            <input type="text" name="phone" class="form-control" value="{{@$paramQuery['phone']}}">
                        </div>
                        <div class="product-sort_items">
                            <label for=""></label>
                            <button type="submit" class="btn btn-primary" style="width: 50%; margin-bottom: -4px;">Tìm
                                kiếm</button>
                        </div>
                    </form>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Ngành nghề</th>
                                <th>Email</th>
                                <th>Tỉnh, thành phố</th>
                                <th>Ghi chú</th>
                                <th>Ngày gửi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($datas->total() > 0)
                            @foreach ($datas as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->profection}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->note}}</td>
                                <td>{{$item->created_date}}</td>
                                <td>
                                    <a href="{{ route('contact.delete', ['id' => $item->id]) }}"
                                        class="btn btn-danger btn-app "
                                        onclick="return confirm('Are you sure {{ $item->name }}?')">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
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
<script>
</script>
@endsection
<!-- end js-->
