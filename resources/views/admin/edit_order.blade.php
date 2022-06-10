@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
       Thông tin khách hàng
        </div>
        <div class="row w3-res-tb">
        
        <div class="col-sm-4">
        </div>
        
        </div>
        <div class="table-responsive">
           <?php
                $status = session() -> get('message_all');
                    if($status) {
                        echo " <div class='alert alert-success' role='alert'>$status</div>";
                        session() -> put('message_all', null); 
                    }
              
            ?> 
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th style="width:20px;">
                <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                </label>
                </th>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>
           
            <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                
                
            </tr>
         
            </tbody>
        </table>
        
        </div>
        
    </div>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
       Thông tin vận chuyển
        </div>
        <div class="row w3-res-tb">
        
        <div class="col-sm-4">
        </div>
        
        </div>
        <div class="table-responsive">
           
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th style="width:20px;">
                <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                </label>
                </th>
                <th>Tên người vận chuyển</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Ghi chú</th>
                <th>Hình thức thanh toán</th>                
                
                
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>
           
            <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$shipping->name_shipping}}</td>
                <td>{{$shipping->phone_shipping}}</td>
                <td>{{$shipping->address_shipping}}</td>
                <td>{{$shipping->email_shipping}}</td>
                <td>{{$shipping->notes_shipping}}</td>
                <td>@if($shipping->shopping_method == 0)
                        Chuyển khoản
                    @else
                        Tiền mặc
                    @endif
                </td>
                
            </tr>
         
            </tbody>
        </table>
        
        </div>
        
    </div>
</div>
<br><br>



<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
       Chi tiết đơn hàng 
        </div>
        <div class="row w3-res-tb">
        
        <div class="col-sm-4">
        </div>
        
        </div>
        <div class="table-responsive">
           
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng hàng tồn</th>
                <th>Mã giảm giá</th>
                <th>Phí giao hàng</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng tiền</th>
             
            
                
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>
            <?php
                $stt = 0 ;  
                $total = 0;
                foreach($order_detail as $key => $ord) {
                    $stt++;
                    $subtotal = $ord->product_price*$ord->product_sales_qty;
                    $total += $subtotal;
                    ?>
                        <tr class="color_qty_{{$ord->product_id}}">
                            <td>{{$stt}}</td>
                            <td>{{$ord->product_name}}</td>
                            <td>{{$ord->product->product_quantity}}</td>
                            <td>
                                @if($ord->product_coupon !='0')
                                    {{$ord->product_coupon}}
                                @else
                                    Không mã
                                @endif
                            </td>
                            <td>
                                {{number_format($ord->product_feeship)}}VND
                            </td>
                            <td >
                               <input type="number" min="1" {{$order_status==2 ? 'disabled': ''}} class="order_qty_{{$ord->product_id}}" value="{{$ord->product_sales_qty}}" name="product_sales_qty">

                                <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$ord->product_id}}" value="{{$ord->product->product_quantity}}">

                               <input type="hidden" name="order_code" class="order_code" value="{{$ord->order_code}}">

                               <input type="hidden" name="product_qty_id" class="product_qty_id" value="{{$ord->product_id}}">
                                @if($order_status !=2)
                                    <button class="btn btn-default update_quantity_order" name="update_quantity_order" data-product_id="{{$ord->product_id}}">Cập nhật</button>
                               @endif
                            </td>
                            <td>
                                {{number_format($ord->product_price)}}VND
                            </td>
                            
                            <td>{{number_format($subtotal)}}VND </td>
                            
                        </tr>
                    <?php
                }
            ?>
            <tr>
                <td></td>
                <td >
                    <?php
                        if($coupon_conditions == 0) {
                            $total_after_coupon = ($total*$coupon_option)/100;
                            echo 'Tổng giảm: '.number_format($total_after_coupon).' VND';
                            $total_coupon = $total - $total_after_coupon + $ord->product_feeship;
                        }else {
                            echo 'Tổng giảm: '.number_format($coupon_option).' VND';
                            $total_coupon = $total - $coupon_option + $ord->product_feeship;
                        }
                    ?>
                <br>
          
                  Tổng phí giao hàng: {{number_format($ord->product_feeship)}}VND <br>
                  Tổng:  {{number_format($total_coupon)}}VND
                </td>
            </tr>
            <tr >
                <td colspan="3"> 
                    @foreach($order as $key => $or) 
                        @if($or->order_status == 1)
                            <form action="">
                                @csrf
                                <select class="form-control order_detail"name="" id="">
                                    <option id="{{$or->id}}" value="1" selected>Đơn hàng mới</option>
                                    <option id="{{$or->id}}" value="2">Đã xử lý-đã giao hàng</option>
                                    <option id="{{$or->id}}" value="3">Hủy đơn hàng- tạm giữ</option>
                                </select>
                            </form>
                        @elseif($or->order_status == 2)
                            <form action="">
                                <select class="form-control order_detail"name="" id="">
                                    <option id="{{$or->id}}"value="1">Đơn hàng mới</option>
                                    <option id="{{$or->id}}" value="2" selected>Đã xử lý-đã giao hàng</option>
                                    <option id="{{$or->id}}" value="3">Hủy đơn hàng- tạm giữ</option>
                                </select>
                            </form>
                        @else
                            <form action="">
                                <select class="form-control order_detail"name="" id="">
                                    <option id="{{$or->id}}"value="1">Đơn hàng mới</option>
                                    <option id="{{$or->id}}" value="2" >Đã xử lý-đã giao hàng</option>
                                    <option id="{{$or->id}}" value="3" selected>Hủy đơn hàng- tạm giữ</option>
                                </select>
                            </form>
                        @endif
                    @endforeach
                </td>
            </tr>
            
         
            </tbody>
        </table>
        </div>
    </div>
    <a target="_blank" href="{{url('/print-order/'.$ord->order_code)}}">In đơn hàng</a>
</div>
@endsection