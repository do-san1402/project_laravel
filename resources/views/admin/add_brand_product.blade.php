@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                @php
                    $status = session() -> get('message_success');
                    if($status) {
                        echo " <div class='alert alert-success' role='alert'>$status</div>";
                        session() -> put('message_success' , null);
                            
                    }
                @endphp
                
                
                
                
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{url('brand-product-create')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="brand_product_name">
                            @error('brand_product_name') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu sản phẩm</label>
                            <textarea type="text" name="brand_product_desc" class="form-control" id="exampleInputPassword1" ></textarea>
                            @error('brand_product_desc') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ khóa sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="meta_keyword">
                            @error('meta_keyword') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiển thị</label>
                            <select class="form-control m-bot15" name="brand_product_status">
                                <option>---Chọn---</option>
                                <option value='0'>Ẩn</option>
                                <option value='1'>Hiện</option>
                                
                            </select>
                            @error('brand_product_status') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection