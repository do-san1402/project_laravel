@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhật danh mục sản phẩm
                </header>
              
                
                
                <div class="panel-body">
                    <div class="position-center">
                        @foreach($category_product as $key => $value)
                        <form role="form" action="{{url('/category-product-update/'.$value->id)}}" method="post">
                            @csrf
                       
                
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="categoty_product_name" placeholder="Enter email" value="{{$value->category_name}}" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <input type="text" name="categoty_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"  value="{{$value->category_desc}}"></input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khóa danh mục</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"  name="meta_keyword" placeholder="Từ khóa danh mục" value="{{$value->meta_keyword}}" >
                            </div>
                            
                       
                            
                       
                        <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection