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
                        <form role="form" action="{{url('add-banner')}}" method="post"  >
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên banner</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="slide_name" value="{{$banner->slide_name}}" >
                            @error('slide_name') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả banner</label>
                            <textarea type="text" name="slide_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả banner">

                                {{$banner->slide_desc}}
                            </textarea>
                            @error('slide_desc') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>

                        
                        
                        
                        <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật banner</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection