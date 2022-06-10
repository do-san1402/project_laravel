@extends('layouts.dashboard')
@section('main')
<div class="nk-main">
        
    <!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">

</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->




<div class="container">

<div class="nk-store nk-store-checkout">
<h3 class="nk-decorated-h-2"><span><span class="text-main-1">Thông tin</span>vận chuyển</span></h3>

<!-- START: Billing Details -->
<div class="nk-gap"></div>

<form method="POST" class="nk-form">
    @csrf
    <div class="row vertical-gap">
        <div class="col-lg-12">
            <div class="row vertical-gap">
                <div class="col-sm-12">
                    <label for="fname">Họ và tên <span class="text-main-1">*</span>:</label>
                    <input type="text" class="form-control required name_shipping" name="name_shipping" id="fname">
                </div>
            </div>

            <div class="nk-gap-1"></div>
            

            <div class="row vertical-gap">
                <div class="col-sm-6">
                    <label for="email">Địa chỉ Email <span class="text-main-1">*</span>:</label>
                    <input type="email" class="form-control required email_shipping" name="email_shipping" id="email">
                </div>
                <div class="col-sm-6">
                    <label for="phone">Số điện thoại <span class="text-main-1">*</span>:</label>
                    <input type="text" class="form-control required phone_shipping" name="phone_shipping" id="phone">
                </div>
            </div>

            <div class="nk-gap-1"></div>
            
        </div>
        
        
    </div>
    <!-- END: Billing Details -->
    
    <div class="nk-gap-2"></div>
    
    <label for="notes">Ghi chú đơn hàng:</label>
    <input class="form-control notes_shipping" name="notes_shipping" id="notes" placeholder="Ghi chú đơn hàng của bạn" rows="6">
    <div class="nk-gap-2"></div>

    @if(session() -> get('feeship'))
        <input type="hidden" class="order_fee" name="order_fee" value="{{session()-> get('feeship')}}">
    @else
        <input type="hidden" class="order_fee" name="order_fee" value="50000">
    @endif

    @if(session()-> get('coupon')) 
        @foreach(session()->get('coupon') as $key => $cou)
            <input type="hidden" class="order_coupon" name="order_coupon" value="{{$cou['coupon_code']}}">
        @endforeach
        
        
    @else
        <input type="hidden" class="order_coupon" name="order_coupon" value="0">
    @endif
    <label for="payment">Hình thức thanh toán<span class="text-main-1">*</span>:</label>
    <select class="form-control m-bot15  required payment" name="payment" id="payment">
        <option value=''>-- Chọn hình thức thanh toán --</option>
        <option value='0'>Chuyển khoản</option>
        <option value='1'>Tiền mặc</option>
    </select>
    <!-- START: Order Products -->
    <div class="nk-gap-3"></div>
    <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Đơn hàng </span> của bạn</span></h3>
    <div class="nk-gap"></div>
    <div class="table-responsive">
        <table class="nk-table nk-table-sm">
            <thead class="thead-default">
                <tr>
                    <th class="nk-product-cart-title">Sản phẩm</th>
                    <th class="nk-product-cart-total">Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $list_order = Cart::content();
                 
                    
                    foreach($list_order as $l_value) {
                        ?>
                             <tr>
                                <td class="nk-product-cart-title">
                                    {{$l_value ->name}} &times; {{$l_value ->qty}}
                                </td>
                                <td class="nk-product-cart-total">
                                    {{number_format($l_value ->total, 0, '.', '.')}}đ
                                </td>
                            </tr>
                        <?php
                    }
                    
                ?>
        
                
                   
                
                    
                
                <tr class="nk-store-cart-totals-subtotal">
                    <td>
                        Tổng đơn hàng
                    </td>
                    <td>
                        {{number_format(session() -> get('total'), 0,',', '.')}}đ
                    </td>
                </tr>
                <tr class="nk-store-cart-totals-shipping">
                    <td>
                        Phí vận chuyển
                    </td>
                    <td>
                        {{number_format(session()->get('feeship'), 0,',', '.')}}đ
                     
                    </td>
                </tr>
                <tr class="nk-store-cart-totals-shipping">
                    <td>
                        Số tiền giảm
                    </td>
                    <td>
                        
                        {{number_format(session()->get('total_after_coupon'), 0,',', '.')}}đ
                     
                    </td>
                </tr>
                <tr class="nk-store-cart-totals-total">
                    <td>
                        Tổng thanh toán
                    </td>
                    <td>
                        {{number_format(session()->get('total_after'))}}đ
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- END: Order Products -->

    <div class="nk-gap-2"></div>
    <div class="nk-gap-2"></div>
    {{-- Payment --}}
    

    <input type="button" class="nk-btn nk-btn-rounded nk-btn-color-main-1 send_order" value="Đặt hàng" name ="submit_save">
    
</form>
</div>
</div>
<div class="nk-gap-2"></div>



@endsection