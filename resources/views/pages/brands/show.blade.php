
@extends('layouts.dashboard')
@section('main')
<div class="nk-main">
        
    <div class="nk-gap-2"></div>
            
    
            
    <div class="container">
    
        <!-- START: Image Slider -->
        <div class="nk-image-slider" data-autoplay="8000">
            
            
            <div class="nk-image-slider-item">
                <img src="{{asset('images/slide-1.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('images/slide-1-thumb.jpg')}}">
                
                <div class="nk-image-slider-content">
                    
                        <h3 class="h4">As we Passed, I remarked</h3>
                        <p class="text-white">As we passed, I remarked a beautiful church-spire rising above some old elms in the park; and before them, in the midst of a lawn, chimneys covered with ivy, and the windows shining in the sun.</p>
                        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>
                    
                </div>
                
            </div>
            
            <div class="nk-image-slider-item">
                <img src="{{asset('images/slide-2.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('images/slide-2-thumb.jpg')}}">
                
                <div class="nk-image-slider-content">
                    
                        <h3 class="h4">He made his passenger captain of one</h3>
                        <p class="text-white">Now the races of these two have been for some ages utterly extinct, and besides to discourse any further of them would not be at all to my purpose. But the concern I have most at heart is for our Corporation of Poets, from whom I am preparing a petition to your Highness,  to be subscribed with the names of one...</p>
                        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>
                    
                </div>
                
            </div>
            
            <div class="nk-image-slider-item">
                <img src="{{asset('images/slide-3.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('images/slide-3-thumb.jpg')}}">
                
            </div>
            
            <div class="nk-image-slider-item">
                <img src="{{asset('images/slide-4.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('images/slide-4-thumb.jpg')}}">
                
                <div class="nk-image-slider-content">
                    
                        <h3 class="h4">At length one of them called out in a clear</h3>
                        <p class="text-white">TJust then her head struck against the roof of the hall: in fact she was now more than nine feet high...</p>
                        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>
                    
                </div>
                
            </div>
            
            <div class="nk-image-slider-item">
                <img src="{{asset('images/slide-5.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('images/slide-5-thumb.jpg')}}">
                
                <div class="nk-image-slider-content">
                    
                        <h3 class="h4">For good, too though, in consequence</h3>
                        <p class="text-white">She gave my mother such a turn, that I have always been convinced I am indebted to Miss Betsey for having been born on a Friday. The word was appropriate to the moment.</p>
                        <p class="text-white">My mother was so much worse that Peggotty, coming in with the teaboard and candles, and seeing at a glance how ill she was, - as Miss Betsey might have done sooner if there had been light enough, - conveyed her upstairs to her own room with all speed; and immediately dispatched Ham Peggotty, her nephew, who had been for some days past secreted in the house...</p>
                        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>
                    
                </div>
                
            </div>
            
        </div>
        <!-- END: Image Slider -->
    
        <!-- START: Categories -->
        <div class="nk-gap-2"></div>
        <div class="row vertical-gap">
            <div class="col-lg-3">
                <div class="nk-feature-1">
                    <div class="nk-feature-icon">
                        
                        <img src="https://w.ladicdn.com/s600x400/5bf3dc7edc60303c34e4991f/laptop-t2-33-20220223054645.png" alt="">
                    </div>
                   
                   
                </div>
            </div>
            <div class="col-lg-3">
                <div class="nk-feature-1">
                    <div class="nk-feature-icon">
                        
                        <img src="https://w.ladicdn.com/s600x400/5bf3dc7edc60303c34e4991f/laptop-t2-32-20220223054555.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="nk-feature-1">
                    <div class="nk-feature-icon">
                        
                        <img src="https://w.ladicdn.com/s600x400/5bf3dc7edc60303c34e4991f/laptop-t2-34-20220223054645.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="nk-feature-1">
                    <div class="nk-feature-icon">
                        
                        <img src="https://w.ladicdn.com/s600x400/5bf3dc7edc60303c34e4991f/laptop-t2-35-20220223054645.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        
    
        <div class="nk-gap-2"></div>

    


        <div class="row vertical-gap">
            <div class="col-lg-8">

                <h3 class="nk-decorated-h-2"><span><span class="text-main-1">{{$name_brand_ ->brand_name}}</span></h3>
                <div class="nk-gap"></div>
                <div class="row vertical-gap ">
                    
                    @foreach($products as $k_product => $v_product)
                   
                    <div class="col-md-6">
                        <div class="nk-product-cat">
                            <a class="nk-product-image" href="{{url('/chi-tiet-san-pham/'.$v_product->id)}}">
                                <img src="{{asset('/uploads/product').'/'.$v_product ->product_image}}" alt="{{$v_product ->product_name}}">
                            </a>
                            <div class="nk-product-cont">
                                <h3 class="nk-product-title h5 nk-product-title-sp "><a href="{{url('/chi-tiet-san-pham/'.$v_product->id)}}">{{$v_product ->product_name}}</a></h3>
                                <div class="nk-gap-1"></div>
                                
                                
                                <div class="nk-product-price">
                                    <?php
                                       echo  number_format($v_product ->product_price, 0, '.', '.');
                                    ?>
                                </div>
                                <div class="nk-gap-1"></div>
                                <form >
                                    @csrf
                                    <input type="hidden" class="cart_product_id_{{$v_product->id}}" value="{{$v_product->id}}" name="">
                                    <input type="hidden" class="cart_product_name_{{$v_product->id}}" value="{{$v_product->product_name}}" name="">
                                    <input type="hidden" class="cart_product_image_{{$v_product->id}}" value="{{$v_product->product_image}}" name="">
                                    <input type="hidden" class="cart_product_price_{{$v_product->id}}" value="{{$v_product->product_price}}" name="">
                                    <input type="hidden" class="cart_product_qty_{{$v_product->id}}" value="1" name="">
                                </form>
                                <button type="button" class="nk-btn-click-add nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1" name="add-to-cart" data-id_product="{{$v_product->id}}">Thêm giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                   
                    
                </div>

                
                
             
                
            </div>
           
            <div class="col-lg-4">
                <!--
                    START: Sidebar
                -->
                <aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
                    <div class="nk-widget">
        <div class="nk-widget-content">
            
        </div>
    </div>
   

    <div class="nk-widget nk-widget-highlighted">
        <h4 class="nk-widget-title"><span><span class="text-main-1">Danh mục</span> Sản phẩm </span></h4>
        <div class="nk-widget-content">
            @foreach($category_product as $value)
                <div class="nk-widget-post nk-widget-post-bn">
                    
                    <h3 class="nk-post-title nk-post-title-bn" ><a href="{{url('/danh-muc-san-pham/'.$value->id)}}">{{$value ->category_name}}</a></h3>
                    
                </div>

            @endforeach
        <?php
            
        ?>
        
           
            
        </div>
    </div>
    
    <div class="nk-widget nk-widget-highlighted">
        <h4 class="nk-widget-title"><span><span class="text-main-1">Thương hiệu</span> Sản phẩm </span></h4>
        <div class="nk-widget-content">
            @foreach($brand_product as $value)
                <div class="nk-widget-post nk-widget-post-bn">
                    
                    <h3 class="nk-post-title nk-post-title-bn" ><a href="{{url('/thuong-hieu-san-pham/'.$value->id)}}">{{$value ->brand_name}}</a></h3>
                    
                </div>

            @endforeach
        <?php
            
        ?>
        
           
            
        </div>
    </div>
    <div class="nk-widget nk-widget-highlighted">
        <h4 class="nk-widget-title"><span><span class="text-main-1">Top 10</span> bán chạy</span></h4>
        <div class="nk-widget-content">
            
                <div class="nk-widget-post">
                    <a href="blog-article.html" class="nk-post-image">
                        <img src="assets/images/post-1-sm.jpg" alt="">
                    </a>
                    <h3 class="nk-post-title"><a href="blog-article.html">Smell magic in the air. Or maybe barbecue</a></h3>
                    <div class="nk-post-date"><span class="fa fa-calendar"></span> Sep 18, 2018</div>
                </div>
            
                <div class="nk-widget-post">
                    <a href="blog-article.html" class="nk-post-image">
                        <img src="assets/images/post-2-sm.jpg" alt="">
                    </a>
                    <h3 class="nk-post-title"><a href="blog-article.html">Grab your sword and fight the Horde</a></h3>
                    <div class="nk-post-date"><span class="fa fa-calendar"></span> Sep 5, 2018</div>
                </div>
            
                <div class="nk-widget-post">
                    <a href="blog-article.html" class="nk-post-image">
                        <img src="assets/images/post-3-sm.jpg" alt="">
                    </a>
                    <h3 class="nk-post-title"><a href="blog-article.html">We found a witch! May we burn her?</a></h3>
                    <div class="nk-post-date"><span class="fa fa-calendar"></span> Aug 27, 2018</div>
                </div>
            
        </div>
    </div>
    
    
                </aside>
                <!-- END: Sidebar -->
            </div>
    
        </div>
    </div>
    
    <div class="nk-gap-4"></div>
 
@endsection
