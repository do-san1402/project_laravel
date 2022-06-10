@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhật thương hiệu sản phẩm
                </header>
              
                
                
                <div class="panel-body">
                    <div class="position-center">
                       
                        <form role="form" action="{{url('/brand-product-update/'.$brand_product->id)}}" method="post">
                            @csrf
                       
                
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu sản phẩm</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="brand_product_name"  value="{{$brand_product->brand_name}}" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu sản phẩm</label>
                                <input type="text" name="brand_product_desc" class="form-control" id="exampleInputPassword1"  value="{{$brand_product->brand_desc}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khóa thương hiệu sản phẩm</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="meta_keyword"  value="{{$brand_product->meta_keyword}}" >
                            </div>
                            
                       
                            
                       
                        <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật thương hiệu sản phẩm</button>
                    </form>
                
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection