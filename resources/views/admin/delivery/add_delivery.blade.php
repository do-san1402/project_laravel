@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm phí vận chuyển
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
                        <form role="form" action="" method="">
                            @csrf
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn thành phố</label>
                                <select class="form-control m-bot15 choose city" name="city " id="city">
                            
                                    <option value=''>--Chọn tỉnh thành phố--</option>
                                    @foreach ($city as $key => $ci)
                                        <option value='{{$ci->matp}}'>{{$ci->name_city}}</option>
                                        
                                    @endforeach
                                    
                                    
                                </select>
                                @error('brand_product_status') 
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn quận huyện</label>
                                <select class="form-control m-bot15 choose province" name="province" id="province">
                                    <option value=''>--Chọn quận huyện--</option>
                                </select>
                                @error('brand_product_status') 
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn xã phường</label>
                                <select class="form-control m-bot15 wards" name="wards" id="wards">
                                    <option value=''>--Chọn phường xã--</option>
                                </select>
                                @error('brand_product_status') 
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phí vận chuyển</label>
                                <input type="text" class="form-control fee_ship" id="fee_ship"  name="fee_ship">
                                @error('meta_keyword') 
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                                @enderror
                            </div>
                            <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm phí vận chuyển</button>
                        </form>
                    </div>
                    <div id="load_delivery">

                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection