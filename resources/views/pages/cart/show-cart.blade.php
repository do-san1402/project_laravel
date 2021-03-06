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
                                                    <h5 class="h6">S???n ph???m:</h5>
                                                    <div class="nk-gap-1"></div>
                                                    {{$value['product_name']}}
                                                    <h2 class="nk-post-title h4">
                                                        <a href="store-product.html"></a>
                                                    </h2>
                                                </td>
                                                <td class="nk-product-cart-price">
                                                    <h5 class="h6">Gi??:</h5>
                                                    <div class="nk-gap-1"></div>
                                                    {{number_format($value['product_price'], 0, '.', '.')}}
                                                    <strong>??</strong>
                                                </td>
                                                <td class="nk-product-cart-quantity">
                                                    <h5 class="h6">S??? l?????ng:</h5>
                                                    <div class="nk-gap-1"></div>
                                                    
                                                    <div class="nk-form">
                                                        <input type="number" class="form-control"  name ="qty[{{$value['session_id']}}]" value="{{$value['product_qty']}}" min="1" max="21">
                                                    </div> 
                                                </td>
                                                <td class="nk-product-cart-total">
                                                    <h5 class="h6">T???ng ti???n:</h5>
                                                    <div class="nk-gap-1"></div>
                                                    {{number_format($subtotal, 0, '.', '.')}}
                                                    <strong>??</strong>
                                                </td>
                                                <td class="nk-product-cart-remove">
                                                    <a href="{{url('/delete-cart/'.$value['session_id'])}}" onclick="return confirm('B???n c?? ch???c x??a s???n ph???m n??y?')" >
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
                            <input class="nk-btn nk-btn-rounded nk-btn-color-white float-right" type="submit" value="C???p nh???t gi??? h??ng">
                            <a  href="{{url('/')}}" class="nk-btn nk-btn-rounded nk-btn-color-white float-left" type="submit" > Trang ch???</a>
                                
                            </form>
                            
                        <?php
                    }else {
                        ?>
                           <h2 class="text-center text-uppercase ">Gi??? h??ng tr???ng</h2>
                           
                           <a href="{{url('/')}}" class="fs-2 text-center text-uppercase fw-bold"> quay l???i trang ch???</a>
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
                    <h3 class="nk-title h4">T??nh to??n ph?? v???n chuy???n</h3>
                    <form role="form" action="" method="">
                        @csrf
                    
                        <div class="form-group">
                            <label for="city">T???nh / Th??nh ph??? <span class="text-main-1">*</span>:</label>
                            <select class="form-control m-bot15 choose city" name="city " id="city">
                        
                                <option value=''>--Ch???n t???nh th??nh ph???--</option>
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
                            <label for="city">Qu???n / Huy???n <span class="text-main-1">*</span>:</label>
                            <select class="form-control m-bot15 choose province required" name="province" id="province">
                                <option value=''>--Ch???n qu???n huy???n--</option>
                            </select>
                            @error('brand_product_status') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="nk-gap-1"></div>
                        <div class="form-group">
                            <label for="city">Ph?????ng / X??<span class="text-main-1">*</span>:</label>
                            <select class="form-control m-bot15 wards required" name="wards" id="wards">
                                <option value=''>--Ch???n ph?????ng x??--</option>
                            </select>
                            @error('brand_product_status') 
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="nk-gap-1"></div>
                        
                        <label for="address">?????a ch??? <span class="text-main-1">*</span>:</label>
                        <input type="text" class="form-control required" name="address_shipping" id="address">
                        <div class="nk-gap-1"></div>
                        
                        <div class="nk-gap-1"></div>
                        <input type="button" class="calculate nk-btn nk-btn-rounded nk-btn-color-main-1" value="T??nh ph?? v???n chuy???n" name ="submit_save">
                    </form>
                    <!-- END: Calculate Shipping -->
            
                </div>
                <div class="col-md-6">
                    <!-- START: Cart Totals -->
                    <h3 class="nk-title h4">T???ng ti???n h??ng</h3>
                    <table class="nk-table nk-table-sm">
                        <tbody>
                            <tr class="nk-store-cart-totals-subtotal">
                                <td>
                                    T???ng
                                </td>
                                <td>
                                    {{number_format($total, 0, '.', '.')}}??
                                </td>
                            </tr>
                            

                            <tr class="nk-store-cart-totals-total">
                                <form action="{{url('/check-coupon')}}" method="POST">
                                    @csrf
                                    <td>
                                        <input type="text" class="form-control" name="coupon"  placeholder="Nh???p m?? gi???m gi??">
                                        @error('coupon') 
                                        <small class="form-text text-danger">
                                            {{$message}}
                                        </small>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="submit" class="nk-btn nk-btn-rounded nk-btn-color-main-1 form-control check_coupon " name="check-coupon" value="T??nh m?? gi???m gi??">
                                        <?php
                                            if(session() -> get('coupon')) {
                                                ?>
                                                    <a href="{{url('delete-coupon')}}" class="nk-btn nk-btn-rounded nk-btn-color-main-1 form-control check_coupon " >X??a m?? gi??? gi??</a>
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
                                            Gi???m
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
                                                            {{number_format($cou['coupon_options'], 0, '.', '.')}}??
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
                                            M?? gi???m
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
                                    Ph?? v???n chuy???n
                                </td>
                                <td>
                                    <?php
                                        if(session()->get('feeship')) {
                                            ?>
                                                 {{number_format(session()->get('feeship'), 0,',', '.')}}??
                                            <?php
                                        }else {
                                            ?>
                                                Vui l??ng t??nh ph?? v???n chuy???n
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
                                    T???ng thanh to??n
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
                                     {{number_format($total_after, 0, '.', '.')}}??
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
                        <a class="nk-btn nk-btn-rounded nk-btn-color-main-1 float-right" data-toggle="modal" data-target="#modalLogin_checkout" href="{{url('/login-checkout')}}"> thanh to??n</a>
                    <?php
                }else {
                    ?>
                        <input type="submit"class="nk-btn nk-btn-rounded nk-btn-color-main-1 float-right check_cart" value="THANH TO??N" >
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
                                'login' => '????ng nh???p',
                                'register'=> '????ng k??'
                            ];
                            if($user || $login_id) {
                                $list_status = [
                                'login_checkout' => 'Ti???p t???c thanh to??n'
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