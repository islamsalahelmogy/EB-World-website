<!doctype html>
<html lang="en">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="{{config('app.name')}}" name="description">
        
		<!-- Favicon -->
		<link rel="icon" href="{{asset('assets/images/brand/favicon.ico')}}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/brand/favicon.ico')}}" />

		<!-- Title -->
		<title>{{config('app.name')}}</title>

		<!-- Bootstrap css -->
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.rtl.css')}}" rel="stylesheet" />

		<!-- Style css -->
		<link href="{{asset('assets/css-rtl/style.css')}}" rel="stylesheet" />

		<!-- Font-awesome  css -->
		<link href="{{asset('assets/css-rtl/icons.css')}}" rel="stylesheet"/>

		<!--Select2 css -->
		<link href="{{asset('assets/plugins/select2/select2-rtl.css')}}" rel="stylesheet" />

		<!-- Data table css -->
		<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5-rtl.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min-rtl.css')}}" rel="stylesheet" />


		<!-- Owl Theme css-->
		<link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

		<!-- Flex Datalist-->
		<link href="{{asset('assets/plugins/jquery.flexdatalist/jquery.flexdatalist.css')}}" rel="stylesheet" />

		<!-- Color Skin css -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/color-skins-rtl/color.css')}}" />
		<style>
			.horizontalMenucontainer {
				background-image: url('{{asset("assets/images/banners/pattern2.png")}}');
			}
			.line-clamp {
				display: -webkit-box;
				-webkit-line-clamp: 3;
				-webkit-box-orient: vertical;  
				overflow: hidden;
				text-align: justify
			}
			
			
		</style>
		@stack('css')
	</head>

	<body>
        <!--Loader-->
		<div id="global-loader">
			<img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="img">
		</div>
        <!--/Loader-->


        @yield('body')
        
    
		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-long-arrow-up"></i></a>

		<!-- JQuery js-->
		<script src="{{asset('js/app.js')}}"></script>

		<script src="{{asset('assets/js/jquery.min.js')}}"></script>

		<!-- Bootstrap js -->
		<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap-rtl.js')}}"></script>

		<!--JQuery IT Coursesrkline js-->
		<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>

		<!-- Circle Progress js-->
		<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

		<!-- Star Rating js-->
		<script src="{{asset('assets/plugins/jquery-bar-rating/jquery.barrating.js')}}"></script>
		<script src="{{asset('assets/plugins/jquery-bar-rating/js/rating.js')}}"></script>

		<!--Owl Carousel js -->
		<script src="{{asset('assets/plugins/owl-carousel/owl.carousel.js')}}"></script>

		<!--Horizontal Menu js-->
		<script src="{{asset('assets/plugins/horizontal-menu/horizontal-menu.js')}}"></script>

		<!--Counters -->
		<script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>
		<script src="{{asset('assets/plugins/counters/waypoints.min.js')}}"></script>
		<script src="{{asset('assets/plugins/counters/numeric-counter.js')}}"></script>

		<!--JQuery TouchSwipe js-->
		<script src="{{asset('assets/js/jquery.touchSwipe.min.js')}}"></script>

		<!-- Data tables -->
		<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
		<script src="{{asset('assets/js/datatable.js')}}"></script>

		<!--Select2 js -->
		<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{asset('assets/js/select2.js')}}"></script>

		<!-- Jquery flex data list js -->
		<script src="{{asset('assets/plugins/jquery.flexdatalist/jquery.flexdatalist.js')}}"></script>
		<script src="{{asset('assets/plugins/jquery.flexdatalist/data-list.js')}}"></script>

		<!-- sticky js-->
		<script src="{{asset('assets/js/sticky.js')}}"></script>

		<!-- Scripts js-->
		<script src="{{asset('assets/js/owl-carousel-rtl.js')}}"></script>

		<!-- Custom js-->
		<script src="{{asset('assets/js/custom.js')}}"></script>
		@stack('js')

	</body>
</html>