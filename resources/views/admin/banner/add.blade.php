@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm banner
                </header>
                    
                <?php
                $status = session() -> get('message_success');
                    if($status) {
                        echo " <div class='alert alert-success' role='alert'>$status</div>";
                        session() -> put('message_success', null); 
                    }
              
            ?>
                
                
                
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{url('add-banner')}}" method="post"  enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên banner</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="slide_name" placeholder="">
                            @error('slide_name') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả banner</label>
                            <textarea type="text" name="slide_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                            @error('slide_desc') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh</label>
                            <input type="file" class="form-control" id="exampleInputEmail1"  name="image" >
                            @error('image') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiển thị</label>
                            <select class="form-control m-bot15" name="status">
                                <option>---Chọn---</option>
                                <option value='0'>Ẩn</option>
                                <option value='1'>Hiện</option>
                                
                            </select>
                            @error('status') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                            @enderror

                        </div>
                        <button type="submit" name="add_category_product" class="btn btn-info">Thêm banner</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection