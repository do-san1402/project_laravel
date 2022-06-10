@extends('layouts.dashboard')
@section('main')

<div class="nk-main">
        
    <!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
<ul class="nk-breadcrumbs">


<li><a href="index.html">Home</a></li>


<li><span class="fa fa-angle-right"></span></li>

<li><a href="store.html">Store</a></li>


<li><span class="fa fa-angle-right"></span></li>

<li><span>Cart</span></li>

</ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->




<div class="container">
<div class="nk-store nk-store-cart">
        
            <?php
                $message = session() -> get('message');    
                if($message) {
                    echo "<div class='alert alert-primary' role='alert'> $message </div>";
                    session() -> put('message', null);
                }
            ?>
    
                
                

                <?php
                    $total = 0;
                    if(session() -> get('cart')) {
                      
                        foreach(session() -> get('cart')  as $key => $value) {
                            $subtotal = $value['product_price']* $value['product_qty'];
                            $total += $subtotal;
                            ?>
                            <form action="{{route('update-cart')}}" method="POST">
                                @csrf
                                <div class="table-responsive">
                                
                                    <!-- START: Products in Cart -->
                                  
                                    <table class="table nk-store-cart-products">
                                        <tbody>
                                            <tr>
                                                <td class="nk-product-cart-thumb">
                                                    <a href="store-product.html" class="nk-image-box-1 nk-post-image">
                                                        <img src="{{asset('uploads/product/').'/'.$value['product_image']}}" alt="" width="115">
                                                    </a>
                                                </td>
                                                <td class="nk-product-cart-title">
                                                    <h5 class="h6">Sản phẩm:</h5>
                                                    <div class="nk-gap-1"></div>
                                                    {{$value['product_name']}}
                                                    <h2 class="nk-post-title h4">
                                                        <a href="store-product.html"></a>
                                                    </h2>
                                                </td>
                                                <td class="nk-product-cart-price">
                                                    <h5 class="h6">Giá:</h5>
                                                    <div class="nk-gap-1"></div>
                                                    {{number_format($value['product_price'], 0, '.', '.')}}
                                                    <strong>đ</strong>
                                                </td>
                                                <td class="nk-product-cart-quantity">
                                                    <h5 class="h6">Số lượng:</h5>
                                                    <div class="nk-gap-1"></div>
                                                    
                                                    <div class="nk-form">
                                                        <input type="number" class="form-control"  name ="qty[{{$value['session_id']}}]" value="{{$value['product_qty']}}" min="1" max="21">
                                                    </div> 
                                                </td>
                                                <td class="nk-product-cart-total">
                                                    <h5 class="h6">Tổng tiền:</h5>
                                                    <div class="nk-gap-1"></div>
                                                    {{number_format($subtotal, 0, '.', '.')}}
                                                    <strong>đ</strong>
                                                </td>
                                                <td class="nk-product-cart-remove">
                                                    <a href="{{url('/delete-cart/'.$value['session_id'])}}" onclick="return confirm('Bạn có chắc xóa sản phẩm này?')" >
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <!-- END: Products in Cart -->
                            
                                </div>
                                    
                                   
                        <?php
                        }
                        ?>
                            <div class="nk-gap-1"></div>
                            <input class="nk-btn nk-btn-rounded nk-btn-color-white float-right" type="submit" value="Cập nhật giỏ hàng">
                            <a  href="{{url('/')}}" class="nk-btn nk-btn-rounded nk-btn-color-white float-left" type="submit" > Trang chủ</a>
                                
                            </form>
                            
                        <?php
                    }else {
                        ?>
                           <h2 class="text-center text-uppercase ">Giỏ hàng trống</h2>
                           
                           <a href="{{url('/')}}" class="fs-2 text-center text-uppercase fw-bold"> quay lại trang chủ</a>
                        <?php
                    }
                
                ?>

                   
                
                    
                
            

