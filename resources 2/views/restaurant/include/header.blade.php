<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{url('public/restaurant/assets/img/favicon.png')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{url('public/restaurant/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{url('public/restaurant/assets/css/fonts.min.css')}}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{url('public/restaurant/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('public/restaurant/assets/css/atlantis.min.css')}}">
    <link href="{{url('public/restaurant/assets/css/mdtimepicker.css')}}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{url('public/restaurant/assets/css/custom.css')}}">
</head>
<body data-background-color="dark">
	<div class="wrapper header_logo">
		<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation" style="color: #fff;
		margin-top: 20px; margin-left: 24px !important;">
			<span class="navbar-toggler-icon">
				<i class="icon-menu"></i>
			</span>
        </button>
        
        @include('restaurant.include.sidebar')