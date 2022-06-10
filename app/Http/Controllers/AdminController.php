<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite; 
use App\Models\Social;
use App\Models\Login;
use App\Rules\Captcha; 
use App\Models\AdminUser; 
use App\Models\AdminUserRole; 
use App\Models\Roles; 
use Illuminate\Support\Facades\Validator;
session_start();


class AdminController extends Controller
{
    function Authlogin() {
        $admin_id = session()-> get('admin_id');
        if($admin_id) {
            return redirect('/dashboard');
        }else {
            return redirect('/admin')-> send();
        }
    }
    function index() {
        return view('admin_login');
    }
    function show_dashboard(Request $request) {
        $this -> Authlogin();
        $session_id = $request -> session() ->get('admin_id');
        $user = AdminUser::where('id' , $session_id) -> get();
        $admin_roles = AdminUserRole::get();
        
        foreach($user as $u_key => $u_value) {
            foreach($admin_roles as $a_key => $a_value) {
                if($u_value -> id == $a_value -> admin_user_id) {
                    $roles = Roles::where('id', $a_value -> admin_user_id) -> get();
                    foreach($roles as $r_key => $r_value) {
                        if($r_value -> name == 'admin') {
                            
                            $request -> session() ->put('roles' ,$r_value -> name );
                        }else {
                            $request -> session() ->put('roles' ,$r_value -> name );
                        }
                    }
                }

            }
        }
        
        
        return view('admin.dashboard') ;
    }
    function dashboard(Request $request) {
        
      
        $data = $request->validate([
            'admin_email' => 'required',
            'admin_password' => 'required',
           'g-recaptcha-response' => new Captcha(), 	
        ]);

        $admin_email = $data['admin_email'] ;
        $admin_password =md5($data['admin_password']);
        $login = Login::where('admin_email', $admin_email) -> where('admin_password', $admin_password)->first();
     
  
        // $login_count = $login -> count();
        if($login) {
            $request -> session() -> put('admin_login', $login-> admin_name);
            $request -> session() -> put('admin_id', $login-> id);
            return redirect('/dashboard');
            
        }else {
            $request -> session() -> put('message', 'Email hoặc mật khẩu bị sai! Vui lòng nhập lại');
            return redirect('/admin');
        }
       
        
    }
    function logout(Request $request) {
        $this -> Authlogin();
        $request -> session() -> put('admin_login', null);
        $request -> session() -> put('admin_id', null);
        $request -> session() -> put('roles', null);
        return redirect('/admin');
    }

    // // Login facebook
    // function login_facebook(){
    //     return Socialite::driver('facebook')->redirect();
    // }

    // function callback_facebook(Request $request){
    //     $provider = Socialite::driver('facebook')->user();
    //     $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        
    //     if($account){
    //         $account_name = Login::where('id',$account->user_id)->first();
            
    //         $request ->session()->put('admin_login',$account_name->admin_name);
    //         $request ->session() ->put('admin_id',$account_name->id);
    //         return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    //     }else{

    //         $hieu = new Social([
    //             'provider_user_id' => $provider->getId(),
    //             'provider' => 'facebook'
    //         ]);

    //         $orang = Login::where('admin_email',$provider->getEmail())->first();

    //         if(!$orang){
    //             $orang = Login::create([
    //                 'admin_name' => $provider->getName(),
    //                 'admin_email' => $provider->getEmail(),
    //                 'admin_password' => '',
    //                 'admin_phone' => '',

    //             ]);
    //         }
    //         $hieu->login()->associate($orang);
    //         $hieu->save();
            
    //         $account_name = Login::where('id',$hieu->user_id)->first();
       
    //         $request ->session()->put('admin_login',$account_name->admin_name);
    //         $request ->session() ->put('admin_id',$account_name->admin_id);
        
    //         return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    //     } 
    // }


    // // Login Google     
    // public function login_google(){
    //     return Socialite::driver('google')->redirect();
    // }
    // public function callback_google(Request $request){
    //     $users = Socialite::driver('google')->stateless()->user(); 
     
    //     $authUser = $this->findOrCreateUser($users,'google');
      
    //     $account_name = Login::where('id',$authUser->user_id)->first();
        
    //     $request ->session()->put('admin_login',$account_name->admin_name);
    //     $request ->session() ->put('admin_id',$account_name->id);
    //     return redirect('/dashboard');
      
       
    // }
    // public function findOrCreateUser($users,$provider){
        
    //     $authUser = Social::where('provider_user_id', $users->id)->first();
        
    //     if($authUser){
    //         return $authUser;
    //     }else{
    //         $hieu = new Social([
    //             'provider_user_id' => $users->id,
    //             'provider' => strtoupper($provider)
    //         ]);
    
    //         $orang = Login::where('admin_email',$users->email)->first();
    
    //             if(!$orang){
    //                 $orang = Login::create([
    //                     'admin_name' => $users->name,
    //                     'admin_email' => $users->email,
    //                     'admin_password' => '',
    //                     'admin_phone' => '',
    //                 ]);
    //             }
    //         $hieu->login()->associate($orang);
    //         $hieu->save();
    //         return $hieu;
    //     }
      
        


    // }




}
