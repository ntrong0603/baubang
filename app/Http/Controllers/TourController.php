<?php

namespace App\Http\Controllers;

use App\Model\ImagesHospotModel;
use App\Model\ProductModel;
use Illuminate\Http\Request;
use App\Model\UserModel;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    private $mProduct;
    private $mImage;

    public function __construct()
    {
        $this->mProduct = new ProductModel();
        $this->mImage = new ImagesHospotModel();
    }

    /**
     * Change language
     */
    public function changLanguage($language)
    {
        \Session::put("website_language", $language);
        \App::setLocale(\Session::get("website_language"));
        return redirect()->back();
    }

    /**
     * View list info product
     * @param obj $request param send form user
     * @return view
     */
    public function index(Request $request)
    {
        if (!empty(\Session::get("website_language"))) {
            \App::setLocale(\Session::get("website_language"));
        }
        return view('front_end.index');
    }

    /**
     * get info land
     * @param obj $request param send form user
     * @return json
     */
    public function getData(Request $request)
    {
        if ($request->get("name_hotspot")) {
            $item = $this->mProduct->select(["name_hotspot", "name", "description", "description_en"])->where("name_hotspot", $request->get("name_hotspot"))->first();
            if (!empty($item)) {
                $item->view = $item->view + 1;
                $item->save();
                if (\Session::get("website_language") == "vi") {
                    $item->description = $item->description;
                    $item->name        = $item->name;
                } else {
                    $item->description = $item->description_en;
                    $item->name        = $item->name_en;
                }
                return response()->json(['error' => 0, 'item' => $item]);
            }
        }
        return response()->json(['error' => 1]);
    }

    /**
     * get list product
     */
    public function getList()
    {
        $arrLoDatTrong     = $this->mProduct->select(["name_hotspot"])->where("status", 0)->get();
        $arrLoDatGiuCho    = $this->mProduct->select(["name_hotspot"])->where("status", 1)->get();
        $arrLoDatDaChoThue = $this->mProduct->select(["name_hotspot"])->where("status", 2)->get();

        $loDatTrong     = array();
        $loDatGiuCho    = array();
        $loDatDaChoThue = array();

        foreach ($arrLoDatTrong as $item) {
            $loDatTrong[] =  $item->name_hotspot;
        }

        foreach ($arrLoDatGiuCho as $item) {
            $loDatGiuCho[] =  $item->name_hotspot;
        }

        foreach ($arrLoDatDaChoThue as $item) {
            $loDatDaChoThue[] =  $item->name_hotspot;
        }
        return response()->json([
            'loDatTrong'     => $loDatTrong,
            'loDatDaChoThue' => $loDatDaChoThue,
            'loDatGiuCho'    => $loDatGiuCho,
        ]);
    }

    /**
     * get info land
     * @param obj $request param send form user
     * @return json
     */
    public function getImageHotspot(Request $request)
    {
        $datas = $this->mImage->select([
            "photo",
            "photo_en",
            "hotspot",
        ])->get();
        $result = array();
        if (!empty($datas)) {
            foreach ($datas as $item) {
                $result[$item->hotspot] = "";
                if (!empty($item->photo)) {
                    $result[$item->hotspot] = $item->photo;
                    if (\Session::get("website_language") == "en") {
                        $result[$item->hotspot] = $item->photo_en;
                    }
                } elseif (empty($item->photo) && !empty($item->photo_en)) {
                    $result[$item->hotspot] = $item->photo_en;
                }
            }
        }
        return response()->json($result);
    }

    public function loginView()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('front_end.login');
        }
    }

    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'username' => 'required',
                'password' => 'required|min:6|max:32'
            ],
            [
                'username.required' => 'Bạn chưa nhập tên tài khoản',
                'password.required' => 'Bạn chưa nhập password',
                'password.min' => 'Password tối thiểu 6 ký tự',
                'password.max' => 'Password tối đa 32 ký tự'
            ]
        );
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'active' => 1])) {
            if (Auth::user()->permission != 0) {
                if (!empty(Auth::user()->date_end)) {
                    $dateEndUser = strtotime(Auth::user()->date_end);
                    $today = strtotime(date("Y-m-d"));
                    if ($today <= $dateEndUser) {
                        return redirect('/');
                    }
                }
                Auth::logout();
                return redirect('/login')->with('thongbao', 'Tài khoản hết hạn');
            }
            return redirect('/');
        } else {
            return redirect('/login')->with('thongbao', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('/login');
        }
    }
}
