@extends('back_end.layout.index')
@section('title', 'Edit thông tin sản phẩm')
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
        <small>Sửa thông tin hotspot</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="./admin"><i class="fa fa-dashboard"></i>Trang chủ admin</a></li>
        <li><a href="{{ route('hotspot') }}">Quản lý hotspot</a></li>
        <li class="active">Sửa thông tin hotspot</li>
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
                    <form role="form" action="{{ route('hotspot.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ @$item->id }}">
                        <div class="box-body">
                            <div class="form-group @if ($errors->get('name'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên" value="{{ @$item->name }}">
                                @if ($errors->get('name'))
                                @foreach ($errors->get('name') as $error)
                                <span class="help-block">
                                    {{ $error }}
                                </span>
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thumbnail:</label>
                                @if (!empty($item->photo))
                                <img src="{{asset('upload/images/'. $item->photo)}}" alt="logo" style="width: 150px">
                                @endif
                                <input type="file" name="photo" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thumbnail (EN):</label>
                                @if (!empty($item->photo_en))
                                <img src="{{asset('upload/images/'. $item->photo_en)}}" alt="logo" style="width: 150px">
                                @endif
                                <input type="file" name="photo_en" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('hotspot') }}" class="btn btn-default">Thoát</a>
                        </div>
                    </form>
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
<script src="{{ asset('back-end/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('custom-js')
<!-- CK Editor -->
<script>
    $(function () {
        CKEDITOR.replace('editor2',{
            filebrowserBrowseUrl: '{{ asset('/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('editor3',{
            filebrowserBrowseUrl: '{{ asset('/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    });
</script>
@endsection
<!-- end js-->
