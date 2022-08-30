<!DOCTYPE html>
<html>

<head>
    <title>{{getSetting("title")}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="description" content="{{getSetting("keywork")}}">
    <meta name="keywords" content="{{getSetting("description")}}" />
    <link rel="shortcut icon" type="{{ asset('upload/images/'. getSetting("logo"))}}" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-end/css/style.css')}}">
</head>

<body>
    <script src="{{ asset('front-end/tour.js')}}"></script>
    <div id="pano" style="width:100%;height:100%;">
        <noscript>
            <table style="width:100%;height:100%;">
                <tr style="vertical-align:middle;">
                    <td>
                        <div style="text-align:center;">ERROR:<br /><br />Javascript not activated<br /><br /></div>
                    </td>
                </tr>
            </table>
        </noscript>
        <script>
            embedpano({ swf: "{{ asset('front-end/tour.swf')}}", xml: "{{ asset('front-end/tour.xml')}}", target: "pano", html5: "auto", mobilescale: 1.0, passQueryParameters: true });
        </script>
    </div>
    <div id="btn-nav" class="show">
        <img src="{{ asset('front-end/images/angle-double-right-solid.svg')}}" alt="angle-double-right-solid.svg">
    </div>
    <nav class="show">
        <div class="logo-nav">
            <img src="{{ asset('upload/images/'. getSetting("logo"))}}" alt="Logo {{getSetting("title")}}">
        </div>
        <ul>
            <li class="dropdown">
                <a>{{ trans('all.tong_the_du_an') }}</a>
                <ul>
                    <li class="active" data-scene="scene_overview_1">
                        {{ trans('all.overview1') }}
                    </li>
                    <li data-scene="scene_overview_2">
                        {{ trans('all.overview2') }}
                    </li>
                    <li data-scene="scene_overview_3">
                        {{ trans('all.overview3') }}
                    </li>
                    <li data-scene="scene_cong_kcn_bau_bang">
                        {{ trans('all.truc_duong_chinh') }}
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a>{{ trans('all.san_pham') }}</a>
                <ul>
                    <li data-scene="scene_overview_3">{{ trans('all.dat_cong_nghiep_cho_thue') }}</li>
                    <li data-scene="scene_nha_may_bw_30m">{{ trans('all.nha_xuong_xay_san') }}</li>
                </ul>
            </li>
            <li class="dropdown">
                <a>{{ trans('all.tien_ich_noi_khu') }}</a>
                <ul>
                    <li data-scene="scene_td_bau_bang">{{ trans('all.tram_dien') }}</li>
                    <li data-scene="scene_dien_luc_evn">{{ trans('all.dien_luc_evn') }}</li>
                    <li data-scene="scene_nha_may_nuoc_sach_Biwase_15m">{{ trans('all.biwase') }}</li>
                    <li data-scene="scene_khu_xu_ly_nuoc_thai_bau_bang_30m">{{ trans('all.xlnt') }}</li>
                    <li data-scene="scene_nm_xlnt_mo_rong_30m">{{ trans('all.xlnt_mr') }}</li>
                    <li data-scene="scene_hai_quan_pccc_30m">{{ trans('all.hai_quan') }}</li>
                    <li data-scene="scene_hai_quan_pccc_30m">{{ trans('all.pccc') }}</li>
                    <li data-scene="scene_chot_bao_ve_kcn">{{ trans('all.chot_bv') }}</li>
                    <li data-info="trung_tam_hanh_chinh">{{ trans('all.tthc') }}</li>
                    <li data-scene="scene_dca">{{ trans('all.ca_bau_bang') }}</li>
                    <li class="dropdown dropdown-child show" data-hospot="">
                        <a>{{ trans('all.khu_tm') }}</a>
                        <ul>
                            <li data-scene="scene_cho_Bau_Bang_30m">{{ trans('all.cho_bau_bang') }}</li>
                            <li data-scene="scene_nha_o_cong_nhan_lai_hung_20m">{{ trans('all.nha_o_cn') }}</li>
                            <li data-scene="scene_nha_o_xa_hoi_lai_hung_30m">{{ trans('all.nha_o_xh') }}</li>
                            <li data-scene="scene_san_bong_lai_hung_20m">{{ trans('all.san_bong') }}</li>
                            <li data-scene="scene_vh_tdtt_60m">{{ trans('all.vh_tdtt') }}</li>
                            <li data-scene="scene_ttyt">{{ trans('all.y_te') }}</li>
                            <li data-scene="scene_VNTT">{{ trans('all.vntt') }}</li>
                            <li data-scene="scene_Buu_Dien_Bau_Bang">{{ trans('all.buu_dien') }}</li>
                            <li data-scene="scene_nha_hang_thuy_linh">{{ trans('all.nha_hang') }}</li>
                            <li data-scene="scene_viettel_post">{{ trans('all.viettel') }}</li>
                            <li data-scene="scene_truong_tieu_hoc_bau_bang">{{ trans('all.truong_hoc') }}</li>
                            <li data-info="ngan_hang">{{ trans('all.ngan_hang') }}</li>
                            <li data-info="van_phong_bql_kcn">{{ trans('all.van_phong_bql_kcn') }}</li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-child show" data-hospot="">
                        <a>{{ trans('all.nha_dau_trong_khu') }}</a>
                        <ul>
                            <li data-scene="scene_nm_kolon_60m">{{ trans('all.kolon') }}</li>
                            <li data-scene="scene_nm_paihong_15m">{{ trans('all.paihong') }}</li>
                            <li data-scene="scene_nm_polytex_30m">{{ trans('all.far_eastern') }}</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="btn-info" data-title="{{ trans('all.info') }}" style="display: none">
        <img src="{{ asset('front-end/images/i_info.png')}}" alt="icon info">
    </div>
    <div class="popup popup-desc">
        <div class="popup-info">
            <a class="popup-btn-close">
            </a>
            <div class="popup-title">
                <h1></h1>
                <a class="popup-btn-close">
                </a>
            </div>
            <div class="popup-content popup-desc-content">

            </div>
        </div>
    </div>
    <div class="master-plan active">
        <a class="btn-close-masterplan"></a>
        <ul id="action-masterplan">
            <li id="js-close-masterplan">
                <img src="{{ asset('front-end/images/i_master_plan1.png')}}" alt="">
            </li>
            <li id="js-fullview-masterplan">
                <img src="{{ asset('front-end/images/i_master_plan2.png')}}" alt="">
            </li>
        </ul>
        <div id="img-masterplan">
            <div style="position: relative">
                <img src="{{ asset('front-end/images/masterplan.jpg')}}" alt="so đồ tiện ích">
                <span class="masterplan-dot overview1 active"></span>
                <span class="masterplan-dot overview2"></span>
                <span class="masterplan-dot overview3"></span>
                <span class="masterplan-dot overview4"></span>
            </div>
        </div>
    </div>
    <div class="loading">
        <div class="loader">

        </div>
    </div>
    <div class="language">
        <ul>
            <li data-title="{{ trans('all.lang_vi') }}">
                <a href="{{route('changeLanguage', ["vi"])}}" class="vi
                    @if(Session::get('website_language') == 'vi') is-active
                    @endif "></a>
            </li>
            <li data-title="{{ trans('all.lang_en') }}">
                <a href=" {{route('changeLanguage', ["en"])}}"
                    class="en
                @if(empty(Session::get('website_language')) || Session::get('website_language') == 'en') is-active @endif "></a>
            </li>
            <li class="not-tooltip">
                <a class="btn-full-screen" id="show-masterplan">
                    <img src="{{asset('front-end/images/masterplan.png')}}" alt="full screen">
                </a>
            </li>
            <li data-title="{{ trans('all.exit') }}">
                <a href="{{ action('TourController@logout') }}" >
                    <img src="{{asset('front-end/images/door-open-solid.svg')}}" >
                </a>
            </li>

        </ul>
    </div>
</body>
@include('front_end.js')
<script>
    var urlGetInfo = " {{route('getData')}}";
    var urlGetList="{{route('getList')}}" ;
    var urlContact="{{route('contact.send')}}" ;
    var infoCustomer = "infoCustomer_{{(empty(Session::get('website_language')) || Session::get('website_language') == 'en') ? 'en' : 'vi'}}";
    var urlGetImage = "{{route('getImage')}}";
    var urlImage = "{{asset('upload/images/')}}";
</script>
<script src="{{ asset('front-end/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{ asset('front-end/js/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('front-end/js/main.js')}}"></script>
<script></script>

</html>
