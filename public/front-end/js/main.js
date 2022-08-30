$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var krpano = document.getElementById("krpanoSWFObject");
var menu = $("nav");
var time = 5000;
var loading = $(".loading");
var idInfor = "";
var firstIntro = true;
var arrImagesHotspot = {};

function alretCustom(icon, title)
{
    Swal.fire({
        position: 'center-center',
        icon: icon,
        title: title,
        showConfirmButton: false,
        timer: 1500
    })
}
function loadSceneMenu(scene)
{
    krpano.call("loadscene(" + scene + ",null,MERGE,OPENBLEND(1.0, -0.5, 0.3, 0.8, linear))");

}
function looktoLocation(hotspot)
{
    krpano.call("loadscene(get(scene[0].name),null,MERGE,OPENBLEND(1.0, -0.5, 0.3, 0.8, linear));looktohotspot(" + hotspot + ");");
}

function getImage()
{
    $.ajax({
        url: urlGetImage,
        type: 'GET',
        data: {},
        success: function (result)
        {
            arrImagesHotspot = result;
        }
    });
}
function setHoverHotspot(hotspot, text = "")
{
    if (arrImagesHotspot[hotspot])
    {
        krpano.call("set(hotspot['" + hotspot + "'].onhover, showimage2('" + urlImage + "/" + arrImagesHotspot[hotspot] + "',hotspottextstyle))");
    } else
    {
        if (text != "")
        {
            krpano.call("set(hotspot['" + hotspot + "'].onhover, showtext('" + text + "',hotspottextstyle))");
        }
    }
}
function setTextHoverHotspot()
{
    if (firstIntro)
    {
        krpano.call("set(layer['introimage'].url,'%SWFPATH%/images/" + imageHotspot['intro'] + "');");
    }
    firstIntro = false;
    //Name scene
    krpano.call("set(scene['scene_overview_1'].title, '" + nameHotspot['overview1'] + "')");
    krpano.call("set(scene['scene_overview_1_3'].title, '" + nameHotspot['overview1'] + " (2)')");
    krpano.call("set(scene['scene_overview_2'].title, '" + nameHotspot['overview2'] + "')");
    krpano.call("set(scene['scene_overview_3'].title, '" + nameHotspot['overview3'] + "')");
    krpano.call("set(scene['scene_overview_3_2'].title, '" + nameHotspot['overview3'] + " 2')");
    krpano.call("set(scene['scene_overview_3_3'].title, '" + nameHotspot['overview3'] + " 3')");
    krpano.call("set(scene['scene_cho_Bau_Bang_30m'].title, '" + nameHotspot['cho_bau_bang'] + "')");
    krpano.call("set(scene['scene_ben_xe_15m'].title, '" + nameHotspot['bx_bau_bang'] + " 15m')");
    krpano.call("set(scene['scene_ben_xe_Bau_Bang'].title, '" + nameHotspot['bx_bau_bang'] + "')");
    krpano.call("set(scene['scene_hai_quan_pccc_30m'].title, '" + nameHotspot['hai_quan'] + '-' + nameHotspot['pccc'] + "')");
    krpano.call("set(scene['scene_hai_quan'].title, '" + nameHotspot['hai_quan'] + "')");
    krpano.call("set(scene['scene_PCCC'].title, '" + nameHotspot['pccc'] + "')");
    krpano.call("set(scene['scene_khu_xu_ly_nuoc_thai_bau_bang_30m'].title, '" + nameHotspot['xlnt'] + " 30m')");
    krpano.call("set(scene['scene_td_bau_bang'].title, '" + nameHotspot['tram_dien'] + "')");
    krpano.call("set(scene['scene_nm_kolon_60m'].title, '" + nameHotspot['kolon'] + " 60m')");
    krpano.call("set(scene['scene_nm_kolon_1'].title, '" + nameHotspot['kolon'] + " 1')");
    krpano.call("set(scene['scene_nm_kolon_2'].title, '" + nameHotspot['kolon'] + " 2')");
    krpano.call("set(scene['scene_nm_kolon_3'].title, '" + nameHotspot['kolon'] + " 3')");
    krpano.call("set(scene['scene_nm_kolon_20m'].title, '" + nameHotspot['kolon'] + " 20m')");
    krpano.call("set(scene['scene_nm_paihong_15m'].title, '" + nameHotspot['paihong'] + " 15m')");
    krpano.call("set(scene['scene_nm_paihong_30m'].title, '" + nameHotspot['paihong'] + " 30m')");
    krpano.call("set(scene['scene_nm_polytex_30m'].title, '" + nameHotspot['far_eastern'] + " 30m')");
    krpano.call("set(scene['scene_nm_polytex_100m'].title, '" + nameHotspot['far_eastern'] + " 100m')");
    krpano.call("set(scene['scene_nm_xlnt_mo_rong_30m'].title, '" + nameHotspot['xlnt_mr'] + " 30m')");
    krpano.call("set(scene['scene_Buu_Dien_Bau_Bang'].title, '" + nameHotspot['buu_dien'] + "')");
    krpano.call("set(scene['scene_dien_luc_evn_30m'].title, '" + nameHotspot['dien_luc_evn'] + " 30m')");
    krpano.call("set(scene['scene_dien_luc_evn'].title, '" + nameHotspot['dien_luc_evn'] + "')");
    krpano.call("set(scene['scene_nha_o_cong_nhan_5a_20m'].title, '" + nameHotspot['nha_o_cn'] + " 5A 20m')");
    krpano.call("set(scene['scene_nha_o_cong_nhan_5B_20m'].title, '" + nameHotspot['nha_o_cn'] + " 5B 20m')");
    krpano.call("set(scene['scene_nha_o_cong_nhan_5C_30m'].title, '" + nameHotspot['nha_o_cn'] + " 5C 30m')");
    krpano.call("set(scene['scene_nha_o_cong_nhan_lai_hung_20m'].title, '(Lai Hung) " + nameHotspot['nha_o_cn'] + " 20m')");
    krpano.call("set(scene['scene_nha_o_cong_nhan_Lai_Hung_2_20m'].title, '(Lai Hung)  " + nameHotspot['nha_o_cn'] + " 2 20m')");
    krpano.call("set(scene['scene_nha_o_cong_nhan_5d'].title, '" + nameHotspot['nha_o_cn'] + " 5D')");
    krpano.call("set(scene['scene_nha_o_cong_nhan_5e_20m'].title, '" + nameHotspot['nha_o_cn'] + " 5E 20m')");
    krpano.call("set(scene['scene_nha_o_cong_nhan_5F_20m'].title, '" + nameHotspot['nha_o_cn'] + " 5F 20m')");
    krpano.call("set(scene['scene_nha_o_xa_hoi_lai_hung_30m'].title, '(Lai Hung) " + nameHotspot['nha_o_xh'] + " 30m')");
    krpano.call("set(scene['scene_nha_o_xa_hoi_1'].title, '(Lai Hung) " + nameHotspot['nha_o_xh'] + " 1')");
    krpano.call("set(scene['scene_nha_o_xa_hoi_2'].title, '(Lai Hung) " + nameHotspot['nha_o_xh'] + " 2')");
    krpano.call("set(scene['scene_san_bong_lai_hung_20m'].title, '(Lai Hung) " + nameHotspot['san_bong'] + " 20m')");
    krpano.call("set(scene['scene_tram_xu_ly_nuoc_tho_60m'].title, '" + nameHotspot['tcn'] + " 60m')");
    krpano.call("set(scene['scene_tram_xu_ly_nuoc_tho_30m'].title, '" + nameHotspot['tcn'] + " 30m ')");
    krpano.call("set(scene['scene_tram_xu_ly_nuoc_tho_1'].title, '" + nameHotspot['tcn'] + " 1')");
    krpano.call("set(scene['scene_tram_xu_ly_nuoc_tho_2'].title, '" + nameHotspot['tcn'] + " 2')");
    krpano.call("set(scene['scene_nha_may_nuoc_sach_Biwase_15m'].title, '" + nameHotspot['biwase'] + " 15m')");
    krpano.call("set(scene['scene_sb_5d'].title, '" + nameHotspot['san_bong'] + " 5D')");
    krpano.call("set(scene['scene_VNTT'].title, '" + nameHotspot['vntt'] + "')");
    krpano.call("set(scene['scene_ttyt'].title, '" + nameHotspot['y_te'] + "')");
    krpano.call("set(scene['scene_td_5b'].title, '" + nameHotspot['tram_dien'] + " 5D')");
    krpano.call("set(scene['scene_vh_tdtt_60m'].title, '" + nameHotspot['vh_tdtt'] + " 60m')");
    krpano.call("set(scene['scene_vh_tdtt'].title, '" + nameHotspot['vh_tdtt'] + "')");
    krpano.call("set(scene['scene_nha_may_bw_30m'].title, '" + nameHotspot['nha_xuong_xay_san'] + " (30m)')");
    krpano.call("set(scene['scene_nha_may_bw_1'].title, '" + nameHotspot['nha_xuong_xay_san'] + " 1')");
    krpano.call("set(scene['scene_nha_may_bw_2'].title, '" + nameHotspot['nha_xuong_xay_san'] + " 2')");
    krpano.call("set(scene['scene_nha_may_bw_2'].title, '" + nameHotspot['nha_xuong_xay_san_office'] + "')");
    krpano.call("set(scene['scene_nha_may_bw_vp'].title, '" + nameHotspot['chot_bv'] + "')");
    krpano.call("set(scene['scene_dca'].title, '" + nameHotspot['ca_bau_bang'] + "')");
    krpano.call("set(scene['scene_truong_cap_3'].title, '" + nameHotspot['cap_3'] + "')");
    krpano.call("set(scene['scene_truong_tieu_hoc_bau_bang'].title, '" + nameHotspot['truong_tieu_hoc_bau_bang'] + "')");
    krpano.call("set(scene['scene_truong_tieu_hoc_kim_dong'].title, '" + nameHotspot['truong_tieu_hoc_kim_dong'] + "')");
    krpano.call("set(scene['scene_tmn_ad'].title, '" + nameHotspot['tmn_ad'] + "')");
    krpano.call("set(scene['scene_khu_xu_ly_nuoc_thai_bau_bang_30m'].title, '" + nameHotspot['xlnt2'] + " 30m')");
    krpano.call("set(scene['scene_nm_xlnt'].title, '" + nameHotspot['xlnt2'] + "')");
    krpano.call("set(scene['scene_shop_toc'].title, '" + nameHotspot['shop_toc'] + "')");
    krpano.call("set(scene['scene_buu_dien_dien_luc_evn'].title, '" + nameHotspot['buu_dien_dien_luc_evn'] + "')");
    krpano.call("set(scene['scene_viettel_post'].title, 'ViettelPost')");
    krpano.call("set(scene['scene_nha_hang_thuy_linh'].title, '" + nameHotspot['nha_hang_thuy_linh'] + "')");
    krpano.call("set(scene['scene_truc_duong_chinh_1'].title, '" + nameHotspot['truc_duong_chinh'] + " (1)')");
    krpano.call("set(scene['scene_truc_duong_chinh_2'].title, '" + nameHotspot['truc_duong_chinh'] + " (2)')");
    krpano.call("set(scene['scene_truc_duong_chinh_3'].title, '" + nameHotspot['truc_duong_chinh'] + " (3)')");
    krpano.call("set(scene['scene_truc_duong_chinh_4'].title, '" + nameHotspot['truc_duong_chinh'] + " (4)')");
    krpano.call("set(scene['scene_truc_duong_chinh_5'].title, '" + nameHotspot['truc_duong_chinh'] + " (5)')");
    krpano.call("set(scene['scene_cong_kcn_bau_bang'].title, '" + nameHotspot['cong_kcn_bau_bang'] + "')");

    //Hotspot
    setHoverHotspot('hotspot_overview_1', nameHotspot['overview1']);
    setHoverHotspot('hotspot_overview_1_3', nameHotspot['overview1'] + ' (2)');
    setHoverHotspot('hotspot_overview_2', nameHotspot['overview2']);
    setHoverHotspot('hotspot_overview_3', nameHotspot['overview3']);
    setHoverHotspot('hotspot_overview_3_2', nameHotspot['overview3'] + " 2");
    setHoverHotspot('hotspot_overview_3_3', nameHotspot['overview3'] + " 3");
    setHoverHotspot('hotspot_cho_Bau_Bang_30m', nameHotspot['cho_bau_bang']);
    setHoverHotspot('hotspot_ben_xe_15m', nameHotspot['bx_bau_bang'] + ' 15m');
    setHoverHotspot('hotspot_ben_xe_Bau_Bang', nameHotspot['bx_bau_bang']);
    setHoverHotspot('hotspot_hai_quan_pccc_30m', nameHotspot['hai_quan'] + '-' + nameHotspot['pccc']);
    setHoverHotspot('hotspot_hai_quan', nameHotspot['hai_quan']);
    setHoverHotspot('hotspot_PCCC', nameHotspot['pccc']);
    setHoverHotspot('hotspot_khu_xu_ly_nuoc_thai_bau_bang_30m', nameHotspot['xlnt'] + ' 30m');
    setHoverHotspot('hotspot_khu_xlnt_bau_bang', nameHotspot['xlnt']);
    setHoverHotspot('hotspot_td_bau_bang', nameHotspot['tram_dien']);
    setHoverHotspot('hotspot_nm_kolon_60m', nameHotspot['kolon'] + ' 60m');
    setHoverHotspot('hotspot_nm_kolon_1', nameHotspot['kolon'] + ' 1');
    setHoverHotspot('hotspot_nm_kolon_2', nameHotspot['kolon'] + ' 2');
    setHoverHotspot('hotspot_nm_kolon_3', nameHotspot['kolon'] + ' 3');
    setHoverHotspot('hotspot_nm_kolon_20m', nameHotspot['kolon'] + ' 20m');
    setHoverHotspot('hotspot_nm_paihong_15m', nameHotspot['paihong'] + ' 15m');
    setHoverHotspot('hotspot_nm_paihong_30m', nameHotspot['paihong'] + ' 30m');
    setHoverHotspot('hotspot_nm_polytex_30m', nameHotspot['far_eastern'] + ' 30m');
    setHoverHotspot('hotspot_nm_polytex_100m', nameHotspot['far_eastern'] + ' 100m');
    setHoverHotspot('hotspot_nm_xlnt_mo_rong_30m', nameHotspot['xlnt_mr'] + ' 30m');
    setHoverHotspot('hotspot_Buu_Dien_Bau_Bang', nameHotspot['buu_dien']);
    setHoverHotspot('hotspot_dien_luc_evn_30m', nameHotspot['buu_dien_dien_luc_evn']);
    setHoverHotspot('hotspot_dien_luc_evn', nameHotspot['dien_luc_evn']);
    setHoverHotspot('hotspot_nha_o_cong_nhan_5a_20m', nameHotspot['nha_o_cn'] + ' 5A 20m');
    setHoverHotspot('hotspot_nha_o_cong_nhan_5B_20m', nameHotspot['nha_o_cn'] + ' 5B 20m');
    setHoverHotspot('hotspot_nha_o_cong_nhan_5C_30m', nameHotspot['nha_o_cn'] + ' 5C 30m');
    setHoverHotspot('hotspot_nha_o_cong_nhan_lai_hung_20m', '(Lai Hung)' + nameHotspot['nha_o_cn'] + ' 20m');
    setHoverHotspot('hotspot_nha_o_cong_nhan_Lai_Hung_2_20m', '(Lai Hung) ' + nameHotspot['nha_o_cn'] + ' 2 20m');
    setHoverHotspot('hotspot_nha_o_cong_nhan_5d', nameHotspot['nha_o_cn'] + ' 5D');
    setHoverHotspot('hotspot_nha_o_cong_nhan_5e_20m', nameHotspot['nha_o_cn'] + ' 5E 20m');
    setHoverHotspot('hotspot_nha_o_cong_nhan_5F_20m', nameHotspot['nha_o_cn'] + ' 5F 20m');
    setHoverHotspot('hotspot_nha_o_xa_hoi_lai_hung_30m', '(Lai Hung)' + nameHotspot['nha_o_xh'] + ' 30m');
    setHoverHotspot('hotspot_nha_o_xa_hoi_1', '(Lai Hung)' + nameHotspot['nha_o_xh'] + ' 1');
    setHoverHotspot('hotspot_nha_o_xa_hoi_2', '(Lai Hung)' + nameHotspot['nha_o_xh'] + ' 2');
    setHoverHotspot('hotspot_san_bong_lai_hung_20m', '(Lai Hung)' + nameHotspot['san_bong'] + ' 20m');
    setHoverHotspot('hotspot_sb_5d', nameHotspot['san_bong'] + ' 5D');
    setHoverHotspot('hotspot_nha_may_nuoc_sach_Biwase_15m', nameHotspot['biwase'] + ' 15m');
    setHoverHotspot('hotspot_VNTT', nameHotspot['vntt']);
    setHoverHotspot('hotspot_ttyt', nameHotspot['y_te']);
    setHoverHotspot('hotspot_td_5b', nameHotspot['tram_dien'] + ' 5D');
    setHoverHotspot('hotspot_vh_tdtt_60m', nameHotspot['vh_tdtt'] + ' 60m');
    setHoverHotspot('hotspot_vh_tdtt', nameHotspot['vh_tdtt']);
    setHoverHotspot('hotspot_nha_may_bw_30m', nameHotspot['nha_xuong_xay_san'] + ' (30m)');
    setHoverHotspot('hotspot_nha_may_bw_1', nameHotspot['nha_xuong_xay_san'] + ' 1');
    setHoverHotspot('hotspot_nha_may_bw_2', nameHotspot['nha_xuong_xay_san'] + ' 2');
    setHoverHotspot('hotspot_nha_may_bw_vp', nameHotspot['nha_xuong_xay_san_office']);
    setHoverHotspot('hotspot_dca', nameHotspot['ca_bau_bang']);
    setHoverHotspot('hotspot_truong_cap_3', nameHotspot['cap_3']);
    setHoverHotspot('hotspot_truong_tieu_hoc_bau_bang', nameHotspot['truong_tieu_hoc_bau_bang']);
    setHoverHotspot('hotspot_truong_tieu_hoc_kim_dong', nameHotspot['truong_tieu_hoc_kim_dong']);
    setHoverHotspot('hotspot_tmn_ad', nameHotspot['tmn_ad']);
    setHoverHotspot('hotspot_khu_xu_ly_nuoc_thai_bau_bang_30m', nameHotspot['xlnt2'] + ' 30m ');
    setHoverHotspot('hotspot_nm_xlnt', nameHotspot['xlnt2']);
    setHoverHotspot('hotspot_ca_bau_bang', nameHotspot['ca_bau_bang']);
    setHoverHotspot('hotspot_nha_tre', nameHotspot['nha_tre']);
    setHoverHotspot('hotspot_trung_tam_hanh_chinh', nameHotspot['trung_tam_hanh_chinh']);
    setHoverHotspot('hotspot_nm_far_easter_gd_1', nameHotspot['nm_far_easter_gd_1']);
    setHoverHotspot('hotspot_tram_xu_ly_nuoc_tho_60m', nameHotspot['tcn'] + ' 60m');
    setHoverHotspot('hotspot_tram_xu_ly_nuoc_tho_30m', nameHotspot['tcn'] + ' 30m ');
    setHoverHotspot('hotspot_tram_xu_ly_nuoc_tho_1', nameHotspot['tcn'] + ' 1');
    setHoverHotspot('hotspot_tram_xu_ly_nuoc_tho_2', nameHotspot['tcn'] + ' 2');
    setHoverHotspot('hotspot_cong_kcn_bau_bang', nameHotspot['cong_kcn_bau_bang']);
    setHoverHotspot('hotspot_van_phong_bql_kcn', nameHotspot['van_phong_bql_kcn']);

    setHoverHotspot('hotspot_tdmr', nameHotspot['tdmr']);
    setHoverHotspot('hotspot_shop_toc', nameHotspot['shop_toc']);
    setHoverHotspot('hotspot_buu_dien_dien_luc_evn', nameHotspot['buu_dien_dien_luc_evn']);
    setHoverHotspot('hotspot_chot_bao_ve_kcn', nameHotspot['chot_bv']);
    setHoverHotspot('hotspot_nha_hang_thuy_linh', nameHotspot['nha_hang_thuy_linh']);
    setHoverHotspot('hotspot_ngan_hang', nameHotspot['ngan_hang']);
    setHoverHotspot('hotspot_van_phong_bql', nameHotspot['van_phong_bql']);
    setHoverHotspot('hotspot_viettel_post', 'ViettelPost');

    setHoverHotspot('hotspot_truc_duong_chinh_1', nameHotspot['truc_duong_chinh'] + ' (1)');
    setHoverHotspot('hotspot_truc_duong_chinh_2', nameHotspot['truc_duong_chinh'] + ' (2)');
    setHoverHotspot('hotspot_truc_duong_chinh_3', nameHotspot['truc_duong_chinh'] + ' (3)');
    setHoverHotspot('hotspot_truc_duong_chinh_4', nameHotspot['truc_duong_chinh'] + ' (4)');
    setHoverHotspot('hotspot_truc_duong_chinh_5', nameHotspot['truc_duong_chinh'] + ' (5)');

    //Hotspot image
    krpano.call("set(hotspot['hotspot_ql_13'].onhover, showtext('" + nameHotspot['ql_13'] + "',hotspottextstyle));");
    krpano.call("set(hotspot['hotspot_long_thanh'].onhover, showimage('" + imageHotspot['long_thanh'] + "',hotspottextstyle));");
    krpano.call("set(hotspot['hotspot_cat_lai'].onhover, showimage('" + imageHotspot['cang_cat_lai'] + "',hotspottextstyle));");
    krpano.call("set(hotspot['hotspot_hcm'].onhover, showimage('" + imageHotspot['hcm'] + "',hotspottextstyle));");
    krpano.call("set(hotspot['hotspot_tan_son_nhat'].onhover, showimage('" + imageHotspot['tan_son_nhat'] + "',hotspottextstyle));");

}

