<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
session_start();
class CartController extends Controller
{
    function calculate_fee(Request $request) {
        $data= $request -> all();
        
        $feeship = Feeship::where('fee_matp' , $data['matp'])
        -> where('fee_maqh' ,$data['maqh']) 
        -> where('fee_xaid' ,$data['xaid']) 
        -> get();
        if($feeship == true) {
            $count_feeship = $feeship -> count();
            if($count_feeship > 0) {
                foreach($feeship as $key => $fee) {
                    $request-> session()->put('feeship', $fee->fee_feeship);
                }
            }else {
                $request-> session()->put('feeship', 50000);
            }
        }
        
    }
    function select_delivery_home(Request $request) {
        $data = $request -> all();
        if($data['action']) {
            $output = '';
            if($data['action'] == 'city') {
                $select_province = Province::where('matp' ,$data['ma_id']) -> get();
                $output.='<option>-- Chọn quận huyện--</option>';
                foreach($select_province as $key => $province) {
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }else {
                $select_wards = Wards::where('maqh',$data['ma_id']) -> get();
                $output.='<option>-- Chọn xã phường--</option>';
                foreach($select_wards as $key => $wards) {
                    $output.='<option value="'.$wards->xaid.'">'.$wards->name_phuongxa.'</option>';
                }
            }
        }
        return  $output;
    }
    function show_cart(Request $request) {
        $meta_desc = "Giỏ hàng-GoodGames";
        $meta_title = "Giỏ hàng-GoodGames-LapTop-PhuKien";
        $meta_keywords = "Giỏ hàng";
        $url_canonical = $request -> url();
        $city = City::orderBy('matp', 'ASC') -> get();
        return view('pages.cart.show-cart', compact('meta_desc', 'meta_title', 'meta_keywords', 'url_canonical', 'city'));
    }
    function save_cart(Request $requset) {
        $product_id = $requset ->product_hidden;
        $qty = $requset ->qty;
        
        $product = DB::table('tbl_product') -> where('id', $product_id) -> first();
       
        
        // Cart::add([ 'id' => $product -> id,
        //             'name' => $product-> product_name, 
        //             'qty' => $qty,
        //             'price' => $product -> product_price, 
        //             'options' => ['image' => $product -> product_image]  
        // ]);
        // return redirect('show-cart');
         return $requset->session()->flush();
     
       
        
    }

    function delete_cart(Request $request,  $sessionId) {
        $cart = $request -> session()-> get('cart');
        
        if($cart == true) {
        
            foreach($cart as $key => $value) {
                if($value['session_id'] == $sessionId ) {
                    unset($cart[$key]);
                }
            }
            $request -> session()-> put('cart', $cart);
            return redirect() -> back() -> with('message' , 'Xóa sản phẩm thành công');
        }else {
            return redirect() -> back() -> with('message' , 'Xóa sản phẩm thất bại');
        }
        
    }
    function update_cart(Request $request) {
        $data = $request -> get('qty');
        $cart = $request -> session() -> get('cart');
      
        if($cart == true) {
            foreach($data as $key => $qty) {
                foreach($cart as $session => $val) {
                    if($val['session_id'] == $key && $qty < $cart[$session]['product_quantity']) {
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            $request -> session()-> put('cart', $cart);
            return redirect() -> back() -> with('message' , 'Cập nhật sản phẩm thành công');
        }else {
            return redirect() -> back() -> with('message' , 'Cập nhật sản phẩm thất bại');
        }
        
    }  


    function add_cart_ajax(Request $request) {
        $data = $request ->all();
       $session_id = substr(md5(microtime()), rand(0, 26), 5);
       $cart = $request -> session()->get('cart');
       if($cart==true){
           $is_avaiable = 0;
           foreach($cart as $key => $val){
               if($val['product_id']==$data['cart_product_id']){
                   $is_avaiable++;
               }
           }
           if($is_avaiable == 0){
               $cart[] = array(
               'session_id' => $session_id,
               'product_name' => $data['cart_product_name'],
               'product_id' => $data['cart_product_id'],
               'product_image' => $data['cart_product_image'],
               'product_qty' => $data['cart_product_qty'],
               'product_price' => $data['cart_product_price'],
               'product_quantity' => $data['cart_product_quantity'],
               );
               $request->session()->put('cart',$cart);
           }
       }else{
           $cart[] = array(
               'session_id' => $session_id,
               'product_name' => $data['cart_product_name'],
               'product_id' => $data['cart_product_id'],
               'product_image' => $data['cart_product_image'],
               'product_qty' => $data['cart_product_qty'],
               'product_price' => $data['cart_product_price'],
               'product_quantity' => $data['cart_product_quantity'],
           );
           $request->session()->put('cart',$cart);
       }
      
    }
    function check_coupon(Request $request) {
        $data= $request ->all();
        $validation = $request ->validate([
            'coupon' => 'required',
        ],
        [
            'required' =>'Vui lòng nhập mã giảm giá',
            
        ]);
        $coupon = Coupon::where('coupon_code', $data['coupon'])-> first();
     

        if($coupon) {
            $count_coupon = $coupon -> count();
            if($count_coupon > 0) {
                $coupon_session = $request -> session()->all();
                
                if($coupon_session == true) {
                    $is_avaiable = 0;
                    if($is_avaiable == 0) {
                        $cou[] = array(
                            'coupon_code' => $coupon -> coupon_code,
                            'coupon_conditions' => $coupon -> coupon_conditions,
                            'coupon_options' => $coupon -> coupon_options,
                        );
                        $request -> session()-> put('coupon', $cou);
                    } 
                }else {
                    $cou[] = array(
                        'coupon_code' => $coupon -> coupon_code,
                        'coupon_conditions' => $coupon -> coupon_conditions,
                        'coupon_options' => $coupon -> coupon_options,
                    );
                    $request -> session()-> put('coupon', $cou);
                }
                return redirect() -> back() -> with('message' , 'Thêm mã giảm giá thành công');
            }
        }else {
                return redirect() -> back() -> with('message' , 'Mã giảm giá ko tồn tại, vui lòng nhập lại');
        }
    }
    function delete_coupon(Request $request) {
        $coupon = $request -> session()-> get('coupon');

        if($coupon){
            $request -> session()-> forget('coupon');
        }
        return redirect() -> back() -> with('message' , 'Xóa mã giảm giá thành công');
    }
}