
<!DOCTYPE html>
<head>
<title>Web Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('/admincss/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('/admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('/admin/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('/admin/css/font.css')}}" type="text/css"/>
<link href="{{asset('/admin/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng nhập</h2>
	@php

		$message = session()->get('message');
		if(session()->get('message')) {
			echo "<div class='color: while'>$message</div>";
			session() -> forget('message');
		}
	@endphp
		<form action="{{url('/admin-dashboard')}}" method="post">
			@csrf
			<input type="email" class="ggg" name="admin_email" placeholder="Email" required="">
			<input type="password" class="ggg" name="admin_password" placeholder="Mật khẩu" required="">
			<span><input type="checkbox" />Ghi nhớ tôi</span>
			<h6><a href="#">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
				{{-- Recaptcha --}}
				<div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
				<br/>
				@if($errors->has('g-recaptcha-response'))
				<span class="invalid-feedback" style="display:block">
					<strong>{{$errors->first('g-recaptcha-response')}}</strong>
				</span>
				@endif
		</form>
		{{-- <a href="{{url('/register-auth')}}">Đăng ký Auth</a> --}}
		

		
</div>
</div>
<script src="{{asset('/admin/js/bootstrap.js')}}"></script>
<script src="{{asset('/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('/admin/js/scripts.js')}}"></script>
<script src="{{asset('/admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('/admin/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('/admin/js/jquery.scrollTo.js')}}"></script>
{{-- reCaptcha - google --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
