@extends('back_end.layout.index')
@section('title', 'Dashboard')
<!-- style -->
@section('include-style')

@endsection

@section('custom-style')

@endsection
<!--end style -->
<!-- content-->
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thống kê
    </h1>
    <ol class="breadcrumb">
        <li><a href="./admin"><i class="fa fa-dashboard"></i>Trang chủ admin</a></li>
        <li><a>Thống kê</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


    <!-- Main row -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Browser Usage</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- ./chart-responsive -->
                            <div id="canvas-holder">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="chart-area" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">

            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Orders</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listTop as $item)
                                <tr>
                                    <td><a href="{{route('product.edit', ['id' => $item->id])}}">{{$item->name}}</a>
                                    </td>
                                    <td>{{$item->view}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div>
                <!-- /.box-footer -->
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
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="{{ asset('back-end/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('back-end/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('back-end/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{asset('back-end/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('back-end/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('back-end/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('back-end/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
@endsection
@section('custom-js')
<script>
    $(function ()
    {
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++ ) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        @foreach($listProduct as $item)
                        {{$item->view}},
                        @endforeach
                    ],
                    backgroundColor: [
                        @foreach($listProduct as $item)
                        @if(!empty($item->color_chart))
                        "{{$item->color_chart}}",
                        @else
                        getRandomColor(),
                        @endif
                        @endforeach
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    @foreach($listProduct as $item)
                    '{{$item->name}}',
                    @endforeach
                ]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'right',
                },
                title: {
                    display: false,
                    text: 'Chart.js Doughnut Chart'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('chart-area').getContext('2d');
            window.myDoughnut = new Chart(ctx, config);
        };
    });

</script>
@endsection
<!-- end js-->
