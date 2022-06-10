<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

use App\Models\BrandModel;
use Excel;
use App\Exports\ExportBrand;
use App\Imports\ImportBrand;

class BrandProductController extends Controller
{
    function export_csv_brand() {
        return Excel::download(new ExportBrand , 'brand.xlsx');
    }
    function import_csv_brand(Request $request) {
        if($request->file('file')) {
            $path = $request->file('file')->getRealPath();
            Excel::import(new ImportBrand, $path);
            return back();
        }else {
            $request -> session() -> put('message_success', 'Vui lòng chọn file Import');
            return redirect('/all-brand-product');
        }
    }
    
    function add_brand_product(Request $request) {
       

        return view('admin.add_brand_product');
    }
    function all_brand_product() {
        $all = BrandModel::orderBy('id', 'desc') ->get();
        return view('admin.all_brand_product', compact('all'));
    }


    function create_brand_product(Request $request) {
        $validation = $request ->validate([
            'brand_product_name' => 'required',
            'brand_product_desc' =>'required',
            'brand_product_status' => 'required|in:0,1',
            'meta_keyword' => 'required'
        ],
        [
            'required' =>'Trường :attribute không được để trống',
            'in' =>'Trường :attribute không được để trống',
        ],
        [
            'brand_product_name' =>'tên thương hiệu',
            'brand_product_desc' => 'mô tả',
            'brand_product_status' => "trạng thái thương hiệu",
            'meta_keyword' => 'từ khóa sản phẩm'
        ]
        
        );
        $data = $request -> all();
        $brand = new BrandModel();
        $brand ->brand_name = $data['brand_product_name'];
        $brand ->brand_desc = $data['brand_product_desc'];
        $brand ->brand_status = $data['brand_product_status'];
        $brand ->meta_keyword = $data['meta_keyword'];
       
        if( $brand -> save()) {
            $request -> session() -> put('message_success', 'Thêm thương hiệu sản phẩm thành công');
            return redirect('/add-brand-product');
        }else {
            return redirect('/add-brand-product');
        }
    }
    function active_brand_product(Request $request, $id) {
     
        $brand = BrandModel::find($id) ;
        $brand -> brand_status = 1;
        $brand -> save();
        $request -> session() -> put('message_all', 'Hiển thị thương hiệu sản phẩm');
        return redirect('/all-brand-product');
    }
    function unactive_brand_product(Request $request, $id) {

        $brand = BrandModel::find($id);
        $brand -> brand_status = 0;
        $brand -> save();
        $request -> session() -> put('message_all', 'Không hiển thị thương hiệu');
        return redirect('/all-brand-product');
    }
    function edit_brand_product($id) {
       $brand_product  = BrandModel::find($id);
        return view('admin.edit_brand_product', compact('brand_product'));
    }
    function update_brand_product(Request $request , $id) {
        $data = $request -> all();
        $brand = BrandModel::find($id);
        $brand ->brand_name = $data['brand_product_name'];
        $brand ->brand_desc = $data['brand_product_desc'];
        $brand ->meta_keyword = $data['meta_keyword'];
        $brand -> save();
        $request -> session() -> put('message_all', 'Cập nhật thành công');
        return redirect('/all-brand-product');
    }
    function delete_brand_product(Request $request, $id) {
        BrandModel::find($id)-> delete();

        $request -> session() -> put('message_all', 'Xóa thành công');
        return redirect('/all-brand-product');
    }
}
