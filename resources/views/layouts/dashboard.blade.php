<!DOCTYPE html>

    
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- SEO --}}
    <title>{{$meta_title}}</title>
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}">
    <link rel="canonical" href="{{$url_canonical}}">
    <meta name="author" content="_nK">
    <meta name="robots" content="INDEX,FOLLOW">
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- END SEO --}}

    {{-- <meta property="og:image" content="{{$image_og}}" /> --}}
    <meta property="og:image" content="{{asset('images/avatar-1.jpg')}}" />
    <meta property="og:site_name" content="{{$url_canonical}}" />
    <meta property="og:description" content="{{$meta_title}}" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:url" content="{{$url_canonical}}" />
    <meta property="og:type" content="website" />

    

    

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- FontAwesome -->
    <script defer src="{{asset('vendor/fontawesome-free/js/all.js')}}"></script>
    <script defer src="{{asset('vendor/fontawesome-free/js/v4-shims.js')}}"></script>

    <!-- IonIcons -->
    <link rel="stylesheet" href="{{asset('vendor/ionicons/css/ionicons.min.css')}}">

    <!-- Flickity -->
    <link rel="stylesheet" href="{{asset('vendor/flickity/dist/flickity.min.css')}}">

    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/photoswipe/dist/photoswipe.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/photoswipe/dist/default-skin/default-skin.css')}}">

    <!-- Seiyria Bootstrap Slider -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-slider/dist/css/bootstrap-slider.min.css')}}">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/summernote/dist/summernote-bs4.css')}}">

    <!-- GoodGames -->
    <link rel="stylesheet" href="{{asset('css/goodgames.css')}}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    
    <!-- END: Styles -->
       <!-- jQuery -->
       <script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
    
    {{-- sweet alert  --}}
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
  
    
</head>


<!--
    Additional Classes:
        .nk-page-boxed
-->
<body>
    
       {{-- Pulgin share facebook --}}
    
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="x1yAJrU9"></script>

    {{-- End Pulgin share facebook --}} 



<!--
    Additional Classes:
        .nk-header-opaque
-->
<header class="nk-header nk-header-opaque">

    
    
<!-- START: Top Contacts -->
<div class="nk-contacts-top">
    <div class="container">
        <div class="nk-contacts-left">
            <ul class="nk-social-links">
                <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>
                <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a></li>
                <li><a class="nk-social-steam" href="#"><span class="fab fa-steam"></span></a></li>
                <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                <li><a class="nk-social-twitter" href="#" target="_blank"><span class="fab fa-twitter"></span></a></li>
                <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a></li>

              
            </ul>
        </div>
        <div class="nk-contacts-right">
            <ul class="nk-contacts-icons">
                
                <li>
                    <a href="#" data-toggle="modal" data-target="#modalSearch">
                        <span class="fa fa-search"></span>
                    </a>
                </li>
                
                
                <li>
                    <a href="#" data-toggle="modal" data-target="#modalLogin">
                        <span class="fa fa-user"></span>
                    </a>
                </li>
                
                
                <li>
                    <span class="nk-cart-toggle">
                        <span class="fa fa-shopping-cart"></span>
                        <span class="nk-badge">27</span>
                    </span>
                    <div class="nk-cart-dropdown">
                        
                        <div class="nk-widget-post">
                            <a href="store-product.html" class="nk-post-image">
                                <img src="{{asset('images/product-5-xs.jpg')}}" alt="In all revolutions of')}}">
                            </a>
                            <h3 class="nk-post-title">
                                <a href="#" class="nk-cart-remove-item"><span class="ion-android-close"></span></a>
                                <a href="store-product.html">In all revolutions of</a>
                            </h3>
                            <div class="nk-gap-1"></div>
                            <div class="nk-product-price">€ 23.00</div>
                        </div>
                        
                        <div class="nk-widget-post">
                            <a href="store-product.html" class="nk-post-image">
                                <img src="{{asset('images/product-7-xs.jpg')}}" alt="With what mingled joy')}}">
                            </a>
                            <h3 class="nk-post-title">
                                <a href="#" class="nk-cart-remove-item"><span class="ion-android-close"></span></a>
                                <a href="store-product.html">With what mingled joy</a>
                            </h3>
                            <div class="nk-gap-1"></div>
                            <div class="nk-product-price">€ 14.00</div>
                        </div>
                        
                        <div class="nk-gap-2"></div>
                        <div class="text-center">
                            <a href="store-checkout.html" class="nk-btn nk-btn-rounded nk-btn-color-main-1 nk-btn-hover-color-white">Proceed to Checkout</a>
                        </div>
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</div>
<!-- END: Top Contacts -->

    

    <!--
        START: Navbar

        Additional Classes:
            .nk-navbar-sticky
            .nk-navbar-transparent
            .nk-navbar-autohide
    -->
    <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
        <div class="container">
            <div class="nk-nav-table">
                
                <a href="{{url('/')}}" class="nk-nav-logo">
                    <img src="{{asset('images/logo.png')}}" alt="GoodGames" width="199')}}">
                </a>
                
                <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">
        {{-- Dấu cộng đánh dấu list danh sách  class->  nk-drop-item--}}
        <li>
            <a href="{{url("/")}}">
                Trang chủ
                
            </a>
        </li>
        <li class=" ">
            <a href="{{url("menu/elements")}}">
                Tin Tức
                
            </a>
            
        </li>

        <li class=" ">
            <a href="{{url("menu/blog-list")}}">
                Liên hệ
                
            </a>
            
        </li>

        <li class=" ">
            <a href="{{url("/show-cart")}}">
                Giỏ hàng
                
            </a>
        </li>
        <li class=" ">
           
            <?php
            $shipping_id = session()->get('shipping_id');
            $customer_id = Auth::id();
            
            $user_id = session() -> get('user_id');
           


            
            if($customer_id == NULL || isset($user_id)) {
                ?>
                  <a data-toggle="modal" data-target="#modalLogin_sub" href="">Thanh toán</a>
                <?php
            }else if(session()->get('feeship')) {
                ?>
                    <a href="{{url("/login-checkout")}}">Thanh toán</a>
                    
                <?php
            }else {
                ?>
                    <a class="nav_check_fee" > Thanh toán</a>
                <?php
            }

            
            ?>
        </li>
                </ul>
                <ul class="nk-nav nk-nav-right nk-nav-icons">
                    
                        <li class="single-icon d-lg-none">
                            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>
                    
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- END: Navbar -->

</header>

    

<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
    <div class="nano">
        <div class="nano-content">
            <a href="index.html" class="nk-nav-logo">
                <img src="{{asset('images/logo.png')}}">
            </a>
            <div class="nk-navbar-mobile-content">
                <ul class="nk-nav">
                    <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END: Navbar Mobile -->

    


<div id='nk-main'>
    @yield('main')
</div>

    


<!-- START: Footer -->
<footer class="nk-footer">

    <div class="container">
        <div class="nk-gap-3"></div>
        <div class="row vertical-gap">
            <div class="col-md-6">
                <div class="nk-widget">
                    <h4 class="nk-widget-title"><span class="text-main-1">Contact</span> With Us</h4>
                    <div class="nk-widget-content">
                        <form action="php/ajax-contact-form.php" class="nk-form nk-form-ajax">
                            <div class="row vertical-gap sm-gap">
                                <div class="col-md-6">
                                    <input type="email" class="form-control required" name="email" placeholder="Email *">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control required" name="name" placeholder="Name *">
                                </div>
                            </div>
                            <div class="nk-gap"></div>
                            <textarea class="form-control required" name="message" rows="5" placeholder="Message *"></textarea>
                            <div class="nk-gap-1"></div>
                            <button class="nk-btn nk-btn-rounded nk-btn-color-white">
                                <span>Send</span>
                                <span class="icon"><i class="ion-paper-airplane"></i></span>
                            </button>
                            <div class="nk-form-response-success"></div>
                            <div class="nk-form-response-error"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="nk-widget">
                    <h4 class="nk-widget-title"><span class="text-main-1">Latest</span> Posts</h4>
                    <div class="nk-widget-content">
                        <div class="row vertical-gap sm-gap">
                            
                            <div class="col-lg-6">
                                <div class="nk-widget-post-2">
                                    <a href="blog-article.html" class="nk-post-image">
                                        <img src="{{asset('images/post-1-sm.jpg')}}" alt="">
                                    </a>
                                    <div class="nk-post-title"><a href="blog-article.html">Smell magic in the air. Or maybe barbecue</a></div>
                                    <div class="nk-post-date">
                                        <span class="fa fa-calendar"></span> Sep 18, 2018
                                        <span class="fa fa-comments"></span> <a href="#">4</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="nk-widget-post-2">
                                    <a href="blog-article.html" class="nk-post-image">
                                        <img src="{{asset('images/post-2-sm.jpg')}}" alt="">
                                    </a>
                                    <div class="nk-post-title"><a href="blog-article.html">Grab your sword and fight the Horde</a></div>
                                    <div class="nk-post-date">
                                        <span class="fa fa-calendar"></span> Sep 5, 2018
                                        <span class="fa fa-comments"></span> <a href="#">7</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="nk-widget">
                    <h4 class="nk-widget-title"><span class="text-main-1">In</span> Twitter</h4>
                    <div class="nk-widget-content">
                        <div class="nk-twitter-list" data-twitter-count="1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-gap-3"></div>
    </div>

    <div class="nk-copyright">
        <div class="container">
            <div class="nk-copyright-left">
                <a target="_blank" href="https://www.templateshub.net">Templates Hub</a>
            </div>
            <div class="nk-copyright-right">
                <ul class="nk-social-links-2">
                    <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>
                    <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a></li>
                    <li><a class="nk-social-steam" href="#"><span class="fab fa-steam"></span></a></li>
                    <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                    <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                    <li><a class="nk-social-twitter" href="#" target="_blank"><span class="fab fa-twitter"></span></a></li>
                    <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a></li>

                   
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- END: Footer -->

        
    </div>

    

    
        <!-- START: Page Background -->

    <img class="nk-page-background-top" src="{{asset('images/bg-top.png')}}" alt="">
    <img class="nk-page-background-bottom" src="{{asset('images/bg-bottom.png')}}" alt="">

<!-- END: Page Background -->

    

    
        <!-- START: Search Modal -->
<div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0">Search</h4>

                <div class="nk-gap-1"></div>
                <form action="{{url('/search')}}" class="nk-form nk-form-style-1" method="POST">
                    @csrf
                    <input type="text" value="" name="search" class="form-control" placeholder="Nhập từ khóa và nhấn Enter" autofocus>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Search Modal -->
    

    <!-- START: Login Modal -->
<div class="nk-modal modal fade" id="modalLogin_sub" tabindex="-1" role="dialog" aria-hidden="true">
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
                    @php
                        $user = Auth::check();
                        $user_id = session() -> get('user_id');
                            $list_status = [
                                'login' => 'Đăng nhập',
                                'register'=> 'Đăng ký',
                            ];
                            if($user || $user_id) {
                                $list_status = [
                                'login_checkout' => 'Tiếp tục thanh toán'
                            ];
                            }
                    @endphp
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

    <!-- START: Login Modal -->
    
    <div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body" style="padding-bottom: 0px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="ion-android-close"></span>
                    </button>
                    
                    
                    <div class ="row vertical-gap">
                        <div class ="col-md-6">
                            <img src="{{asset('images/logo-2.png')}}" alt="">
                        </div>
                        @php
                            
                            $user = Auth::check();
                            $list_status = [
                                'login' => 'Đăng nhập',
                                'register'=> 'Đăng ký',
                                

                            ];
                            $user_id = session() -> get('user_id');
                            if( $user || isset($user_id)) {
                                $list_status = [
                                    'infor_user' => 'Thông tin tài khoản',
                                    'logout_user' => 'Đăng xuất',
                                ];
                            }else {
                                $list_user = [
                                    'login_google' => 'Đăng nhập bằng Google',
                                    'login_facebook' => 'Đăng nhập bằng Facebook',
                            ];
                            }
                        @endphp
                        <div class ="col-md-6 bn-customer">
                            @foreach ($list_status as $k=> $v)
                                <div class="">
                                    <a href="{{route($k)}}">{{$v}}</a>
                                    
                                </div>
                            @endforeach
                            <br>
                            <br>

                            <?php
                                if(isset($list_user)) {
                                    foreach($list_user as $k=> $v ) {
                                    ?>
                                        <a href="{{route($k)}}">{{$v}}</a>
                                    <?php
                                    }
                                }
                            ?>
                            <br>
                            <br>
                            
                        </div>
                        
                    </div>
                </div>
    
                    <div class="nk-gap-1"></div>
                    
                
            </div>
        </div>
    </div>
    <!-- END: Login Modal -->   


    

<!-- START: Scripts -->

<!-- Object Fit Polyfill -->
<script src="{{asset('vendor/object-fit-images/dist/ofi.min.js')}}"></script>

<!-- GSAP -->
<script src="{{asset('vendor/gsap/src/minified/TweenMax.min.js')}}"></script>
<script src="{{asset('vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js')}}"></script>

<!-- Popper -->
<script src="{{asset('vendor/popper.js/dist/umd/popper.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Sticky Kit -->
<script src="{{asset('vendor/sticky-kit/dist/sticky-kit.min.js')}}"></script>

<!-- Jarallax -->
<script src="{{asset('vendor/jarallax/dist/jarallax.min.js')}}"></script>
<script src="{{asset('vendor/jarallax/dist/jarallax-video.min.js')}}"></script>

<!-- imagesLoaded -->
<script src="{{asset('vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>

<!-- Flickity -->
<script src="{{asset('vendor/flickity/dist/flickity.pkgd.min.js')}}"></script>

<!-- Photoswipe -->
<script src="{{asset('vendor/photoswipe/dist/photoswipe.min.js')}}"></script>
<script src="{{asset('vendor/photoswipe/dist/photoswipe-ui-default.min.js')}}"></script>

<!-- Jquery Validation -->
<script src="{{asset('vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>

<!-- Jquery Countdown + Moment -->
<script src="{{asset('vendor/jquery-countdown/dist/jquery.countdown.min.js')}}"></script>
<script src="{{asset('vendor/moment/min/moment.min.js')}}"></script>
<script src="{{asset('vendor/moment-timezone/builds/moment-timezone-with-data.min.js')}}"></script>

<!-- Hammer.js -->
<script src="{{asset('vendor/hammerjs/hammer.min.js')}}"></script>

<!-- NanoSroller -->
<script src="{{asset('vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js')}}"></script>

<!-- SoundManager2 -->
<script src="{{asset('vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js')}}"></script>

<!-- Seiyria Bootstrap Slider -->
<script src="{{asset('vendor/bootstrap-slider/dist/bootstrap-slider.min.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('vendor/summernote/dist/summernote-bs4.min.js')}}"></script>

<!-- nK Share -->
<script src="{{asset('plugins/nk-share/nk-share.js')}}"></script>

<!-- GoodGames -->
<script src="{{asset('js/goodgames.min.js')}}"></script>
<script src="{{asset('js/goodgames-init.js')}}"></script>
<!-- END: Scripts -->

<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
{{-- reCaptcha - google --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
   <!-- jQuery -->






 {{-- sweet alert  --}}
 <script src = "{{asset('js/sweetalert.min.js')}}" > </script> 

<script type="text/javascript">
    $(document).ready(function() {
        $('.choose').on('change', function() {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if(action =='city') {
                result = 'province';
            }else {
                result = 'wards';
            };
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method : 'GET',
                data: {
                    action: action,
                    ma_id: ma_id,
                    _token: _token,
                },
                success: function(data) {
                    $('#'+result).html(data);
                 
                }
            });
        });

        $('.calculate').click(function() {
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var address = $('#address').val();
            var phone = $('#phone').val();
            
            if(matp == '' || maqh=='' || xaid=="" || address =='' || phone =='') {
                alert('Vui lòng nhập đầy đủ thông tin để tính phí vận chuyển')
            }else{
                $.ajax({
                url : '{{url('/calculate-fee')}}',
                method : 'GET',
                data: {
                    matp:matp,
                    maqh:maqh,
                    xaid:xaid,
                    address:address,
                    phone:phone,
                },
                success: function() {
                    alert('Tính phí vận chuyển thành công');
                    location.reload()
                }
            });
            }
           
            
            
        });

        $('.nk-btn-click-add').click(function() {
            
            
            var id  = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_'+id).val();
            var cart_product_name = $('.cart_product_name_'+id).val();
            var cart_product_image = $('.cart_product_image_'+id).val();
            var cart_product_price = $('.cart_product_price_'+id).val();
            var cart_product_qty = $('.cart_product_qty_'+id).val();
            var cart_product_quantity = $('.cart_product_quantity_'+id).val();
            var _token = $('input[name="_token"]').val();
           
            $.ajax({
                url: "{{route('add.ajax')}}",
                method: 'GET', 
                data:{
                    cart_product_id:cart_product_id,
                    cart_product_name:cart_product_name,
                    cart_product_image:cart_product_image,
                    cart_product_price:cart_product_price,
                    cart_product_qty:cart_product_qty,
                    cart_product_quantity:cart_product_quantity,
                    _token:_token,
                },
                
                success:function(){
                    
                
                },

            });
            swal({
                title: "Đã thêm sản phẩm vào giỏ hàng",
                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                type: "success",
                showCancelButton: true,
                cancelButtonText: "Xem tiếp",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Đi đến giỏ hàng",
                closeOnConfirm: false,
            },
            
            function() {
                window.location.href = "{{url('/show-cart')}}";
            });
            
           
        });

        $('.add-detail-cart').click(function() {
            var id  = $(this).data('product_id_detail');
            var cart_product_id = $('.cart_product_id_'+id).val();
            var cart_product_name = $('.cart_product_name_'+id).val();
            var cart_product_image = $('.cart_product_image_'+id).val();
            var cart_product_price = $('.cart_product_price_'+id).val();
            var cart_product_quantity = $('.cart_product_quantity_'+id).val(); // Số lượng hàng tồn trong kho
            var cart_product_qty = $('.cart_product_qty_'+id).val();
            var _token = $('input[name="_token"]').val();

            if(cart_product_qty == '') {
                cart_product_qty = 1;
            }
           if(parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
                alert('Vui lòng đặt số lượng ít hơn' + cart_product_quantity);
           }else {

            $.ajax({
                    url: "{{route('add.ajax')}}",
                    method: 'GET', 
                    data:{
                        cart_product_id:cart_product_id,
                        cart_product_name:cart_product_name,
                        cart_product_image:cart_product_image,
                        cart_product_price:cart_product_price,
                        cart_product_qty:cart_product_qty,
                        cart_product_quantity:cart_product_quantity,
                        _token:_token,
                    },
                    
                    success:function(){
                        swal({
                            title: 'Đã thêm sản phẩm vào giỏ hàng',
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            type: "success",
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false,
                            color: '#716add',
                            background: '#fff',
                        },
                        
                        function() {
                            window.location.href = "{{url('/show-cart')}}";
                        });

                    },

                });
                
           }
            
        });
        
        $('.check_cart').click(function() {
            swal("Good job!", "Vui lòng tính phí vận chuyển", "info");
        });
        $('.nav_check_fee').click(function() {
            swal({
                title: "Bạn chưa tính phí vận chuyển",
                text: "Bạn có thể đi đến giỏ hàng để tính phí vận chuyển  và tiến hành thanh toán",
                showCancelButton: true,
                cancelButtonText: "Thoát",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Đi đến giỏ hàng",
                closeOnConfirm: false,
            },
            
            function() {
                window.location.href = "{{url('/show-cart')}}";
            });
        });


        $('.send_order').click(function() {
            swal({
                title: "Xác nhận đơn hàng",
                text: "Xác nhận đơn hàng",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Đồng ý",
                cancelButtonText: "Xem lại",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(isConfirm) {
                if (isConfirm) {
                    var name_shipping = $('.name_shipping').val();
                    var email_shipping = $('.email_shipping').val();
                    var phone_shipping = $('.phone_shipping').val();
                    var notes_shipping = $('.notes_shipping').val();
                    var order_fee = $('.order_fee').val();
                    var order_coupon = $('.order_coupon').val();
                    var order_method = $('.payment').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{url('/confim-order')}}",
                        method: 'GET', 
                        data:{
                            name_shipping:name_shipping,
                            email_shipping:email_shipping,
                            phone_shipping:phone_shipping,
                            notes_shipping:notes_shipping,
                            order_fee:order_fee,
                            order_coupon:order_coupon,
                            order_method:order_method,
                            _token:_token,
                        },
                        success:function(){
                            swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                        },
                        
                    });
                window.setTimeout(function() {
                    location.reload();
                }, 3000);
                } else {
                    swal("Đóng", "Đơn hành chưa được gửi, vui lòng hoàn tất đơn hàng", "error");
                }
            });
            
        });
    });

</script>
</body>
</html>
