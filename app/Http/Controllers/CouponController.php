<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    function insert_coupon() {
        return view('admin.coupon.insert_coupon');
    }
    function insert_coupon_code(Request $request) {
        $data = $request -> all();
        $validation = $request ->validate([
            'coupon_name' => 'required',
            'coupon_code' =>'required',
            'coupon_times' => 'required|integer',
            'coupon_options' => 'required|integer',
            'coupon_conditions' => 'required|in:0,1'
        ],
        [
            'required' =>'Trường :attribute không được để trống',
            'in' =>'Trường :attribute không được để trống',
            'integer' => 'Trường :attribute phải ở dạng số',
        ],
        [
            'coupon_name' =>'tên mã giả giá',
            'coupon_code' => 'mả giả giá',
            'coupon_times' => "số lượng mã giả giá",
            'coupon_options' => 'chọn thuộc tính mã',
            'coupon_conditions' => 'tính năng mã'
        ]);
        $coupons = new Coupon;
        $coupons -> coupon_name = $data['coupon_name'];
        $coupons -> coupon_times = $data['coupon_times'];
        $coupons ->coupon_conditions = $data['coupon_conditions'];
        $coupons -> coupon_options = $data['coupon_options'];
        $coupons -> coupon_code = $data['coupon_code']; 

        if( $coupons -> save()) {
            $request -> session() -> put('message_success', 'Thêm mã giảm giá thành công');
            return redirect('/insert-coupon');
        }else {
            return redirect('/insert-coupon');
        }
    }
    function list_coupon() {
        $all = Coupon::orderBy('id', 'desc') ->get();
        return view('admin.coupon.list_coupon', compact('all'));
    }
    function delete_coupon(Request $request, $id) {
        Coupon::find($id)-> delete();
        $request -> session() -> put('message_all', 'Xóa thà    nh công mã giả giá');
        return redirect('/list-coupon');
    }
}
 