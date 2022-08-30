<?php

namespace App\Http\Controllers;

use App\Model\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    private $mProduct;

    public function __construct()
    {
        $this->mProduct = new ProductModel();
    }

    /**
     * View list info product
     * @param obj $request param send form user
     * @return view
     */
    public function index(Request $request)
    {
        $arrWhere =  $request->all();
        $arrWhere['type'] = 0;
        $listProduct = $this->mProduct->gets([], $arrWhere, [["column" => "id", "value" => "ASC"]]);
        //add param in pagination
        $listProduct->appends($request->all());
        return view('back_end.info.product_list', ['listProduct' => $listProduct, 'paramQuery' => $request->all()]);
    }

    /**
     * View list info product
     * @param obj $request param send form user
     * @return view
     */
    public function indexProduct(Request $request)
    {
        $arrWhere =  $request->all();
        $arrWhere['type'] = 1;
        $listProduct = $this->mProduct->gets([], $arrWhere, [["column" => "id", "value" => "ASC"]]);
        //add param in pagination
        $listProduct->appends($request->all());
        return view('back_end.product.product_list', ['listProduct' => $listProduct, 'paramQuery' => $request->all()]);
    }

    /**
     * View form edit/add info product
     * @param obj $request param send form user
     * @return view
     */
    public function viewForm(Request $request)
    {
        if ($request->get('id')) {
            $item = $this->mProduct->find($request->get('id'));
            if (empty($item)) {
                return redirect()->route('product')->with('loi', 'Không tìm sản phẩm');;
            }
            return view('back_end.product.product_form', ['item' => $item]);
        } else {
            return view('back_end.product.product_form');
        }
    }

    /**
     * View form edit/add info product
     * @param obj $request param send form user
     * @return view
     */
    public function viewFormInfo(Request $request)
    {
        if ($request->get('id')) {
            $item = $this->mProduct->find($request->get('id'));
            if (empty($item)) {
                return redirect()->route('info')->with('loi', 'Không tìm sản phẩm');;
            }
            return view('back_end.info.product_form', ['item' => $item]);
        } else {
            return view('back_end.info.product_form');
        }
    }

    /**
     * Created/Update info product
     * @param obj $request param send form user
     */
    public function save(Request $request)
    {
        if (!empty($request->id)) {
            $item = $this->mProduct->find($request->get('id'));
        } else {
            $item = $this->mProduct;
        }
        $request->validate([
            'name' => 'required',
        ]);
        // $item->name_hotspot        = $request->name_hotspot;
        $item->name                = $request->name;
        if ($request->hasFile("photo")) {
            if (!empty(getSetting("photo"))) {
                @unlink(public_path() . '/upload/images/' . getSetting("photo"));
            }
            // get image save $file
            $file = $request->file('photo');
            //get type images
            $fileType = $file->getClientOriginalExtension();
            $arrType = array('JPG', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG', 'svg', 'SVG');
            if (!in_array($fileType, $arrType)) {
                return redirect(route('setting'))->with('loi', 'Bạn chỉ được chọn file có đuôi: JPG, jpg, jpeg, JPEG, png, PNG, svg, SVG');
            }
            $newNameHinh = time() . "_." . $fileType;
            // kiểm tra lại nếu tên random còn trùng
            while (file_exists("upload/images/" . $newNameHinh)) {
                $newNameHinh = time() . "_." . $fileType;
            }
            $file->move("upload/images", $newNameHinh);
            $item->photo = $newNameHinh;
        }
        if ($request->hasFile("photo_en")) {
            if (!empty(getSetting("photo_en"))) {
                @unlink(public_path() . '/upload/images/' . getSetting("photo_en"));
            }
            // get image save $file
            $file = $request->file('photo_en');
            //get type images
            $fileType = $file->getClientOriginalExtension();
            $arrType = array('JPG', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG', 'svg', 'SVG');
            if (!in_array($fileType, $arrType)) {
                return redirect(route('setting'))->with('loi', 'Bạn chỉ được chọn file có đuôi: JPG, jpg, jpeg, JPEG, png, PNG, svg, SVG');
            }
            $newNameHinh = time() . "_." . $fileType;
            // kiểm tra lại nếu tên random còn trùng
            while (file_exists("upload/images/" . $newNameHinh)) {
                $newNameHinh = time() . "_." . $fileType;
            }
            $file->move("upload/images", $newNameHinh);
            $item->photo_en = $newNameHinh;
        }
        $item->type                = $request->type;
        $item->name_en             = $request->name_en ?? $request->name;
        $item->description         = $request->description ?? '';
        $item->description_en      = $request->description_en ?? '';
        $item->save();
        if (isset($request->id)) {
            return redirect(route('product.edit', ['id' => $request->id]))->with('thongbao', 'Sửa thông tin thành công');
        } else {
            return redirect(route('product.edit', ['id' => $item->id]))->with('thongbao', 'Thêm thông tin thành công');
        }
    }

    /**
     * Created/Update info product
     * @param obj $request param send form user
     */
    public function saveInfo(Request $request)
    {
        if (!empty($request->id)) {
            $item = $this->mProduct->find($request->get('id'));
        } else {
            $item = $this->mProduct;
        }
        $request->validate([
            'name' => 'required',
        ]);
        // $item->name_hotspot        = $request->name_hotspot;
        $item->name                = $request->name;
        // if ($request->hasFile("photo")) {
        //     if (!empty(getSetting("photo"))) {
        //         @unlink(public_path() . '/upload/images/' . getSetting("photo"));
        //     }
        //     // get image save $file
        //     $file = $request->file('photo');
        //     //get type images
        //     $fileType = $file->getClientOriginalExtension();
        //     $arrType = array('JPG', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG', 'svg', 'SVG');
        //     if (!in_array($fileType, $arrType)) {
        //         return redirect(route('setting'))->with('loi', 'Bạn chỉ được chọn file có đuôi: JPG, jpg, jpeg, JPEG, png, PNG, svg, SVG');
        //     }
        //     $newNameHinh = time() . "_." . $fileType;
        //     // kiểm tra lại nếu tên random còn trùng
        //     while (file_exists("upload/images/" . $newNameHinh)) {
        //         $newNameHinh = time() . "_." . $fileType;
        //     }
        //     $file->move("upload/images", $newNameHinh);
        //     $item->photo = $newNameHinh;
        // }
        // if ($request->hasFile("photo_en")) {
        //     if (!empty(getSetting("photo_en"))) {
        //         @unlink(public_path() . '/upload/images/' . getSetting("photo_en"));
        //     }
        //     // get image save $file
        //     $file = $request->file('photo_en');
        //     //get type images
        //     $fileType = $file->getClientOriginalExtension();
        //     $arrType = array('JPG', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG', 'svg', 'SVG');
        //     if (!in_array($fileType, $arrType)) {
        //         return redirect(route('setting'))->with('loi', 'Bạn chỉ được chọn file có đuôi: JPG, jpg, jpeg, JPEG, png, PNG, svg, SVG');
        //     }
        //     $newNameHinh = time() . "_." . $fileType;
        //     // kiểm tra lại nếu tên random còn trùng
        //     while (file_exists("upload/images/" . $newNameHinh)) {
        //         $newNameHinh = time() . "_." . $fileType;
        //     }
        //     $file->move("upload/images", $newNameHinh);
        //     $item->photo_en = $newNameHinh;
        // }
        $item->type                = $request->type;
        $item->name_en             = $request->name_en ?? $request->name;
        $item->description         = $request->description ?? '';
        $item->description_en      = $request->description_en ?? '';
        $item->save();
        if (isset($request->id)) {
            return redirect(route('info.edit', ['id' => $request->id]))->with('thongbao', 'Sửa thông tin thành công');
        } else {
            return redirect(route('info.edit', ['id' => $item->id]))->with('thongbao', 'Thêm thông tin thành công');
        }
    }
}
