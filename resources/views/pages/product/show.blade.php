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

<li><a href="store-catalog.html">Action Games</a></li>


<li><span class="fa fa-angle-right"></span></li>
{{-- <li><a href="store-catalog.html">Action Games</a></li> --}}

<li><span>{{$products->product_name}}</span></li>



</ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->


<?php
    // echo '<pre>';
    // print_r($products);    
    // echo '</pre>';
?>

<div class="container">
<div class="row vertical-gap">
<div class="col-lg-12">
    <div class="nk-store-product">
        <div class="row vertical-gap">
            <div class="col-md-6">
                <!-- START: Product Photos -->
                <div class="nk-popup-gallery">
                    
                    <div class="nk-gallery-item-box">
                        <a href="{{asset('uploads/product/').'/'.$products->product_image}}" class="nk-gallery-item" data-size="622x622 ">
                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                            <img src="{{asset('uploads/product/').'/'.$products->product_image}}" alt="">
                        </a>
                    </div>

                    <div class="nk-gap-1"></div>
                    <div class="row vertical-gap sm-gap">
                        <div class="col-6 col-md-4">
                            <div class="nk-gallery-item-box">
                                <a href="{{asset('uploads/product/').'/'.$products->product_image_sp_1}}" class="nk-gallery-item" data-size="622x622">
                                    <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                    <img src="{{asset('uploads/product/').'/'.$products->product_image_sp_1}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="nk-gallery-item-box">
                                <a href="{{asset('uploads/product/').'/'.$products->product_image_sp_2}}" class="nk-gallery-item" data-size="622x622">
                                    <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                    <img src="{{asset('uploads/product/').'/'.$products->product_image_sp_2}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="nk-gallery-item-box">
                                <a href="{{asset('uploads/product/').'/'.$products->product_image_sp_3}}" class="nk-gallery-item" data-size="622x622">
                                    <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                    <img src="{{asset('uploads/product/').'/'.$products->product_image_sp_3}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Product Photos -->
            </div>
            <div class="col-md-6">
                <div class="nk-product-description">
                    <p class="h5 font-weight-normal"> <i class="fa fa-check text-success text-active "></i>  Bảo hành chính hãng 24 tháng. </p>
                    <p class="h5 font-weight-normal"> <i class="fa fa-check text-success text-active"></i> Hỗ trợ đổi mới trong 7 ngày. </p>
                    <p class="h5 font-weight-normal"> <i class="fa fa-check text-success text-active"></i> Windows bản quyền tích hợp. </p>
                </div> 

                
                <div class="nk-gap-2"></div>
                
                
                <p  style="text-decoration: underline"class="nk-product-title h4 text-danger ">Ưu đãi khi mua kèm laptop tại GOODGAME:</p>
                <div class="nk-product-description">
                    <p class="h5 font-weight-normal"> <i class="fa  text-warning fa-star"></i>  Mua chuột không dây LM115G Wireless chỉ với 100,000đ. </p>
                    <p class="h5 font-weight-normal"> <i class="fa  text-warning fa-star"></i>  Giảm ngay 100,000đ khi mua thêm màn hình máy tính.  </p>
                    <p class="h5 font-weight-normal"> <i class="fa  text-warning fa-star"></i> Giảm ngay 100,000đ khi mua thêm ram. </p>
                </div> 
                
                <!-- START: Add to Cart -->
                <div class="nk-gap-2"></div>
                <form action="" class="nk-product-addtocart">
                    @csrf
                    <div class="nk-product-price"><span class='h4 text-capitalize font-weight-normal text-danger'>Giá KM </span>: {{number_format($products ->product_price,  0, '.', '.')}} đ</div>
                    <div class="nk-gap-1"></div>
                    <div class="input-group">
                        <input type="number" class="form-control cart_product_qty_{{$products->id}}"  min="1"  name = 'qty' placeholder="1"> 

                        <input type="hidden" class="cart_product_id_{{$products->id}}" value="{{$products->id}}" name="">
                        <input type="hidden" class="cart_product_name_{{$products->id}}" value="{{$products->product_name}}" name="">
                        <input type="hidden" class="cart_product_image_{{$products->id}}" value="{{$products->product_image}}" name="">
                        <input type="hidden" class="cart_product_price_{{$products->id}}" value="{{$products->product_price}}" name="">
                        <input type="hidden" class="cart_product_quantity_{{$products->id}}" value="{{$products->product_quantity}}" name="">
                        <button type="button" class="add-detail-cart nk-btn nk-btn-rounded nk-btn-color-main-1" data-product_id_detail="{{$products->id}}">Đặt hàng</button>
                    </div>
                </form>
                <div class="nk-gap-3"></div>
                <!-- END: Add to Cart -->

                <!-- START: Meta -->
                <div class="nk-product-meta">
                    
                    <div><strong>Danh mục</strong>:
                        @foreach ($category_name as $name)
                            <a href="{{url('danh-muc-san-pham').'/'.$name ->id}}">{{$name ->category_name}}</a>, 
                        @endforeach
                        
                    </div>
                    <div><strong>Thương hiệu</strong>: 
                        @foreach($brand_name as $name)
                            <a href="{{url('thuong-hieu-san-pham').'/'.$name ->id}}">{{$name ->brand_name}}</a>, 
                        @endforeach
                    </div>
                </div>
                <!-- END: Meta -->
            </div>
        </div>

        

        <div class="nk-gap-2"></div>
        <!-- START: Tabs -->
        <div class="nk-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#tab-description" role="tab" data-toggle="tab">Mô tả sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#tab-reviews" role="tab" data-toggle="tab">Chi tiết sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-comment" role="tab" data-toggle="tab"> Đánh giá sản phẩm</a>
                </li>
            </ul>

            <div class="tab-content">

                <!-- START: Tab Description -->
                <div role="tabpanel" class="tab-pane fade show active" id="tab-description">
                    <div class="nk-gap"></div>
                    <div class="nk-gap"></div>
                    <strong class="text-white h3">Thông số kĩ thuật</strong>
                    <div class="nk-gap"></div>
                    <table class="table table-bordered table-hover" >
                        <tr>
                            <th>CPU</th>
                            <td class="table-dark">{{$products ->product_cpu}}</td>
                            
                        </tr>
                        <tr>
                            <th>RAM</th>
                            <td class="table-dark">{{$products ->product_ram}}</td>
                        </tr>
                        <tr>
                            <th>Ổ cứng</th>
                            <td class="table-dark">{{$products ->product_hard_drive}}</td>
                        </tr>

                        <tr>
                            <th>Card đồ họa</th>
                            <td class="table-dark">{{$products ->product_graphics_card}}</td>
                        </tr>

                        <tr>
                            <th>Màn hình </th>
                            <td class="table-dark">{{$products ->product_screen}}</td>
                        </tr>

                        <tr>
                            <th>Cổng giao tiếp</th>
                            <td class="table-dark">{{$products ->product_connector}}</td>
                        </tr>

                        <tr>
                            <th>Bàn phím</th>
                            <td class="table-dark">{{$products ->product_sound}}</td>
                        </tr>

                        <tr>
                            <th>Chuẩn LAN</th>
                            <td class="table-dark">{{$products ->product_lan}}</td>
                        </tr>

                        <tr>
                            <th>Chuẩn WIFI</th>
                            <td class="table-dark">{{$products ->product_wifi}}</td>
                        </tr>

                        <tr>
                            <th>Bluetooth</th>
                            <td class="table-dark">{{$products ->product_bluetooth}}</td>
                        </tr>

                        <tr>
                            <th>Webcam</th>
                            <td class="table-dark">{{$products ->product_webcam}}</td>
                        </tr>

                        <tr>
                            <th>Hệ điều hành</th>
                            <td class="table-dark">{{$products ->product_operating_system}}</td>
                        </tr>

                        <tr>
                            <th>Pin</th>
                            <td class="table-dark">{{$products ->product_pin}}</td>
                        </tr>

                        <tr>
                            <th>Trọng lượng</th>
                            <td class="table-dark">{{$products ->product_weight}}</td>
                        </tr>

                        <tr>
                            <th>Màu sắc</th>
                            <td class="table-dark">{{$products ->product_color}}</td>
                        </tr>

                        <tr>
                            <th>Kích thước</th>
                            <td class="table-dark">{{$products ->product_size}}</td>
                        </tr>

                    </table>

                   
                </div>
                <!-- END: Tab Description -->

                <!-- START: Tab Chi tiết sản phẩm -->
                <div role="tabpanel" class="tab-pane fade" id="tab-reviews">
                    <div class="nk-gap-2"></div>
                    <!-- START: Reply -->
                    <h2 class="h3">Đánh giá chi tiết</h2>
                    <p class="">
                        {!!$products->product_desc!!}

                    </p>
                    <!-- END: Reply -->

                    <div class="clearfix"></div>
                    <div class="nk-gap-2"></div>
                    
                </div>
                <!-- END: Tab Chi tiết sản phẩm -->




                <!-- START: Tab Đánh giá sản phẩm-->
                <div role="tabpanel" class="tab-pane fade" id="tab-comment">
                    <div class="nk-gap-2"></div>
                    <!-- START: Reply -->
                    <h3 class="h3">Thêm bình luận</h3>
                    
                    <div class="nk-gap-2"></div>
                    <div class="nk-comments">
                        
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook~~~.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="9eCD6d9p"></script>
                        <div class="fb-comments" data-href="{{$url_canonical}}" data-width="" data-numposts="5"></div>
                       
                    </div>
                    
                    
                    
                    
                </div>
                <!-- END: Tab Đánh giá sản phẩm -->

            </div>
        </div>
        <!-- END: Tabs -->
        <div class="nk-gap-2"></div>
        <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="large">
            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a>
        </div>
        <div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button" data-action="like" data-size="large" data-share="false"></div>
       
        

        
        
    </div>

    <!-- START: Related Products -->
    
    <!-- END: Related Products -->
</div>

</div>
</div>
<div class="nk-gap-2"></div>
@endsection