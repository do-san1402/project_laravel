<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite; 
use App\Models\Social;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Login facebook
    function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    function callback_facebook(Request $request){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
       
        if($account){
            $account_name = User::where('id',$account->user_id)->first();
            
            $request ->session()->put('user_login',$account_name->name);
            $request ->session() ->put('user_id',$account_name->id);
            return redirect('/');
        }else{

            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = User::where('email',$provider->getEmail())->first();
            

            if(!$orang){
                $orang = User::create([
                    'name' => $provider->getName(),
                    'email' => $provider->getEmail(),
                    'password' => '',
                    'phone' => '',

                ]);
            }
            $hieu->login()->associate($orang);
            $hieu->save();
            
            $account_name = User::where('id',$hieu->user_id)->first();
       
            $request ->session()->put('user_login',$account_name->name);
            $request ->session() ->put('user_id',$account_name->id);
        
            return redirect('/');
        } 
    }



     // ============Login Google==========
    public function login_google(){
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(Request $request){
        $users = Socialite::driver('google')->stateless()->user(); 
     
        $authUser = $this->findOrCreateUser($users,'google');
      
        $account_name = User::where('id',$authUser->user_id)->first();
        
        $request ->session()->put('user_login',$account_name->name);
        $request ->session() ->put('user_id',$account_name->id);
        return redirect('/');
      
       
    }
    public function findOrCreateUser($users,$provider){
        
        $authUser = Social::where('provider_user_id', $users->id)->first();
        
        if($authUser){
            return $authUser;
        }else{
            $hieu = new Social([
                'provider_user_id' => $users->id,
                'provider' => strtoupper($provider)
            ]);
    
            $orang = User::where('email',$users->email)->first();
    
                if(!$orang){
                    $orang = User::create([
                        'name' => $users->name,
                        'email' => $users->email,
                        'password' => '',
                        'phone' => '',
                    ]);
                }
            $hieu->login()->associate($orang);
            $hieu->save();
            return $hieu;
        }
    }
    function logout_user(Request $request) {
        $request -> session() -> put('user_login', null);
        $request -> session() -> put('user_id', null);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
