<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\OrderDetails;
use App\Models\Order;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Product;
use PDF;


class OrderController extends Controller
{
    function update_order_number(Request $request) {
        $data = $request -> all();
        $order_detail = OrderDetails::where('product_id', $data['order_product_id']) -> where('order_code', $data['order_code']) ->first();
        $order_detail -> product_sales_qty = $data['order_qty'];
        $order_detail -> save();
    }
    function update_order_status(Request $request) {
        $data = $request -> all();
        $order = Order::find($data['order_id']);
        $order -> order_status = $data['order_status'];
        $order -> save();
        if($data['order_status'] == 2) {
            foreach($data['order_product_id'] as $key => $product_id) {
                $product = Product::find($product_id);
                $product_quantity = $product ->product_quantity;
                $product_sold = $product -> product_sold;
                foreach($data['quantity'] as $key2 => $qty) {
                    if($key == $key2) {
                        $pro_remain = $product_quantity - $qty;
                        $product ->product_quantity =$pro_remain;
                        $product ->product_sold = $product_sold +$qty;
                        $product -> save();
                    }
                }
            }
        }elseif($data['order_status'] != 2 && $data['order_status'] != 3) {
            foreach($data['order_product_id'] as $key => $product_id) {
                $product = Product::find($product_id);
                $product_quantity = $product ->product_quantity;
                $product_sold = $product -> product_sold;
                foreach($data['quantity'] as $key2 => $qty) {
                    if($key == $key2) {
                        $pro_remain = $product_quantity + $qty;
                        $product ->product_quantity =$pro_remain;
                        $product ->product_sold = $product_sold - $qty;
                        $product -> save();
                    }
                }
            }
        }

    }
    function manager_order() {
        $all_order = Order::orderBy('created_at', 'DESC') -> get();
        return view('admin.manager_order', compact('all_order'));
    }
    function edit_order($order_code) {
        $order_detail = OrderDetails::with('product') ->where('order_code', $order_code) ->get();
        $order = Order::where('order_code',$order_code ) -> get();
        foreach($order as $key => $ord) {
            $customer_id = $ord ->customer_id;
            $shipping_id = $ord ->shipping_id; 
            $order_status = $ord ->order_status; 
        }

        $customer = User::where('id', $customer_id) -> first();
        $shipping = Shipping::where('id', $shipping_id) ->first();
        $order_detail_product = OrderDetails::with('product') -> where('order_code', $order_code) -> get();
        foreach($order_detail_product as $key  => $order_d) {
            $product_coupon = $order_d ->product_coupon;
        }
        if($product_coupon != '0') {
            $coupon = Coupon::where('coupon_code', $product_coupon) -> first();
            $coupon_conditions = $coupon ->coupon_conditions;
            $coupon_option = $coupon->coupon_options;   
        }else {
            $coupon_conditions = 1;
            $coupon_option = 0;  
        }
       
        return view('admin.edit_order', compact('order_detail','customer', 'shipping' , 'order_detail', 'coupon_conditions', 'coupon_option', 'order', 'order_status'));
    }
    function print_order($checkout_code) {
        $pdf = \App::make('dompdf.wrapper');
        $pdf -> loadHTML($this -> print_order_convert($checkout_code));
        return $pdf -> stream();
    }
    function print_order_convert($checkout_code) {
        $order_detail = OrderDetails::where('order_code', $checkout_code) ->get();
        $order = Order::where('order_code',$checkout_code ) -> get();
        foreach($order as $key => $ord) {
            $customer_id = $ord ->customer_id;
            $shipping_id = $ord ->shipping_id; 
        }

        $customer = User::where('id', $customer_id) -> first();
        $shipping = Shipping::where('id', $shipping_id) ->first();
        $order_detail_product = OrderDetails::with('product') -> where('order_code', $checkout_code) -> get();

        $output = '';
        $output .= 
        '
        <style>
            body {
                font-family: DejaVu Sans;
            }
            .table-styling {
                border: 1px solid #000;
                border-collapse: collapse;
            }
            .table-styling th,td{
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
            }
        </style>
        <h5><center>C???ng h??a x?? h???i ch??? ngh??a Vi???t Nam</center></h5>
        <h5><center>?????c l???p - T??? do - H???nh ph??c</center></h5> <br>
        <h3><center>C??ng ty tr??ch nhi???m m???t th??nh vi??n GoodGame</center></h3> 
        <p>Th??ng tin kh??ch h??ng</p>
        <table class="table-styling">
            <thead class="thead-light">
                <tr>
                    <th>T??n kh??ch h??ng</th>
                    <th>S??? ??i???n tho???i</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>';
        $output .= 
        '
            <tr>
                <td>'.$customer->name.'</td>
                <td>'.$customer->phone.'</td>
                <td>'.$customer->email.'</td>
            </tr>
        ';

        
        $output .= '
            </tbody>
        </table>
        
        
        <p>Th??ng tin v???n chuy???n</p>
        <table class="table-styling">
            <thead class="thead-light">
                <tr>
                    <th>T??n ng?????i nh???n</th>
                    <th>?????a ch???</th>
                    <th>S??? ??i???n tho???i</th>
                    <th>Email</th>
                    <th>Ghi ch??</th>

                </tr>
            </thead>
            <tbody>';
        $output .= 
        '
            <tr>
                <td>'.$shipping->name_shipping.'</td>
                <td>'.$shipping->address_shipping.'</td>
                <td>'.$shipping->phone_shipping.'</td>
                <td>'.$shipping->email_shipping.'</td>
                <td>'.$shipping->notes_shipping.'</td>
            </tr>
        ';

        
        $output .= '
            </tbody>
        </table>


         <p>Chi ti???t ????n h??ng</p>
        <table class="table-styling">
            <thead class="thead-light">
                <tr>
                    <th>T??n s???n ph???m</th>
                    <th>M?? gi???m gi??</th>
                    <th>Ph?? giao h??ng</th>
                    <th>S??? l?????ng</th>
                    <th>Gi??</th>
                    <th>Th??nh ti???n</th>

                </tr>
            </thead>
            <tbody>';
        $total = 0;
        foreach($order_detail_product as $key  => $order_d) {
            $product_coupon = $order_d ->product_coupon;
        }
        if($product_coupon != '0') {
            $coupon = Coupon::where('coupon_code', $product_coupon) -> first();
            $coupon_conditions = $coupon ->coupon_conditions;
            $coupon_option = $coupon->coupon_options;   
        }else {
            $coupon_conditions = 1;
            $coupon_option = 0;  
        }
        
        foreach($order_detail_product as $key =>  $product) {
            $sub_total = $product->product_price*$product->product_sales_qty;
            $total += $sub_total;
            $output .= 
            '
                <tr>
                    <td>'.$product->product_name.'</td>
                    <td>'.$product->product_coupon.'</td>
                    <td>'.number_format($product->product_feeship).'??</td>
                    <td>'.$product->product_sales_qty.'</td>
                    <td>'.number_format($product->product_price).'??</td>
                    <td>'.number_format($sub_total).'??</td>
                </tr>
            ';
        }
        if($coupon_conditions == 0) {
            $coupon_option_sub = ($total*$coupon_option)/100;
            $total_coupon = $total - $coupon_option_sub + $product->product_feeship;
        }else {
            $coupon_option_sub = $coupon_option;
            $total_coupon = $total - $coupon_option + $product->product_feeship;
        }
        $output .= 
        '
            <tr>
                <td colspan="6"> 
                    <p>Gi???m:'.number_format($coupon_option_sub).'??</p>
                    <p>Ph?? giao h??ng: '.number_format($product->product_feeship).'??</p>
                    <p>T???ng thanh to??n:'.number_format($total_coupon).'??</p>
                </td>
            </tr>
        ';
       

        
        $output .= '
            </tbody>
        </table>
        <br>
        <div >
            <h5>Ng?????i l???p phi???u <span style="float:right">Ng?????i nh???n</span></h5>
           
        </div>



        ';
        return $output;
    }
}
