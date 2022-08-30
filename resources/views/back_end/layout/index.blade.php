<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="{{ asset('') }}">

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="canonical" href="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="">
    <meta name="keywords" content="" />
    <meta property="fb:admins" content="" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="" />
    <link rel="apple-touch-icon" href="">
    <link rel="alternate" hreflang="es" href="" />

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('back-end/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('back-end/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('back-end/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('back-end/select2/dist/css/select2.min.css')}}">
    @yield('include-style')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back-end/adminlte/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('back-end/adminlte/css/skins/_all-skins.min.css')}}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('back-end/css/style.css')}}">
    @yield('custom-style')
    <style>
        .content-header>h1 {
            margin: 0;
            font-size: 24px;
            text-transform: capitalize;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('back_end.layout.header')
        @include('back_end.layout.main-sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('back_end.layout.footer')
    </div>
    <script src="{{ asset('back-end/jquery/dist/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('back-end/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('back-end/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Slimscroll -->
    @yield('include-js')
    <script src="{{ asset('back-end/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{ asset('back-end/fastclick/lib/fastclick.js')}}"></script>
    <script src="{{asset('back-end/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('back-end/adminlte/js/adminlte.min.js')}}"></script>
    <script>
        $('.select2').select2()
    </script>
    @yield('custom-js')
    <!-- END Java Script for this page -->
</body>

</html>
