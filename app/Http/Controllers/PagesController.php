<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    
    function menu($page) {
        if((View::exists("pages.$page"))) {
            return view("pages.$page");
        }else {
            return view("pages.404");
        }
        
    }
    
     function show_category($id, Request $request) {
        $category_product = DB::table('categry_product')-> where('category_status' , 1) -> get();
    
        $brand_product = DB::table('brand_product') -> where('brand_status', 1) -> get();
        $products = DB::table('tbl_product') -> 
        join('categry_product', 'categry_product.id', '=','tbl_product.category_id') ->select('tbl_product.*')
        ->where('tbl_product.category_id', $id) -> get();
        $name_category_ = DB::table('categry_product') -> where('id' , $id) -> first('category_name');
        $category_by_id =  DB::table('categry_product')-> where('id', $id) -> get(); 
        foreach($category_by_id as $key => $value) {
            $meta_desc = $value->category_desc;
            $meta_title = $value->category_name;
            $meta_keywords = $value->meta_keyword;
            $url_canonical = $request -> url();
        }
        return view("pages.category.show", compact('category_product', 'brand_product', 'products', 'name_category_', 'meta_desc', 'meta_title','meta_keywords', 'url_canonical'));
    }
    function show_brand($id, Request $request) {
        
        $category_product = DB::table('categry_product')-> where('category_status' , 1) -> get();
        $brand_product = DB::table('brand_product') -> where('brand_status', 1) -> get();
        $products = DB::table('tbl_product') -> join('brand_product', 'tbl_product.category_id', '=','brand_product.id') ->select('tbl_product.*')->where('tbl_product.brand_id', $id) -> get();
        $name_brand_ = DB::table('brand_product') -> where('id' , $id) -> first('brand_name');
        $brand_seo = DB::table('brand_product') -> where('id' , $id) -> get();
        foreach($brand_seo as $key => $value) {
            $meta_desc = $value->brand_desc;
            $meta_title = $value->brand_name;
            $meta_keywords = $value->meta_keyword;
            $url_canonical = $request -> url();
        }
        return view("pages.brands.show", compact('category_product', 'brand_product', 'products', 'name_brand_', 'meta_desc', 'meta_title','meta_keywords', 'url_canonical'));
    }
    function detail_product($id, Request $request) {
        $products = DB::table('tbl_product') -> where('id' , $id) -> first();
        $products_seo = DB::table('tbl_product') -> where('id' , $id) -> get();
       
       
       

        $brand_name = DB::table('brand_product') -> where('brand_status', 1) -> get('brand_name');
        $id_category = DB::table('tbl_product') -> where('id', $id) -> value('category_id');
        $id_brand= DB::table('tbl_product') -> where('id', $id) -> value('brand_id');
        $category_name = DB::table('categry_product')-> where(['category_status' => 1, 'id' => $id_category ]) -> get();
        $brand_name = DB::table('brand_product')-> where(['brand_status' => 1, 'id' => $id_brand ]) -> get();
        foreach($products_seo as $key => $value) {
            $meta_desc = $value->product_cpu.$value->product_ram.$value->product_keyboard.$value->product_size;
            $meta_title = $value->product_name;
            $meta_keywords = $value->meta_keyword;
            $url_canonical = $request -> url(); 
            $image_og  = "url('uploads/product/'.$value->product_image)";
        }
        return view("pages.product.show", compact('products', 'category_name', 'brand_name', 'meta_desc', 'meta_title','meta_keywords', 'url_canonical', 'image_og'));
    }
}
