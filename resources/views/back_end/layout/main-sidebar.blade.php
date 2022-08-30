<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            {{-- <li class="{{ (explode('.',Request::route()->getName())[0] == 'dashboard' || explode('.',Request::route()->getName())[0] == '')  ? 'active' : ''}}">
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-circle-o"></i>Thống kê
            </a>
            </li> --}}
            {{-- <li class="{{ (explode('.',Request::route()->getName())[0] == 'contact') ? 'active' : ''}}">
            <a href="{{ route('contact') }}">
                <i class="fa fa-circle-o"></i>Quản lý liên hệ
            </a>
            </li> --}}
            <li class="{{ (explode('.',Request::route()->getName())[0] == 'product') ? 'active' : ''}}">
                <a href="{{ route('product') }}">
                    <i class="fa fa-circle-o"></i>Quản lý thông tin lô đất
                </a>
            </li>
            <li class="{{ (explode('.',Request::route()->getName())[0] == 'info') ? 'active' : ''}}">
                <a href="{{ route('info') }}">
                    <i class="fa fa-circle-o"></i>Quản lý info
                </a>
            </li>
            <li class="{{ (explode('.',Request::route()->getName())[0] == 'hotspot') ? 'active' : ''}}">
                <a href="{{ route('hotspot') }}">
                    <i class="fa fa-circle-o"></i>Quản lý ảnh tiện ích
                </a>
            </li>
            <li class="{{ (explode('.',Request::route()->getName())[0] == 'user') ? 'active' : ''}}">
                <a href="{{ route('user') }}">
                    <i class="fa fa-circle-o"></i>Quản lý tài khoản
                </a>
            </li>
            <li class="{{ (explode('.',Request::route()->getName())[0] == 'setting') ? 'active' : ''}}">
                <a href="{{ route('setting') }}">
                    <i class="fa fa-circle-o"></i>Cài đặt khác
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
