@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh sản phẩm
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
                        <form role="form" action="{{url('product-create')}}" method="post"  enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_name" >
                            @error('product_name') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SL sản phẩm</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"  name="product_quantity" >
                            @error('product_quantity') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"  name="product_price" >
                            @error('product_price') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh đại diện sản phẩm</label>
                            <input type="file" class="form-control" id="exampleInputEmail1"  name="product_image" >
                            @error('product_image') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh sản phẩm 1</label>
                            <input type="file" class="form-control" id="exampleInputEmail1"  name="product_image_sp_1" >
                            @error('product_image_sp_1') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh sản phẩm 2</label>
                            <input type="file" class="form-control" id="exampleInputEmail1"  name="product_image_sp_2" >
                            @error('product_image_sp_2') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh sản phẩm 3</label>
                            <input type="file" class="form-control" id="exampleInputEmail1"  name="product_image_sp_3" >
                            @error('product_image_sp_3') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CPU</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_cpu" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ram</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_ram" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ổ cứng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_hard_drive" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Card đồ họa</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_graphics_card" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Màn hình</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_screen" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cổng kết nối</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_connector" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Âm thanh</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_sound" >
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bàn phím</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_keyboard" >
                        </div>
                  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chuẩn LAN</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_lan" >
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chuẩn WIFI</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_wifi" >
                        </div>
                      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bluetooth</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_bluetooth" >
                        </div>
                  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Webcam</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_webcam" >
                        </div>
                 
                
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hệ điều hành</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_operating_system" >
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">PIN</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_pin" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trọng lượng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_weight" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Màu sắc</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_color" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Kích thước</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="product_size" >
                        </div>



                      
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea type="text" name="product_desc" class="form-control" id="exampleInputPassword1" rows="10" ></textarea>
                            @error('product_desc') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa danh mục</label>
                            <textarea type="text" name="meta_keyword" class="form-control" id="exampleInputPassword1" ></textarea>
                            @error('meta_keyword') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                            <select class="form-control m-bot15" name="product_category">
                                <option>---Chọn---</option>
                                @foreach($category_pro as $value)
                                    <option value='{{$value ->id}}'>{{$value ->category_name}}</option>   
                                @endforeach
                             
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thương hiệu sản phẩm</label>
                            <select class="form-control m-bot15" name="product_brand">
                                <option>---Chọn---</option>
                                @foreach($brand_pro as $value)
                                    <option value='{{$value ->id}}'>{{$value ->brand_name}}</option>   
                                @endforeach
                                
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiển thị</label>
                            <select class="form-control m-bot15" name="product_status">
                                <option>---Chọn---</option>
                                <option value='0'>Ẩn</option>
                                <option value='1'>Hiện</option>
                                
                            </select>
                            @error('product_status') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection