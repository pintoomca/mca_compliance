

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Consulting HTML-5 Template </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="manifest" href="site.html">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/master/assets/img/favicon.ico')}}">

<link rel="stylesheet" href="{{asset('assets/master/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/master/assets/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/master/assets/css/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('assets/master/assets/css/slicknav.css')}}">
<link rel="stylesheet" href="{{asset('assets/master/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/master/assets/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('assets/master/assets/css/fontawesome-all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/master/assets/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('assets/master/assets/css/slick.css')}}">
<link rel="stylesheet" href="{{asset('assets/master/assets/css/nice-select.css')}}">
<link rel="stylesheet" href="{{asset('assets/master/assets/css/style_forum.css')}}">
@yield('css')

</head>
<body>

<div id="preloader-active">
<div class="preloader d-flex align-items-center justify-content-center">
<div class="preloader-inner position-relative">
<div class="preloader-circle"></div>
<div class="preloader-img pere-text">
<img src="{{asset('assets/master/assets/img/logo/logo.png')}}" alt="">
</div>
</div>
</div>
</div>
@include('layout.header');
<main>

@yield('content')

</main>
@include('layout.footer');

@yield('js')


<script src="{{asset('assets/master/assets/js/vendor/modernizr-3.5.0.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/master/assets/js/vendor/jquery-1.12.4.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('assets/master/assets/js/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/master/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/master/assets/js/jquery.slicknav.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/master/assets/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/master/assets/js/slick.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/master/assets/js/gijgo.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/master/assets/js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/master/assets/js/animated.headline.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/master/assets/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/master/assets/js/jquery.scrollUp.min.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('assets/master/assets/js/jquery.nice-select.min.js')}}" type="text/javascript"></script> -->
<script src="{{asset('assets/master/assets/js/jquery.sticky.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/master/assets/js/contact.js')}}" type="text/javascript"></script>
 <script src="{{asset('assets/master/assets/js/jquery.form.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/master/assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/master/assets/js/mail-script.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/master/assets/js/jquery.ajaxchimp.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/master/assets/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/master/assets/js/main.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/master/ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="|49" defer=""></script></body>

</html>