$("#btn-nav").on("click", function (e)
{
    if (menu.hasClass("show"))
    {
        menu.removeClass("show");
        $(this).removeClass("show");
    } else
    {
        menu.addClass("show");
        $(this).addClass("show");
    }
});

$(".dropdown li").click(function (e)
{
    if ($(this).hasClass("dropdown-child"))
    {
        return;
    }
    e.stopPropagation();
    if ($(this).data('scene'))
    {
        $(".active").each(function ()
        {
            $(this).removeClass("active");
        });
        $(this).addClass('active');
        loadSceneMenu($(this).data('scene'));
    }

    if ($(this).data('info'))
    {
        popupInfo($(this).data('info'));

    }

    if ($(this).data('hospot'))
    {
        var nameHotspot = $(this).data('hospot');
        $(".active").each(function ()
        {
            $(this).removeClass("active");
        });
        $(this).addClass('active');
        looktoLocation(nameHotspot);
        setTimeout(function ()
        {
            krpano.call("hotspot[" + nameHotspot + "].onclick()");
        }, 1500);
    }
    menu.removeClass("show");
    $("#btn-nav").removeClass("show");
});

$(".dropdown-child").click(function (e)
{
    e.stopPropagation();
    if ($(this).hasClass("show"))
    {
        $(this).removeClass("show");
    } else
    {
        $(this).addClass("show");
    }
});

