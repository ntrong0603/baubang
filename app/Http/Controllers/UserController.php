<?php

/**
 * Controller UserController
 *
 * @package App\Http\Controllers
 * @subpackage UserController
 * @copyright Copyright (c) 2019 Le Trong!.
 * @author Le Trong <ntrong0603.dgt@gmail.com>
 */

namespace App\Http\Controllers;

use App\Model\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // $items = (new UserModel())->where('id', '<>', Auth::user()->id)->get();
        $items = (new UserModel())->get();
        return view('back_end.user.index', ['data' => $items]);
    }

    public function editView($id)
    {
        $item = (new UserModel())->find($id);
        return view('back_end.user.edit_user', ['item' => $item]);
    }

    public function addView()
    {
        return view('back_end.user.add_user');
    }

    public function save(Request $request)
    {
        //

        $rulesMessage = [
            'name.required'        => 'Nhập tên người dùng',
            'name.min'             => 'Tên tối thiểu 5 ký tự',
            'name.max'             => 'Tên tối đa 32 ký tự',
            'username.required'    => 'Nhập tên đăng nhập',
            'username.min'         => 'Tên đăng nhập tối thiểu 6 ký tự',
            'username.max'         => 'Tên đăng nhập tối đa 32 ký tự',
            'password.required'    => 'Nhập mật  khẩu',
            'password.min'         => 'Mật khẩu tối thiểu 5 ký tự',
            'password.max'         => 'Mật khẩu tối đa 32 ký tự',
            're_password.required' => 'Nhập lại mật khẩu',
            're_password.same'     => 'Mật khẩu không trùng',
            'email.required'       => 'Nhập email',
            'email.min'            => 'Email tối thiểu 12 ký tự',
            'email.email'          => 'Ví dụ example@gmail.com'
        ];
        if (isset($request->id)) {
            $request->session()->forget('data_post_user');
            $item = (new UserModel())->find($request->id);
            $rules = [
                'name'     => 'required|min:5|max:32',
                'username' => 'required|min:5|max:32',
                'email'    => 'required|min:12|email'
            ];
            if (isset($request->password) && !empty($request->password)) {
                $rules['password']    = 'min:6|max:32';
                $rules['re_password'] = 'same:password';
            }
        } else {
            $item = new UserModel();
            session(['data_post_user' => $request->all()]);
            $rules = [
                'name'        => 'required|min:5|max:32',
                'username'    => 'required|min:5|max:32',
                'password'    => 'required|min:6|max:32',
                're_password' => 'required|same:password',
                'email'       => 'required|min:12|email'
            ];
        }

        $this->validate(
            $request,
            $rules,
            $rulesMessage
        );

        $item->name = $request->name;
        $item->username = $request->username;
        $item->email = $request->email;
        $item->date_end = $request->date_end;
        if (!empty($request->password)) {
            $item->password = bcrypt($request->password);
        }
        // $item->active = ($request->active == 'on') ? 1 : 0;
        // $item->id_user_update = Auth::user()->id;
        // $item->user_update = Auth::user()->name;
        $item->save();
        if (isset($request->id)) {
            $request->session()->forget('data_post_user');
            return redirect(route('user.view_edit', ['id' => $request->id]))->with('thongbao', 'Sửa thông tin thành công');
        } else {
            $request->session()->forget('data_post_user');
            return redirect(route('user'))->with('thongbao', 'Thêm thông tin thành công');
        }
    }

    public function setActiveOrHighlights($action, $id)
    {
        if ($action == 'active') {
            $item = (new UserModel())->find($id);
            $item->active = !$item->active;
            $item->save();
        }
        return redirect(route('user'))->with('thongbao', 'Thay đổi thông tin thành công');
    }

    public function delete($id)
    {
        $item = (new UserModel())->find($id);
        $item->delete();
        return redirect(route('user'))->with('thongbao', 'Xóa "' . $item->name . '" thành công');
    }

    public function loginView()
    {
        if (Auth::check()) {
            return redirect('admin/');
        } else {
            return view('back_end.layout.login');
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
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'permission' => 0])) {
            return redirect('admin/');
        } else {
            return redirect('admin/login')->with('thongbao', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('admin/login');
        }
    }
}