<div class="clearfix"></div>
<div class="nk-gap-2"></div>
<?php
    if(session() -> get('cart')) {
        ?>
                    <div class="row vertical-gap">
                <div class="col-md-6">
            
                    <!-- START: Calculate Shipping -->
                    <h3 class="nk-title h4">Tính toán phí vận chuyển</h3>
                    <form role="form" action="" method="">
                        @csrf
                    
                        <div class="form-group">
                            <label for="city">Tỉnh / Thành phố <span class="text-main-1">*</span>:</label>
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
                        <div class="nk-gap-1"></div>
                        <div class="form-group">
                            <label for="city">Quận / Huyện <span class="text-main-1">*</span>:</label>
                            <select class="form-control m-bot15 choose province required" name="province" id="province">
                                <option value=''>--Chọn quận huyện--</option>
                            </select>
                            @error('brand_product_status') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="nk-gap-1"></div>
                        <div class="form-group">
                            <label for="city">Phường / Xã<span class="text-main-1">*</span>:</label>
                            <select class="form-control m-bot15 wards required" name="wards" id="wards">
                                <option value=''>--Chọn phường xã--</option>
                            </select>
                            @error('brand_product_status') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="nk-gap-1"></div>
                        
                        <label for="address">Địa chỉ <span class="text-main-1">*</span>:</label>
                        <input type="text" class="form-control required" name="address_shipping" id="address">
                        <div class="nk-gap-1"></div>
                        
                        <div class="nk-gap-1"></div>
                        <input type="button" class="calculate nk-btn nk-btn-rounded nk-btn-color-main-1" value="Tính phí vận chuyển" name ="submit_save">
                    </form>
                    <!-- END: Calculate Shipping -->
            
                </div>
                <div class="col-md-6">
                    <!-- START: Cart Totals -->
                    <h3 class="nk-title h4">Tổng tiền hàng</h3>
                    <table class="nk-table nk-table-sm">
                        <tbody>
                            <tr class="nk-store-cart-totals-subtotal">
                                <td>
                                    Tổng
                                </td>
                                <td>
                                    {{number_format($total, 0, '.', '.')}}đ
                                </td>
                            </tr>
                            

                            <tr class="nk-store-cart-totals-total">
                                <form action="{{url('/check-coupon')}}" method="POST">
                                    @csrf
                                    <td>
                                        <input type="text" class="form-control" name="coupon"  placeholder="Nhập mã giảm giá">
                                        @error('coupon') 
                                        <small class="form-text text-danger">
                                            {{$message}}
                                        </small>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="submit" class="nk-btn nk-btn-rounded nk-btn-color-main-1 form-control check_coupon " name="check-coupon" value="Tính mã giảm giá">
                                        <?php
                                            if(session() -> get('coupon')) {
                                                ?>
                                                    <a href="{{url('delete-coupon')}}" class="nk-btn nk-btn-rounded nk-btn-color-main-1 form-control check_coupon " >Xóa mã giả giá</a>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                </form>
                            </tr>
                            
                        
                            

                            
                            <?php
                                if(session() -> get('coupon')) {
                                ?>
                                    <tr class="nk-store-cart-totals-shipping">
                                        <td>
                                            Giảm
                                        </td>
                                        <?php
                                            foreach (session() ->get('coupon') as $key => $cou) {
                                                $coupon_code = $cou['coupon_code'];
                                                if($cou['coupon_conditions'] == 0) {
                                                    ?>
                                                    <td>
                                                        {{$cou['coupon_options']}}%
                                                    </td>
                                                    <?php
                                                        
                                                        $total_after_coupon = $total*$cou['coupon_options']/100;
                                                    
                                                }else if($cou['coupon_conditions'] == 1){
                                                    ?>
                                                        <td>
                                                            {{number_format($cou['coupon_options'], 0, '.', '.')}}đ
                                                        </td>
                                                    <?php 
                                                        $total_after_coupon = $cou['coupon_options'];
                                                }
                                                session()-> put('total_after_coupon', $total_after_coupon);
                                               
                                            }
                                        ?>
                                        
                                    </tr>
                                    <tr class="nk-store-cart-totals-shipping">
                                        <td>
                                            Mã giảm
                                        </td>
                                        <td>
                                           {{$coupon_code}}
                                           
                                        </td>
                                    </tr>
                                <?php
                                }
                            ?>
                            
                            <tr class="nk-store-cart-totals-subtotal">
                                <td>
                                    Phí vận chuyển
                                </td>
                                <td>
                                    <?php
                                        if(session()->get('feeship')) {
                                            ?>
                                                 {{number_format(session()->get('feeship'), 0,',', '.')}}đ
                                            <?php
                                        }else {
                                            ?>
                                                Vui lòng tính phí vận chuyển
                                            <?php
                                        }
                                    ?>
                                   
                                    <?php
                                       $total_after_fee = session()->get('feeship');
                                    ?>
                                </td>
                            </tr>
                                    
                        
                        
                            
                            

                            <tr class="nk-store-cart-totals-total">
                                <td>
                                    Tổng thanh toán
                                </td>
                                <td>
                                    
                                    
                                        
                                    
                                    <?php
                                        if(!session() -> get('coupon') && session()->get('feeship')){
                                            $total_after = $total + $total_after_fee;
                                        }else if(session() -> get('coupon') && !session()->get('feeship')){
                                            $total_after = $total - $total_after_coupon;
                                        }else if(session() -> get('coupon') && session()->get('feeship')) {
                                            $total_after = $total - $total_after_coupon + $total_after_fee;
                                        }else {
                                            $total_after = $total;
                                        }

                                       
                                        session() -> put('total', $total);
                                        session() -> put('total_after', $total_after);
                                    ?>
                                     {{number_format($total_after, 0, '.', '.')}}đ
                                </td>
                            </tr>
                            
                        </tbody>
                        
                    </table>
                    
                    
                    <!-- END: Cart Totals -->
                </div>
            </div>
            
            <div class="nk-gap-2"></div>
            
            <?php
                if(session() -> get('feeship')) {
                    ?>
                        <a class="nk-btn nk-btn-rounded nk-btn-color-main-1 float-right" data-toggle="modal" data-target="#modalLogin_checkout" href="{{url('/login-checkout')}}"> thanh toán</a>
                    <?php
                }else {
                    ?>
                        <input type="submit"class="nk-btn nk-btn-rounded nk-btn-color-main-1 float-right check_cart" value="THANH TOÁN" >
                    <?php
                }
            ?>
        <?php
    }
?>


<div class="clearfix"></div>
</div>
</div>

<div class="nk-gap-2"></div>



    <!-- START: Login Modal -->
    <div class="nk-modal modal fade" id="modalLogin_checkout" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="ion-android-close"></span>
                    </button>
                    
                    
                    <div class ="row vertical-gap">
                        <div class ="col-md-6">
                            <img src="{{asset('images/logo-2.png')}}" alt="">
                        </div>
                        <?php
                            $user = Auth::check();
                            $login_id = session() -> get('user_id');
                            $list_status = [
                                'login' => 'Đăng nhập',
                                'register'=> 'Đăng ký'
                            ];
                            if($user || $login_id) {
                                $list_status = [
                                'login_checkout' => 'Tiếp tục thanh toán'
                            ];
                            }
                       ?>
                        <div class ="col-md-6 bn-customer">
                            @foreach ($list_status as $k=> $v)
                                <div class="">
                                    <a href="{{route($k)}}">{{$v}}</a>
    
                                </div>
                            @endforeach
                        </div>
    
                    </div>
                </div>
    
                    <div class="nk-gap-1"></div>
                    
                
            </div>
        </div>
    </div>
    <!-- END: Login Modal -->  
@endsection