<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') </title>
<!-- / Yoast SEO plugin. -->
<link rel="icon" href="{{ asset('asset/uploads/2018/01/logo-1.png') }}" >
<link rel='stylesheet' id='s7upf-google-fonts-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C700%7CDosis%3A300%2C400%2C700&amp;ver=4.9.2' type='text/css' media='all' />

<!-- CSS -->
<link href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel='stylesheet' id='font-awesome-css'  href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}" type='text/css' media='all' />

<link rel='stylesheet' href="{{ asset('asset/bootstrap/css/bootstrap-theme.min.css') }}" type='text/css' />
<link rel='stylesheet' id='s7upf-theme-css'  href="{{ asset('asset/css/theme.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='s7upf-theme-style-css'  href="{{ asset('asset/css/custom-style.css') }}" type='text/css' media='all' />
<link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" type='text/css' media='all'>

<link rel="stylesheet" href="{{ asset('asset/themes/plugin/js_composer/assets/css/js_composer.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/responsive.css') }}">

<link rel="stylesheet" href="{{ asset('asset/bootstrap/css/hover.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/bootstrap/css/color.css') }}">

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.jcarousellite.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

<script src="{{ asset('asset/themes/plugin/owl.carousel.min.js') }}"></script>
<!-- botman -->
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
<style>
	.s7upf-slider.about-store-slider {
        min-height: 375px;
    }
    .wrap-item.sv-slider.pagi-nav-style.owl-carousel.owl-theme {
        margin: 30px auto;
    }
</style>
</head>
<body>
	<div class="wap">
		@include('client.layouts.header')
		<div id="main-content" class="visual-template">
			<div class="container">
                <div class="row">
                    <div class="content-wrap col-md-12 col-sm-12 col-xs-12">
                        <article id="post-868" class="post-868 page type-page status-publish hentry">
                            <div class="entry-content">
								@yield('content')
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
		@include('client.layouts.footer')
		<a href="#" class="scroll-top dark active"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
	</div>
	@yield('script')
	<script>
	   var botmanWidget = {
	       // frameEndpoint: 'chat.blade.php',
	       title: 'Demo Botman',
	       introMessage: 'Chào bạn! Để được hỗ trợ, soạn "Bắt đầu" .',
	       displayMessageTime: true,
	       // chatserver: borman.
	   };
	</script>
</body>
</html>
