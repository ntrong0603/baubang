<?php

namespace App\Http\Controllers;

use App\Model\ProductModel;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    private $mProduct;

    public function __construct()
    {
        $this->mProduct = new ProductModel();
    }
    public function index()
    {
        $arrCol = [
            "id",
            "name",
            "view",
        ];
        $arrWhere = [];
        $arrSort = [
            [
                "column" => "view",
                "value"  => "DESC",
            ],
        ];
        $limit = 10;
        $listTopView = $this->mProduct->gets($arrCol, $arrWhere, $arrSort, $limit, false);
        $listProduct = $this->mProduct->select(["view", "name", "color_chart"])->get();
        return view("back_end.dashboard.index", ['listTop' => $listTopView, 'listProduct' => $listProduct]);
    }
}
