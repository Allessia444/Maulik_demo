<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>	
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>  @yield('title') </title>
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="{!! asset('css/admin.css') !!}">
	@yield('css')
	
</head>
<body class="animsition">

    @include('admin.shared.header')
  @include('admin.shared.sidebar')
		

		<div class="main-container">
<!-- 		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30"> -->
				
    		@yield('page')
<!-- 			</div>
		</div> -->
		</div>
  
  <!--  Page -->
  <!-- End Page -->

  <!---  Core  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{!! asset('/js/admin.js') !!}"></script>

@yield('script')
</body>

</html>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-119386393-1');
	</script>
	