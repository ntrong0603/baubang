<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Model\ContactModel;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $datas = (new ContactModel())->gets($request->all());
        //add param in pagination
        $datas->appends($request->all());

        return view("back_end.contact.index",  ['datas' => $datas, 'paramQuery' => $request->all()]);
    }
    public function delete($id)
    {
        $data = (new ContactModel())->find($id);
        if (empty($data)) {
            return redirect(route('contact'))->with('thongbao', 'Không tim thấy dữ liệu');
        }
        $data->delete();
        return redirect(route('contact'))->with('thongbao', 'Xóa thành công');
    }
    public function processContact(Request $request)
    {
        $result = [];
        $companyName = getSetting("company_name") ?? "Khu công nghiệp Nam Đình Vũ";
        $email = getSetting("to_email");
        if (empty($email)) {
            $result = [
                "error" => 1,
                "Messager" => "Not found email send to",
            ];
        } else {
            $rule = [
                'name'       => 'required|min:5|max:50',
                // 'profection' => 'required|min:5|max:50',/
                'email'      => 'required|min:8|email',
                'note'       => 'required',
                // 'phone'      => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            ];
            $request->validate($rule);
            $details = $request->all();
            $details["companyName"] = $companyName;
            try {
                $contact             = new ContactModel();
                $contact->name       = $request->name;
                $contact->profection = $request->profection;
                $contact->email      = $request->email;
                $contact->phone      = $request->phone;
                $contact->note       = $request->note;
                $contact->save();
                $result = Mail::to($email)->send(new ContactMail($details));
                $result = [
                    "error" => 0,
                    "Messager" => "Gửi thông tin thành cồng",
                ];
            } catch (\Exception $e) {
                $result = [
                    "error" => 1,
                    "Messager" => $e->getLine() . ": " . $e->getMessage(),
                ];
            }
        }
        return response()->json($result);
    }
}
