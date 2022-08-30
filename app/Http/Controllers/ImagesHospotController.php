<?php

namespace App\Http\Controllers;

use App\Model\ImagesHospotModel;
use Illuminate\Http\Request;

class ImagesHospotController extends Controller
{
    private $mImage;

    public function __construct()
    {
        $this->mImage = new ImagesHospotModel();
    }

    /**
     * View list info product
     * @param obj $request param send form user
     * @return view
     */
    public function index(Request $request)
    {
        $arrWhere =  $request->all();
        $datas = $this->mImage->gets([], $arrWhere, [["column" => "id", "value" => "ASC"]]);
        //add param in pagination
        $datas->appends($request->all());
        return view('back_end.hotspot.list', ['datas' => $datas, 'paramQuery' => $request->all()]);
    }

    /**
     * View form edit/add info product
     * @param obj $request param send form user
     * @return view
     */
    public function viewForm(Request $request)
    {
        if ($request->get('id')) {
            $item = $this->mImage->find($request->get('id'));
            if (empty($item)) {
                return redirect()->route('hotspot')->with('loi', 'Không tìm hotspot');;
            }
            return view('back_end.hotspot.form', ['item' => $item]);
        } else {
            return view('back_end.hotspot.form');
        }
    }

    /**
     * Created/Update info product
     * @param obj $request param send form user
     */
    public function save(Request $request)
    {
        if (!empty($request->id)) {
            $item = $this->mImage->find($request->get('id'));
        } else {
            $item = $this->mImage;
        }
        $request->validate([
            'name' => 'required',
        ]);
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
        $item->save();
        if (isset($request->id)) {
            return redirect(route('hotspot.edit', ['id' => $request->id]))->with('thongbao', 'Sửa thông tin thành công');
        } else {
            return redirect(route('hotspot.edit', ['id' => $item->id]))->with('thongbao', 'Thêm thông tin thành công');
        }
    }
}
