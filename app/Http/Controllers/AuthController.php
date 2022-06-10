<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Captcha; 
use App\Models\AdminUser; 
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function register_auth() {
        return view('admin.auth.register');
    }
    function login_authenticator(Request $request) {
        $data = $request -> validate([
            'admin_email' => 'required|max:200',
            'admin_password' => 'required|max:200',
        ]);
        $data = $request -> all();
        if(Auth::attempt(['admin_email' => $request -> admin_email,'admin_password' => $request -> admin_password])) {
            
        }


    }
    function login_auth() {
        return view('admin.auth.login_auth');
    }
    function register(Request $request) {
        $this -> validatetion($request);
        $data = $request -> all();
        $admin = new AdminUser();
        $admin -> admin_email = $data['admin_email'];
        $admin -> admin_password = md5($data['admin_password']);
        $admin -> admin_name = $data['admin_name'];
        $admin -> admin_phone = $data['admin_phone'];
        $admin -> save();
        return redirect('/register-auth')->with('message', 'Đăng ký Auth thành công');
    }
    function validatetion($request) {
        return $this -> validate($request, [
            'admin_name' => 'required|max:200',
            'admin_phone' => 'required|max:200',
            'admin_email' => 'required|max:200',
            'admin_password' => 'required|max:200',
            'g-recaptcha-response' => new Captcha(), 	
        ]);
    }
}
