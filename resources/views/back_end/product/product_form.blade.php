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
        Quản lý lô đất
        <small>Sửa thông tin lô đất</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="./admin"><i class="fa fa-dashboard"></i>Trang chủ admin</a></li>
        <li><a href="{{ route('product') }}">Quản lý lô đất</a></li>
        <li class="active">Sửa thông tin lô đất</li>
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
                    <form role="form" action="{{ route('product.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ @$item->id }}">
                        <input type="hidden" name="type" value="1">
                        <div class="box-body">
                            {{-- <div class="form-group @if ($errors->get('name_hotspot'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Tên hotspot</label>
                                <input type="text" name="name_hotspot" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên hotspot" value="{{ @$item->name_hotspot }}">
                                @if ($errors->get('name_hotspot'))
                                @foreach ($errors->get('name_hotspot') as $error)
                                <span class="help-block">
                                    {{ $error }}
                                </span>
                                @endforeach
                                @endif
                            </div> --}}
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
                            <div class="form-group @if ($errors->get('name_en'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Tên (EN)</label>
                                <input type="text" name="name_en" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên sản phẩm (EN)" value="{{ @$item->name_en }}">
                                @if ($errors->get('name_en'))
                                @foreach ($errors->get('name_en') as $error)
                                <span class="help-block">
                                    {{ $error }}
                                </span>
                                @endforeach
                                @endif
                            </div>
                            {{-- <div class="form-group @if ($errors->get('color_chart'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Màu hiển thị trên biểu đồ</label>
                                <input type="text" name="color_chart" class="form-control" id="exampleInputEmail1"
                                    placeholder="Example: #ffffff" value="{{ @$item->color_chart }}">
                                @if ($errors->get('color_chart'))
                                @foreach ($errors->get('color_chart') as $error)
                                <span class="help-block">
                                    {{ $error }}
                                </span>
                                @endforeach
                                @endif
                            </div> --}}
                            <div class="form-group @if ($errors->get('description'))
                            has-error
                            @endif">
                                <label for="exampleInputEmail1">Mô tả</label>
                                <textarea id="editor2" name="description" rows="10"
                                    cols="80">{{ @$item->description }}</textarea>
                            </div>
                            <div class="form-group @if ($errors->get('description_en'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Mô tả (EN)</label>
                                <textarea id="editor3" name="description_en" rows="10"
                                    cols="80">{{ @$item->description_en }}</textarea>
                            </div>
                            {{-- <div class="form-group @if ($errors->get('type'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Loại sản phẩm</label>
                                <select class="form-control select2" name="type" data-placeholder="Select a State"
                                    style="width: 100%;">
                                    <option value="0" @if (@$item->loaiduan == 0)
                                        selected
                                        @endif>Lô đất</option>
                                    <option value="1" @if (@$item->loaiduan == 1)
                                        selected
                                        @endif>Nhà xưởng xây sẵn</option>
                                </select>
                            </div>
                            <div class="form-group @if ($errors->get('status'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select class="form-control select2" name="status" data-placeholder="Select a State"
                                    style="width: 100%;">
                                    <option value="0" @if (@$item->status == 0)
                                        selected
                                        @endif>Còn trống</option>
                                    <option value="1" @if (@$item->status == 1)
                                        selected
                                        @endif>Đang giữ chỗ</option>
                                    <option value="2" @if (@$item->status == 2)
                                        selected
                                        @endif>Đã Cho thuê</option>
                                </select>
                            </div> --}}
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('product') }}" class="btn btn-default">Thoát</a>
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
