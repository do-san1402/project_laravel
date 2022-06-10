<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Exports\ExportProduct;
use App\Imports\ImportProduct;
use Excel;

class ProductController extends Controller
{

    function export_csv_product() {
        return Excel::download(new ExportProduct , 'product.xlsx');
    }
    function import_csv_product(Request $request) {
        if($request->file('file')) {
            $path = $request->file('file')->getRealPath();
            Excel::import(new ImportProduct, $path);
            return back();
        }else {
            $request -> session() -> put('message_success', 'Vui lòng chọn file Import');
            return redirect('/all-product');
        }
    }
    function add_product() {
        $category_pro = DB::table('categry_product')-> orderby('id', 'desc') -> get();
        $brand_pro = DB::table('brand_product') -> orderby('id', 'desc') -> get();
        return view('admin.add_product', compact('category_pro', 'brand_pro'));
    }
    function all_product() {
        $all_bonus = DB::table('tbl_product') 
        -> join('categry_product', 'categry_product.id', '=', 'tbl_product.category_id')
        -> join('brand_product', 'brand_product.id', '=', 'tbl_product.brand_id')
        -> first();
        $all = DB::table('tbl_product') ->get();
       
        return view('admin.all_product', compact('all', 'all_bonus'));
    }
    function create_product(Request $request) {
        $validation = $request ->validate([
            'product_name' => 'required',
            'product_quantity' => 'required',
            'product_price' =>'required|integer',
            'product_image' => 'required|image',
            'product_image_sp_1' => 'required|image',
            'product_image_sp_2' => 'required|image',
            'product_image_sp_3' => 'required|image',
            'product_desc' => 'required',
            'meta_keyword' => 'required',
            'product_category' => 'required',
            'product_brand' => 'required',
            'product_status' => 'required|in:0,1',

        ],
        [
            'required' =>'Trường :attribute không được để trống',
            'in' =>'Trường :attribute không được để trống',
            'integer' => 'Trường :attribute không phải là dạng số nguyên',
            'image' => 'Trường:attribute không phải là định dạng ảnh',
        ],
        [
            
            'product_name' => 'tên sản phẩm',
            'product_price' => 'giá sản phẩm',
            'product_image' => "hình ảnh sản phẩm",
            'product_quantity' => 'Số lượng sản phẩm',
            'product_image_sp_1' => "hình ảnh sản phẩm 1",
            'product_image_sp_2' => "hình ảnh sản phẩm 2",
            'product_image_sp_3' => "hình ảnh sản phẩm 3",
            'product_desc' => "mô tả sản phẩm",
            'meta_keyword' => "nội dung sản phẩm",
            'product_status' => "trạng thái sản phẩm",
        ]
        
    );
        $data = [
            'category_id' => $request -> product_category,
            'brand_id' => $request -> product_brand,
            'product_name' => $request -> product_name,
            'product_quantity' => $request -> product_quantity,
            'product_price' => $request -> product_price,
            'meta_keyword' => $request -> meta_keyword,
            'product_desc' => $request -> product_desc,
            'product_status' => $request -> product_status,
            'product_cpu' => $request -> product_cpu,
            'product_ram' => $request -> product_ram,
            'product_hard_drive' => $request -> product_hard_drive,
            'product_graphics_card' => $request -> product_graphics_card,
            'product_screen' => $request -> product_screen,
            'product_connector' => $request -> product_connector,
            'product_sound' => $request -> product_sound,
            'product_keyboard' => $request -> product_keyboard,
            'product_lan' => $request -> product_lan,
            'product_wifi' => $request -> product_wifi,
            'product_bluetooth' => $request -> product_bluetooth,
            'product_webcam' => $request -> product_webcam,
            'product_operating_system' => $request -> product_operating_system,
            'product_pin' => $request -> product_pin,
            'product_weight' => $request -> product_weight,
            'product_color' => $request -> product_color,
            'product_size' => $request -> product_size,
        ];
        $get_image = $request-> file('product_image');
      
        $get_image_sp_1 = $request-> file('product_image_sp_1');
        $get_image_sp_2 = $request-> file('product_image_sp_2');
        $get_image_sp_3 = $request-> file('product_image_sp_3');
       
        if($get_image ||  $get_image_sp_1 || $get_image_sp_2 ||$get_image_sp_3 ) {
            if($get_image) {
                $get_name_image = $get_image -> getClientOriginalName();
                $name_image = current(explode('.',  $get_name_image));
                $new_image = $name_image.rand(0 , 99).'.'.$get_image -> getClientOriginalExtension();
                $get_image ->move('public/uploads/product', $new_image);
                $data['product_image'] =  $new_image;
            }
            if($get_image_sp_1) {

                $get_name_image_sp_1 = $get_image_sp_1 -> getClientOriginalName();
                $name_image_sp_1 = current(explode('.',  $get_name_image_sp_1));
                $new_image_sp_1 = $name_image_sp_1.'-sp'.rand(0 , 99).'.'.$get_image_sp_1 -> getClientOriginalExtension();
                $get_image_sp_1 ->move('public/uploads/product', $new_image_sp_1);
                $data['product_image_sp_1'] =  $new_image_sp_1;
            }
            if($get_image_sp_2) {
                $get_name_image_sp_2 = $get_image_sp_2 -> getClientOriginalName();
                $name_image_sp_2 = current(explode('.',  $get_name_image_sp_2));
                $new_image_sp_2 = $name_image_sp_2.'-sp'.rand(0 , 99).'.'.$get_image_sp_2 -> getClientOriginalExtension();
                $get_image_sp_2 ->move('public/uploads/product', $new_image_sp_2);
                $data['product_image_sp_2'] =  $new_image_sp_2;
            }
            if($get_image_sp_3) {
                $get_name_image_sp_3 = $get_image_sp_3 -> getClientOriginalName();
                $name_image_sp_3 = current(explode('.',  $get_name_image_sp_3));
                $new_image_sp_3 = $name_image_sp_3.'-sp'.rand(0 , 99).'.'.$get_image_sp_3 -> getClientOriginalExtension();
                $get_image_sp_3 ->move('public/uploads/product', $new_image_sp_3);
                $data['product_image_sp_3'] =  $new_image_sp_3;

            }

            DB::table('tbl_product') -> insert($data);
            $request -> session() -> put('message_success', 'Thêm sản phẩm thành công');
            return redirect('/add-product');
        }
        $data['product_image'] =  '';
            DB::table('tbl_product') -> insert($data);
            $request -> session() -> put('message_success', 'Thêm sản phẩm thành công');
            return redirect('/add-product');
    }
    function active_product(Request $request, $id) {
        DB::table('tbl_product') -> where('id' , $id) ->update(['product_status' => 1]);
        $request -> session() -> put('message_all', 'Hiển thị sản phẩm');
        return redirect('/all-product');
    }
    function unactive_product(Request $request, $id) {
        DB::table('tbl_product') -> where('id' , $id) ->update(['product_status' => 0]);
        $request -> session() -> put('message_all', 'Không hiển thị sản phẩm');
        return redirect('/all-product');
    }
    function edit_product($id) {
        $category_pro = DB::table('categry_product') -> orderby('id', 'desc') -> get();
        $brand_pro = DB::table('brand_product') -> orderby('id', 'desc') -> get();
        $product = DB::table('tbl_product') ->where('id', $id) -> first();
      
        return view('admin.edit_product', compact('product', 'category_pro', 'brand_pro'));
    }
    function update_product(Request $request , $id) {
        

        $data = [
            'category_id' => $request -> product_category,
            'brand_id' => $request -> product_brand,
            'product_name' => $request -> product_name,
            'product_quantity' => $request -> product_quantity,
            'product_price' => $request -> product_price,
            'product_desc' => $request -> product_desc,
            'meta_keyword' => $request -> meta_keyword,
            'product_cpu' => $request -> product_cpu,
            'product_ram' => $request -> product_ram,
            'product_hard_drive' => $request -> product_hard_drive,
            'product_graphics_card' => $request -> product_graphics_card,
            'product_screen' => $request -> product_screen,
            'product_connector' => $request -> product_connector,
            'product_sound' => $request -> product_sound,
            'product_keyboard' => $request -> product_keyboard,
            'product_lan' => $request -> product_lan,
            'product_wifi' => $request -> product_wifi,
            'product_bluetooth' => $request -> product_bluetooth,
            'product_webcam' => $request -> product_webcam,
            'product_operating_system' => $request -> product_operating_system,
            'product_pin' => $request -> product_pin,
            'product_weight' => $request -> product_weight,
            'product_color' => $request -> product_color,
            'product_size' => $request -> product_size,
        ];
        $get_image = $request-> file('product_image');
      
        $get_image_sp_1 = $request-> file('product_image_sp_1');
       
        $get_image_sp_2 = $request-> file('product_image_sp_2');
        $get_image_sp_3 = $request-> file('product_image_sp_3');
       
        if($get_image || $get_image_sp_1 || $get_image_sp_2 || $get_image_sp_3 ) {
            if($get_image) {
                $get_name_image = $get_image -> getClientOriginalName();
                $name_image = current(explode('.',  $get_name_image));
                $new_image = $name_image.rand(0 , 99).'.'.$get_image -> getClientOriginalExtension();
                $get_image ->move('public/uploads/product', $new_image);
                $data['product_image'] =  $new_image;
            }
            if($get_image_sp_1) {

                $get_name_image_sp_1 = $get_image_sp_1 -> getClientOriginalName();
                $name_image_sp_1 = current(explode('.',  $get_name_image_sp_1));
                $new_image_sp_1 = $name_image_sp_1.'-sp'.rand(0 , 99).'.'.$get_image_sp_1 -> getClientOriginalExtension();
                $get_image_sp_1 ->move('public/uploads/product', $new_image_sp_1);
                $data['product_image_sp_1'] =  $new_image_sp_1;
            }
            if($get_image_sp_2) {
                $get_name_image_sp_2 = $get_image_sp_2 -> getClientOriginalName();
                $name_image_sp_2 = current(explode('.',  $get_name_image_sp_2));
                $new_image_sp_2 = $name_image_sp_2.'-sp'.rand(0 , 99).'.'.$get_image_sp_2 -> getClientOriginalExtension();
                $get_image_sp_2 ->move('public/uploads/product', $new_image_sp_2);
                $data['product_image_sp_2'] =  $new_image_sp_2;
            }
            if($get_image_sp_3) {
                $get_name_image_sp_3 = $get_image_sp_3 -> getClientOriginalName();
                $name_image_sp_3 = current(explode('.',  $get_name_image_sp_3));
                $new_image_sp_3 = $name_image_sp_3.'-sp'.rand(0 , 99).'.'.$get_image_sp_3 -> getClientOriginalExtension();
                $get_image_sp_3 ->move('public/uploads/product', $new_image_sp_3);
                $data['product_image_sp_3'] =  $new_image_sp_3;
            }
            DB::table('tbl_product') ->where('id' , $id) ->update($data);
            $request -> session() -> put('message_all', 'Cập nhật sản phẩm thành công');
            return redirect('/all-product');
        }
        DB::table('tbl_product') ->where('id' , $id) ->update($data);
        $request -> session() -> put('message_all', 'Cập nhật sản phẩm thành công');
        return redirect('/all-product');
    }
    function delete_product(Request $request, $id) {
        DB::table('tbl_product') -> where('id' , $id) ->delete();
        $request -> session() -> put('message_all', 'Xóa thành công');
        return redirect('/all-product');
    }
}
