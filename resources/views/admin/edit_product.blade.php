@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa sản phẩm
                </header>
                @php
                    $status = session() -> get('message_success');
                    if($status) {
                        echo " <div class='alert alert-success' role='alert'>$status</div>";
                        session() -> put('message_success', null);
                    }
                       
                @endphp
                
                
                
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{url('/product-update/'.$product->id)}}" method="post"  enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_name" value="{{$product->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SL sản phẩm</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"  name="product_quantity" value="{{$product->product_quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"  name="product_price" value="{{$product->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh đại diện</label>
                            <input type="file" class="form-control" id="exampleInputEmail1"  name="product_image"  value="{{$product->product_image}}">
                            <img src="{{asset('/uploads/product').'/'.$product ->product_image}}" alt="" width="100px" height="130px">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh sản phẩm 1</label>
                            <input type="file" class="form-control" id="exampleInputEmail1"  name="product_image_sp_1"  value="{{$product->product_image_sp_1}}">
                            <img src="{{asset('/uploads/product').'/'.$product ->product_image_sp_1}}" alt="" width="100px" height="130px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh sản phẩm 2</label>
                            <input type="file" class="form-control" id="exampleInputEmail1"  name="product_image_sp_2"  value="{{$product->product_image_sp_2}}">
                            <img src="{{asset('/uploads/product').'/'.$product ->product_image_sp_2}}" alt="" width="100px" height="130px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh sản phẩm 3</label>
                            <input type="file" class="form-control" id="exampleInputEmail1"  name="product_image_sp_3"  value="{{$product->product_image_sp_3}}">
                            <img src="{{asset('/uploads/product').'/'.$product ->product_image_sp_3}}" alt="" width="100px" height="130px">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">CPU</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_cpu" value="{{$product->product_cpu}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ram</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_ram" value="{{$product->product_ram}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ổ cứng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_hard_drive" value="{{$product->product_hard_drive}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Card đồ họa</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_graphics_card" value="{{$product->product_graphics_card}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Màn hình</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_screen" value="{{$product->product_screen}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cổng kết nối</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_connector"value="{{$product->product_connector}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Âm thanh</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_sound" value="{{$product->product_sound}}">
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bàn phím</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_keyboard" value="{{$product->product_keyboard}}">
                        </div>
                  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chuẩn LAN</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_lan" value="{{$product->product_lan}}">
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chuẩn WIFI</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_wifi" value="{{$product->product_wifi}}">
                        </div>
                      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bluetooth</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_bluetooth" value="{{$product->product_bluetooth}}">
                        </div>
                  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Webcam</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_webcam" value="{{$product->product_webcam}}">
                        </div>
                 
                
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hệ điều hành</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_operating_system"value="{{$product->product_operating_system}}" >
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">PIN</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_pin" value="{{$product->product_pin}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trọng lượng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_weight" value="{{$product->product_weight}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Màu sắc</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_color" value="{{$product->product_color}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Kích thước</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_size"value="{{$product->product_size}}" >
                        </div>

                       
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea type="text" name="product_desc" class="form-control" id="exampleInputPassword1" >
                                {{$product->product_desc}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa sản phẩm</label>
                            <textarea type="text" name="meta_keyword" class="form-control" id="exampleInputPassword1" >
                                {{$product->meta_keyword}}
                            </textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                            <select class="form-control m-bot15" name="product_category">
                             
                                @foreach($category_pro as $value)
                                    @if($value ->id == $product->category_id)
                                        <option selected value='{{$value ->id}}'>{{$value ->category_name}}</option>  
                                    @else
                                        <option value='{{$value ->id}}'>{{$value ->category_name}}</option>   
                                    @endif
                                @endforeach
                             
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thương hiệu sản phẩm</label>
                            <select class="form-control m-bot15" name="product_brand">
                                
                                @foreach($brand_pro as $value)
                                @if($value ->id == $product->brand_id)
                                    <option selected value='{{$value ->id}}'>{{$value ->brand_name}}</option> 
                                @else
                                    <option value='{{$value ->id}}'>{{$value ->brand_name}}</option>   
                                @endif
                                      
                                @endforeach
                                
                                
                            </select>
                        </div>
                       
                        <button type="submit" name="update_product" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection