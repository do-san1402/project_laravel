<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    function manager_banner() {
        $all_banner = Banner::orderBy('id', 'DESC') -> get();
        return view('admin.banner.show', compact('all_banner'));
    }
    function create_banner() {
        return view('admin.banner.add');
    }
    function add_banner(Request $request) {
        $validation = $request ->validate([
            'slide_name' => 'required',
            'slide_desc' =>'required',
            'status' => 'required|in:0,1',
            'image' => 'required'
        ],
        [
            'required' =>':attribute không được để trống',
            'in' =>':attribute không được để trống',
        ],
        [
            'slide_name' =>'Tên banner',
            'slide_desc' => 'Mô tả banner',
            'status' => "Trạng thái banner",
            'image' => 'Hình ảnh'
        ]
        
        );
        $data = $request -> all();
        $banner = new Banner();
        $banner -> slide_name = $data['slide_name'];
        $banner -> slide_desc = $data['slide_desc'];
        $banner -> status = $data['status'];
        $get_image = $request-> file('image');
        if($get_image) {
            $get_name_image = $get_image -> getClientOriginalName();
            $name_image = current(explode('.',  $get_name_image));
            $new_image = $name_image.rand(0 , 99).'.'.$get_image -> getClientOriginalExtension();
            $get_image ->move('public/uploads/banner', $new_image);
            $banner -> image =  $new_image;
            $banner -> save();
            $request -> session() ->put('message_success', 'Thêm slider thành công');
            return redirect('create-banner');
        }else {
            $request -> session() ->put('message_success', 'Thêm slider không thành công, vui lòng chọn đúng định dạng ảnh');
            return redirect('create-banner');
        }
    }
    function unactive_slide($id, Request $request) {
        $brand = Banner::find($id);
        $brand -> status = 0;
        $brand -> save();
        $request -> session() -> put('message_all', 'Không hiển thị banner');
        return redirect('/manager-banner');
    }
    function active_slide($id, Request $request) {
        $banner= Banner::find($id) ;
        $banner-> status = 1;
        $banner-> save();
        $request -> session() -> put('message_all', 'Hiển thị banner');
        return redirect('/manager-banner');
    }
    function delete_slide($id, Request $request) {
        Banner::find($id)-> delete();

        $request -> session() -> put('message_all', 'Xóa thành công');
        return redirect('/manager-banner');
    }
    function edit_slide($id) {
        $banner = Banner::find($id) ->first();
        return view('admin.banner.edit' , compact('banner'));
    }
    function update_banner() {
        $data = $request -> all();
        $banner = Banner::find($id);
        $banner -> slide_name = $data['slide_name'];
        $banner -> slide_desc = $data['slide_desc'];
        
        $banner -> save();
        $request -> session() -> put('message_all', 'Cập nhật thành công');
        return redirect('/manager-banner');
    }
}
