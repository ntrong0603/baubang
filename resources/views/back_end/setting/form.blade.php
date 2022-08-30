@extends('back_end.layout.index')
@section('title', 'Product')
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
        Cài đặt hệ thông
    </h1>
    <ol class="breadcrumb">
        <li><a href="./admin"><i class="fa fa-dashboard"></i>Trang chủ admin</a></li>
        <li>Cài đặt hệ thông</a></li>
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
                    <form role="form" action="{{ route('setting.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group @if ($errors->get('logo'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Logo</label>
                                @if (!empty(getSetting("logo")))
                                <img src="{{asset('upload/images/'. getSetting("logo"))}}" alt="logo"
                                    style="width: 150px">
                                @endif
                                <input type="file" name="logo" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên sản phẩm" value="{{ @getSetting("logo") }}">
                                @if ($errors->get('logo'))
                                @foreach ($errors->get('logo') as $error)
                                <span class="help-block">
                                    {{ $error }}
                                </span>
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group @if ($errors->get('company_name'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Tên dự án</label>
                                <input type="text" name="company_name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên sản phẩm" value="{{ getSetting("company_name") }}">
                                @if ($errors->get('company_name'))
                                @foreach ($errors->get('company_name') as $error)
                                <span class="help-block">
                                    {{ $error }}
                                </span>
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group @if ($errors->get('to_email'))
                            has-error
                            @endif">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="to_email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên hotspot" value="{{ getSetting("to_email") }}">
                                @if ($errors->get('to_email'))
                                @foreach ($errors->get('to_email') as $error)
                                <span class="help-block">
                                    {{ $error }}
                                </span>
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group @if ($errors->get('title'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên hotspot" value="{{ getSetting("title") }}">
                                @if ($errors->get('title'))
                                @foreach ($errors->get('title') as $error)
                                <span class="help-block">
                                    {{ $error }}
                                </span>
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group @if ($errors->get('keywork'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Keywork</label>
                                <input type="text" name="keywork" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên hotspot" value="{{ getSetting("keywork") }}">
                                @if ($errors->get('keywork'))
                                @foreach ($errors->get('keywork') as $error)
                                <span class="help-block">
                                    {{ $error }}
                                </span>
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group @if ($errors->get('description'))
                                has-error
                                @endif">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea class="form-control" id="editor2" name="description" rows="10"
                                    cols="80">{{ getSetting("description") }}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
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
@endsection
@section('custom-js')
@endsection
<!-- end js-->
