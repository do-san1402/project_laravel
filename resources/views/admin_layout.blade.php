
<!DOCTYPE html>
<head>
<title>ADMIN-GOODGAME</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}">
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
{{-- <link rel="stylesheet" href="{{asset('admin/css/font.css')}}" type="text/css"/> --}}
<link href="{{asset('admin/css/fontawesome.css')}}" rel="stylesheet" type="text/css"> 
<link rel="stylesheet" href="{{asset('admin/css/morris.css')}}" type="text/css"/>
<!-- tiny-->
<script src="https://cdn.tiny.cloud/1/kokabcjqsbgsuees8pvryordn6ed506dszgkuwhc8cd4njgk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    var editor_config = {
      path_absolute : "http://localhost/back-end/laravelPro/project_laravel/admin",
      selector: 'textarea',
      relative_urls: false,
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table directionality",
        "emoticons template paste textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      file_picker_callback : function(callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.openUrl({
          url : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no",
          onMessage: (api, message) => {
            callback(message.content);
          }
        });
      }
    };
  
    tinymce.init(editor_config);
  </script>


<!-- calendar -->
<link rel="stylesheet" href="{{asset('admin/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('admin/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('admin/js/raphael-min.js')}}"></script>
<script src="{{asset('admin/js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{url('/dashboard')}}" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username">
                    @php
                    if(session() -> get('admin_login')) {
                        echo session() -> get('admin_login');
                    }
                    @endphp
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Th??ng tin</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> C??i ?????ng </a></li>
                <li><a href="{{url('/logout-admin')}}"><i class="fa fa-key"></i> ????ng xu???t</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh m???c s???n ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/add-category-product')}}">Th??m m???i danh m???c</a></li>
						<li><a href="{{url('/all-category-product')}}">Danh s??ch danh m???c</a></li>
                        
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Th????ng hi???u s???n ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/add-brand-product')}}">Th??m m???i th????ng hi???u</a></li>
						<li><a href="{{url('/all-brand-product')}}">Danh s??ch th????ng hi???u</a></li>
                        
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>S???n ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/add-product')}}">Th??m m???i s???n ph???m</a></li>
						<li><a href="{{url('/all-product')}}">Danh s??ch s???n ph???m</a></li>
                        
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>????n h??ng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/manager-order')}}">Qu???n l?? ????n h??ng</a></li>
						
                        
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Banner</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/manager-banner')}}">Qu???n l?? banner</a></li>
						<li><a href="{{url('/create-banner')}}">Th??m banner</a></li>
                        
                    </ul>
                </li>

                

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>M?? gi???m gi??</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/insert-coupon')}}">Th??m m?? gi???m gi?? </a></li>
						<li><a href="{{url('/list-coupon')}}">Qu???n l?? m?? gi???m gi?? </a></li>
						
                        
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>V???n chuy???n</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/delivery')}}">Qu???n l?? v???n chuy???n</a></li>
						
                        
                    </ul>
                </li>
                <?php
                    if(session() -> get('roles') == 'admin') {
                        ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span>Users</span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{url('/all-users')}}">Li???t k?? Users </a></li>
                                    <li><a href="{{url('/store-users')}}">Th??m User </a></li>
                                    
                                    
                                </ul>
                            </li>
                        <?php
                    }
                ?>
                
                


				
                
                
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		
		
	    
		@yield('admin_content')
		
		
    </section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>?? 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('admin/js/bootstrap.js')}}"></script>
<script src="{{asset('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('admin/js/scripts.js')}}"></script>
<script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script type="text/javascript">
    $('.update_quantity_order').click(function() {
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_'+order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{url('/update-order-number')}}',
            method: 'get',
            data: {
                _token: _token,
                order_product_id:order_product_id,
                order_qty:order_qty,
                order_code:order_code,
            }, 
            success:function() {
                alert('C???p nh???t s??? l?????ng th??nh c??ng');
                location.reload();
            }
        });

    });
    $('.order_detail').change(function() {
        var order_status = $(this).val();
        var order_id = $(this).children(':selected').attr('id');
        var _token = $('input[name="_token"]').val();
        // L???y s??? l?????ng t???t c??? ????n h??ng
        quantity = [];
        $('input[name="product_sales_qty"]').each(function() {
            quantity.push($(this).val());
        })
        // L???y id t???t c??? ????n h??ng
        order_product_id = [];
        $('input[name="product_qty_id"]').each(function() {
            order_product_id.push($(this).val());
        })
        j = 0 ;
        for(i=0;i<order_product_id.length;i++) {
            var order_qty = $('.order_qty_' + order_product_id[i]).val();
            var order_qty_storage = $('.order_qty_storage_'+ order_product_id[i]).val();
            if(parseInt(order_qty) > parseInt(order_qty_storage)) {
                j = j + 1;
                if(j == 1) {
                    alert('S??? l?????ng h??ng trong kho kh??ng ?????');
                }
                $('.color_qty_'+order_product_id[i]).css('background', '#000');
            }
        }
        if(j==0) {
            $.ajax({
                url: '{{url('/update-order-status')}}',
                method: 'get',
                data: {
                    _token: _token,
                    order_status:order_status,
                    order_id:order_id,
                    quantity:quantity,
                    order_product_id:order_product_id,
                }, 
                success:function() {
                    alert('Thay ?????i t??nh tr???ng ????n h??ng th??nh c??ng');
                    location.reload();
                }
            });

        }

      
    });
    
    $(document).ready(function() {
        fetch_delivery();
        function fetch_delivery() {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/select-feeship')}}',
                method: 'GET',
                data: {
                    _token: _token,
                }, 
                success:function(data) {
                    $('#load_delivery').html(data);
                }
            });
        };
        $(document).on('blur', '.fee_feeship_edit', function() {
            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method : 'GET',
                data: {
                    feeship_id: feeship_id,
                    fee_value: fee_value,
                  
                },
                success: function(data) {
                    fetch_delivery();
                 
                }
            });

        })
        $('.add_delivery').click(function() {
            var city = $('.city').val();
            var province = $('.province').val();
            var wards = $('.wards').val();
            var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/insert-delivery')}}',
                method : 'GET',
                data: {
                    city:city,
                    province:province,
                    wards: wards,
                    fee_ship:fee_ship,
                    _token: _token,
                },
                success: function(data) {
                    alert('Th??m ph?? v???n chuy???n th??nh c??ng');
                 
                }
            });

        });
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
                url : '{{url('/select-delivery')}}',
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
    })
</script>

<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
    
<!-- calendar -->
	<script type="text/javascript" src="{{asset('admin/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
