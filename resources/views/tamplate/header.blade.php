<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('judul')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('AdminLTE')}}/assets/profile/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('AdminLTE')}}/assets/profile/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('AdminLTE')}}/assets/profile/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('AdminLTE')}}/assets/profile/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('AdminLTE')}}/assets/profile/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{asset('AdminLTE')}}/assets/profile/css/owl.theme.default.min.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('AdminLTE')}}/assets/profile/css/flexslider.css">

	<!-- Pricing -->
	<link rel="stylesheet" href="{{asset('AdminLTE')}}/assets/profile/css/pricing.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('AdminLTE')}}/assets/profile/css/style.css">

	<!-- Modernizr JS -->
	<script src="{{asset('AdminLTE')}}/assets/profile/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="{{asset('AdminLTE')}}//assets/profile/js/respond.min.js"></script>
	<![endif]-->

</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page" >
		<nav class="fh5co-nav" role="navigation">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-right">
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="fh5co-logo"><a href=""><i class="icon-study"></i> Al-Musri<span>.</span></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="{{ route('beranda') }}">Beranda</a></li>
								<li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
								<li><a href="{{ route('pengajar') }}">Pengajar</a></li>
								<li><a href="{{ route('biaya') }}">Biaya</a></li>
								<li><a href="{{ route('berita') }}">Berita</a></li>
								<li class="btn-cta"><a href="{{ route('login') }}"><span>Login</span></a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</nav>
