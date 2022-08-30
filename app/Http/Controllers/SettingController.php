<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->hasFile("logo")) {
                if (!empty(getSetting("logo"))) {
                    @unlink(public_path() . '/upload/images/' . getSetting("logo"));
                }
                // get image save $file
                $file = $request->file('logo');
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
                saveSetting(["code_setting" => "logo"], ["value" => $newNameHinh]);
            }

            saveSetting(["code_setting" => "company_name"], ["value" => $request->company_name]);
            saveSetting(["code_setting" => "to_email"], ["value" => $request->to_email]);
            saveSetting(["code_setting" => "title"], ["value" => $request->title]);
            saveSetting(["code_setting" => "keywork"], ["value" => $request->keywork]);
            saveSetting(["code_setting" => "description"], ["value" => $request->description]);

            return redirect(route('setting'))->with('thongbao', 'Sửa thông tin thành công');
        } else {
            return view("back_end.setting.form");
        }
    }
}
