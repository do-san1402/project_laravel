<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\OrderDetails;
use App\Models\Order;


class CheckoutController extends Controller
{
    function confim_order(Request $request) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $data = $request -> all();
        $shipping = new Shipping();
        $shipping -> customer_id  =Auth::id();
        $shipping -> name_shipping =$data['name_shipping'];
        $shipping -> email_shipping =$data['email_shipping'];
        $shipping -> phone_shipping =$data['phone_shipping'];
        $shipping -> notes_shipping =$data['notes_shipping'];
        $shipping -> shopping_method =$data['order_method'];
        $shipping -> address_shipping =$data['order_method'];
        $shipping -> save();
        $shipping_id = $shipping ->id;
        $order_code = substr(md5(microtime()), rand(0, 26), 5);
        $order = new Order();
        $order -> customer_id  =Auth::id();
        $order -> shipping_id  = $shipping_id;
        $order -> order_status  = 1;
        $order -> order_code  = $order_code;
        $order ->save();
        $order_id = $order -> id;
        if($request -> session() -> get('cart')) {
            $list_cart = $request -> session() -> get('cart');
            foreach($list_cart as $key => $cart) {
                $order_detail = new OrderDetails();
                $order_detail -> order_code = $order_code;
                $order_detail -> order_id = $order_id;
                $order_detail -> product_id = $cart['product_id'];
                $order_detail -> product_name = $cart['product_name'];
                $order_detail -> product_price = $cart['product_price'];
                $order_detail -> product_coupon = $data['order_coupon'];
                $order_detail -> product_feeship = $data['order_fee'];
                $order_detail -> product_sales_qty = $cart['product_qty'];
                $order_detail -> save();
            }
        }
        $request->session()->forget('cart');
        $request->session()->forget('coupon');
        $request->session()->forget('feeship');
    }   
    function login_checkout(Request $request) {
        $meta_desc = "Thanh Toán-GoodGames";
        $meta_title = "Thanh Toán-GoodGames-LapTop-PhuKien";
        $meta_keywords = "Thanh toán";
        $url_canonical = $request -> url();
        $city = City::orderBy('matp', 'ASC') -> get();
        return view('pages.checkout.login_checkout' , compact('meta_desc', 'meta_title', 'meta_keywords', 'url_canonical', 'city'));
    }
    function save_order_customer(Request $request) {
        if(Auth::user()) {
            // Insert data shipping
            $data = [
                'name_shipping' => $request ->name_shipping,
                'email_shipping' => $request ->email_shipping,
                'phone_shipping' => $request ->phone_shipping,
                'city_shipping' => $request ->city_shipping,
                'address_shipping' => $request ->address_shipping,
                'notes_shipping' => $request ->notes_shipping,
                'customer_id' => Auth::id(),
                'created_at' => Carbon::now(), 
            ];
            $shipping_id = DB::table('tbl_shipping') -> insertGetId($data);
            $request->session()->put('shipping_id' ,$shipping_id);
        
             // Insert data payment
            $data_payment = [
                'payment_method' => $request ->payment_option,
                'payment_status' => 'Đang chờ xử lý',
            ];
            $payment_id = DB::table('tbl_payment') -> insertGetId($data_payment);
           
            // Insert data order
            $data_order  = [
                'customer_id' => Auth::id(),
                'shipping_id' => $shipping_id,
                'payment_id' => $payment_id,
                'order_status' => 'Đang chờ xử lý',
                'order_total' => Cart::total(0,'', ''),
                'created_at' => Carbon::now(), 
            ];
            $order_id = DB::table('tbl_order') -> insertGetId($data_order);

            // Insert data detail order
            $content = Cart::content(); 
            foreach($content as $v_content) {
                $data_detail_order = [
                    'order_id' => $order_id,
                    'product_id' => $v_content -> id,
                    'product_name' => $v_content -> name,
                    'product_price' => $v_content -> price,
                    'product_sales_qty' => $v_content -> qty,
                    'created_at' => Carbon::now(), 
                ];
                $result = DB::table('tbl_order_detail') -> insert($data_detail_order);

            }

            // return redirect('/payment');
            if($data_payment['payment_method'] == 1) {
                echo "Thanh toán bằng thẻ";
            }else if($data_payment['payment_method'] == 2) {
                Cart::destroy();
                return view('pages.checkout.handcash');
            }else {
                echo "Thanh toán bằng thẻ ghi nợ";
            }
        }
        
    }
    
    function manager_order() {
        $all_order = DB::table('tbl_order') 
        -> join('users', 'users.id', '=', 'tbl_order.customer_id')
        -> select('tbl_order.*', 'users.name') -> orderby('tbl_order.id', 'desc')
        -> get();
       
        return view('admin.manager_order', compact('all_order'));
    }
    function edit_order($id) {
        $get_order_by_id = DB::table('tbl_order')-> where('tbl_order.id', $id)
        -> join('users', 'users.id', '=', 'tbl_order.customer_id')
        -> join('tbl_shipping', 'tbl_shipping.id', '=', 'tbl_order.shipping_id')
        -> join('tbl_order_detail', 'tbl_order_detail.order_id', '=', 'tbl_order.id') 
        ->select('tbl_order.*', 'users.*','tbl_shipping.*', 'tbl_order_detail.*', 'tbl_order.id' ) -> first();
       
       
        return view('admin.edit_order', compact('get_order_by_id'));
    }
}
