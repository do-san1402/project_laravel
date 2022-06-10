<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Banner;

class IndexController extends Controller
{
    
    function show(Request $request ) {
        // ===================SEO=================
        $meta_desc = "GoodGames là công ty chuyên cung cấp LapTop, Phụ Kiện dành cho game thủ, với chất lượng tối nhất và giá thành hợp lý";
        $meta_title = "GoodGames-LapTop-PhuKien";
        $meta_keywords = "laptop, phụ kiện lap top, PC, game, gaming";
        $url_canonical = $request -> url();
        // =================END-SEO=================
        $category_product = DB::table('categry_product')-> where('category_status' , 1) -> get();
        $brand_product = DB::table('brand_product') -> where('brand_status', 1) -> get();
        $products = DB::table('tbl_product') -> where('product_status', 1) -> get();
        $isset_id_category_on_product = DB::table('categry_product') ->join('tbl_product', 'tbl_product.category_id', '=', 'categry_product.id' )-> select('category_name', 'category_id') ->groupBy('category_id', 'category_name')->get();
        $list_banner = Banner::where('status' , 1) -> get();
        return view('index', compact('category_product', 'brand_product', 'products', 'isset_id_category_on_product','meta_desc', 'meta_title','meta_keywords', 'url_canonical', 'list_banner' ));
    }
    function infor_user() {
        return 'Oke';
    }
    function search(Request $request) { 
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $url_canonical = $request -> url();
        $keywork = $request ->search;
       
        $category_product = DB::table('categry_product')-> where('category_status' , 1) -> get();
        $brand_product = DB::table('brand_product') -> where('brand_status', 1) -> get();
        $products_search = DB::table('tbl_product') -> where('product_name', 'like', '%'.$keywork.'%') -> get();
        return view("pages.sanpham.search", compact('category_product', 'brand_product', 'products_search','meta_desc', 'meta_title','meta_keywords', 'url_canonical'));
    }
}