function popupInfo(hotspot)
{
    var popup = $(".popup.popup-desc");
    var btn = $("#btn-info");
    if (!popup.hasClass("active"))
    {
        loading.css("display", "flex");
        $.ajax({
            url: urlGetInfo,
            type: 'GET',
            data: {
                name_hotspot: hotspot
            },
            success: function (result)
            {
                if (result.error == 0)
                {
                    // $(".popup-title h1").html(result.item.name_hotspot + " - " + result.item.name);
                    if (result.item.description != "" && result.item.description != null)
                    {
                        $(".popup-desc .popup-title h1").html(result.item.name);
                        $(".popup-desc .popup-content").html(result.item.description);
                        popup.addClass("active");
                    } else
                    {
                        $(".popup-desc .popup-title h1").html(result.item.name);
                        $(".popup-desc .popup-content").html("Not description");
                    }
                }
                loading.css("display", "none");
            }
        });
    }
}
function info(id = "")
{
    var popup = $(".popup-desc");
    var btn = $("#btn-info");
    idInfor = "";
    btn.hide();
    if (id != "")
    {
        idInfor = id;
        btn.show();
        popup.removeClass("active");
    }
}
$(".popup-content").click(function (e)
{
    e.stopPropagation();
});
$(".popup-btn-close").click(function ()
{
    $(".popup").removeClass("active");
});
$(".chat").click(function ()
{
    var popup = $(".popup-contact");
    if (popup.hasClass("active"))
    {
        popup.removeClass("active");
    } else
    {
        $(".popup").removeClass("active");
        popup.addClass("active");
    }
});
$("#btn-info").click(function (e)
{
    var popup = $(".popup-desc");
    if (popup.hasClass("active"))
    {
        popup.removeClass("active");
    } else
    {
        popupInfo(idInfor);
        $(".popup").removeClass("active");
        popup.addClass("active");
    }
});
function infoLodat(idInfor)
{
    var popup = $(".popup-desc");
    if (popup.hasClass("active"))
    {
        popup.removeClass("active");
    } else
    {
        popupInfo(idInfor);
        $(".popup").removeClass("active");
        popup.addClass("active");
    }
}
$(".popup-form-contact form").submit(function (e)
{
    e.preventDefault();
    e.stopPropagation();
    $(".form-group").removeClass("errors");
    $(".errors-desc").remove();
    loading.css("display", "flex");
    var data = {
        name: $("input[name='name']").val(),
        profection: $("input[name='profection']").val(),
        email: $("input[name='email']").val(),
        phone: $("input[name='phone']").val(),
        note: $("textarea[name='note']").val(),
    }
    $.ajax({
        url: urlContact,
        type: 'POST',
        data: data,
        success: function (result)
        {
            if (result.error == 1)
            {
                alretCustom("error", result.Messager);
            } else
            {
                alretCustom("success", "Gửi thông tin thành công");
            }
            loading.css("display", "none");
        },
        statusCode: {
            422: function (e)
            {
                $(".form-group").removeClass("errors");
                $(".errors-desc").remove();
                //errors
                //<span class="errors-desc"></span>
                $.each(e.responseJSON.errors, function (i, item)
                {
                    var iName = $("input[name='" + i + "']");
                    var parent = iName.parent().parent();
                    parent.removeClass("errors");
                    parent.addClass("errors");
                    for (var i = 0; i < item.length; i++)
                    {
                        iName.after('<span class="errors-desc">' + item[i] + '</span>');
                    }
                });
                loading.css("display", "none");
            }
        }
    });
});
$(".popup-form-contact form").on('reset', function (e)
{
    $(".form-group").removeClass("errors");
    $(".errors-desc").remove();
})
$(".popup-company, .popup-desc").click(function ()
{
    $(".popup").removeClass("active");
});
function hideElMobile()
{
    if (screen.width <= 768)
    {
        var masterplan = $(".master-plan");

        $("#btn-nav, nav").removeClass("show");
        masterplan.removeClass('active-big');
        masterplan.removeClass('active');
        krpano.call("removelayer(introimage)");
    }
}
$('#show-masterplan, #js-close-masterplan').on("click", function ()
{
    menu.removeClass("show");
    var masterplan = $(".master-plan");
    if (masterplan.hasClass('active'))
    {
        masterplan.removeClass('active-big');
        masterplan.removeClass('active');
    } else
    {
        masterplan.addClass('active');
    }
});

$("#js-fullview-masterplan").on("click", function ()
{
    menu.removeClass("show");
    var masterplan = $(".master-plan");
    if (masterplan.hasClass('active-big'))
    {
        masterplan.removeClass('active-big');
    } else
    {
        masterplan.addClass('active-big');
    }
});

$('.btn-close-masterplan').on("click", function ()
{
    menu.removeClass("show");
    var masterplan = $(".master-plan");
    if (masterplan.hasClass('active-big'))
    {
        masterplan.removeClass('active-big');
    } else
    {
        masterplan.addClass('active-big');
    }
});
window.onload = function ()
{
    hideElMobile();
};

window.onresize = function ()
{
    hideElMobile();
};
function activeMasterplane(view)
{
    let el = $("#img-masterplan").find("." + view);
    $("#img-masterplan").find("span").removeClass("active");
    el.addClass("active");
}
getImage();
