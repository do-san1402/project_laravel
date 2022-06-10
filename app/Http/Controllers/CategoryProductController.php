<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Category;

use App\Exports\ExportExcel;
use App\Imports\ImportExcel;
use Excel;


class CategoryProductController extends Controller
{
    function import_csv(Request $request) {
        if($request->file('file')) {
            $path = $request->file('file')->getRealPath();
            Excel::import(new ImportExcel, $path);
            return back();
        }else {
            $request -> session() -> put('message_success', 'Vui lòng chọn file Import');
            return redirect('/all-category-product');
        }
    }
    function export_csv() {
        return Excel::download(new ExportExcel , 'CategoryProduct.xlsx');
    }
    function Authlogin() {
        $admin_id = session()-> get('admin_id');
        if($admin_id) {
            return redirect('/dashboard');
        }else {
            return redirect('admin')-> send();
        }
    }
    function add_category_product() {
        $this -> Authlogin();
        return view('admin.add_category_product');
    }
    function all_category_product() {
        $this -> Authlogin();
        $all = Category::all();
        return view('admin.all_category_product', compact('all'));
    }
    function create_category_product(Request $request) {
        $this -> Authlogin();
        $validation = $request ->validate([
            'categoty_product_name' => 'required',
            'categoty_product_desc' =>'required',
            'categoty_product_status' => 'required|in:0,1',
            'meta_keyword' => 'required'
        ],
        [
            'required' =>'Trường :attribute không được để trống',
            'in' =>'Trường :attribute không được để trống',
        ],
        [
            'categoty_product_name' =>'tên danh mục',
            'categoty_product_desc' => 'mô tả danh mục',
            'categoty_product_status' => "trạng thái danh mục",
            'meta_keyword' => 'Từ khóa danh mục',
        ]
        
    );
        


        $data = $request -> all();
        $category = new Category();
        $category ->category_name = $data['categoty_product_name'];
        $category ->category_desc = $data['categoty_product_desc'];
        $category ->category_status = $data['categoty_product_status'];
        $category ->meta_keyword = $data['meta_keyword'];
       
        if( $category -> save()) {
            $request -> session() -> put('message_success', 'Thêm danh mục thành công');
            return redirect('/add-category-product');
        }else {
            return redirect('/add-category-product');
        }
    }
    function active_category_product(Request $request, $id) {
        $this -> Authlogin();
        DB::table('categry_product') -> where('id' , $id) ->update(['category_status' => 1]);
        $request -> session() -> put('message_all', 'Hiển thị danh mục');
        return redirect('/all-category-product');
    }
    function unactive_category_product(Request $request, $id) {
        $this -> Authlogin();
        DB::table('categry_product') -> where('id' , $id) ->update(['category_status' => 0]);
        $request -> session() -> put('message_all', 'Không hiển thị danh mục');
        return redirect('/all-category-product');
    }
    function edit_category_product($id) {
        $this -> Authlogin();
        $category_product = DB::table('categry_product') ->where('id', $id) -> get();
       
        return view('admin.edit_category_product', compact('category_product'));
    }
    function update_category_product(Request $request , $id) {
        $this -> Authlogin();
        $data = [
            'category_name' => $request -> categoty_product_name,
            'category_desc' => $request -> categoty_product_desc, 
            'meta_keyword' => $request -> meta_keyword,
        ];
        DB::table('categry_product') ->where('id' , $id) ->update($data);
        $request -> session() -> put('message_all', 'Cập nhật thành công');
        return redirect('/all-category-product');
    }
    function delete_category_product(Request $request, $id) {
        $this -> Authlogin();
        DB::table('categry_product') -> where('id' , $id) ->delete();
        $request -> session() -> put('message_all', 'Xóa thành công');
        return redirect('/all-category-product');
    }
}
