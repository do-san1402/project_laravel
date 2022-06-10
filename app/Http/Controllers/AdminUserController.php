<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\Roles;

class AdminUserController extends Controller
{
    function index() {
        $admin = AdminUser::with('roles') -> orderBy('id' , 'DESC') -> paginate(5);
        return view('admin.user.all_user', compact('admin'));
    }
    function assign_roles(Request $request) {
        $session_id = $request -> session() ->get('admin_id');
        $session_roles = $request -> session() ->get('roles');
        if($session_id == $request -> admin_id && $session_roles != 'admin') {
            return redirect() -> back() -> with('message_all' , 'Bạn không phân quyền chính mình');
        }
        $data = $request -> all();
        $user = AdminUser::where('admin_email', $data['admin_email']) -> first();
        $user -> roles() -> detach();
        if($request->author_role) {
            $user -> roles() ->attach(Roles::where('name' , 'author')-> first());
        }
        if($request->admin_role) {
            $user -> roles() ->attach(Roles::where('name' , 'admin')-> first());
        }
        if($request->user_role) {
            $user -> roles() ->attach(Roles::where('name' , 'user')-> first());
        }
        return redirect() -> back() -> with('message_all' , 'Cấp quyền thành công');
    }
    function delete_user_roles($id, Request $request) {
        $session_id = $request -> session() ->get('admin_id');
        
        if($session_id == $id) {
            return redirect() -> back() -> with('message_all' , 'Bạn không được xóa chính mình');
        }else {
            $admin = AdminUser::find($id);
            if($admin) {
                $admin->roles() -> detach();
                $admin -> delete();
                return redirect() -> back() -> with('message_all' , 'Xóa người dùng thành công');

            }
        }
    }
    function store_users() {
        return view('admin.user.add_user');
    }
    function add_user(Request $request) {
        $validation = $request ->validate([
            'admin_name' => 'required',
            'admin_email' =>'required|email',
            'admin_phone' => 'required',
            'admin_password' => 'required'
        ],
        [
            'required' =>'Trường :attribute không được để trống',
            'email' =>'Vui lòng nhập đúng định dang Email',
        ],
        [
            'admin_name' =>'tên user',
            'admin_email' => 'Email',
            'admin_phone' => "Số điện thoại",
            'admin_password' => 'Password'
        ]
        );
        
        $data = $request -> all();
        $user = new AdminUser();
        $user -> admin_email = $data['admin_email'];
        $user -> admin_password = $data['admin_password'];
        $user -> admin_name = $data['admin_name'];
        $user -> admin_phone = md5($data['admin_phone']);
        $user -> save();
        $add_roles  =  $user -> roles() -> attach(Roles::where('name', 'user')-> first());
        if($add_roles) {
            $request -> session() -> put('message_success', 'Thêm User thành công');
            return redirect('/store-users');
        }else {
            $request -> session() -> put('message_success', 'Thêm user không thành công');
            return redirect('/store-users');
        }
    }
}
