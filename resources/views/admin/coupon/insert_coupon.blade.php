@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mã giảm giá
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
                        <form role="form" action="{{url('insert-coupon-code')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên mã giảm giá</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="coupon_name" >
                            @error('coupon_name') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mã giảm giá</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="coupon_code" >
                            @error('coupon_code') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Sô lượng mã</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="coupon_times" >
                            @error('coupon_times') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tính năng mã</label>
                            <select class="form-control m-bot15" name="coupon_conditions">
                                <option>---Chọn---</option>
                                <option value='0'>Giảm theo %</option>
                                <option value='1'>Giảm theo tiền</option>
                                
                            </select>
                            @error('coupon_conditions') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nhập số % hoặc số tiền giảm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="coupon_options" placeholder="Từ khóa danh mục">
                            @error('coupon_options') 
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                        @enderror
                        </div>
                        <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection