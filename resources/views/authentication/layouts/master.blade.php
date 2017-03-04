<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Tower">
	<meta name="keywords" content="Tower">
	<meta name="author" content="Satish Gurung">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tower</title>

	<!-- Stylesheets-->
	@section('stylesheets')
	<!-- Bootstrap CSS -->    
    <link href="{!! URL::asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Custom CSS -->    
    <link href="{!! URL::asset('css/style.css') !!}" rel="stylesheet">
    @show

</head>
<body>

	@yield('body')

	<!-- Scripts -->
	@section('scripts')
	<!-- JQuery -->
	<script type="text/javascript" src="{!! URL::asset('js/jquery-2.2.4.min.js') !!}"></script>
	<!-- Bootstrap JavaScripts -->
	<script type="text/javascript" src="{!! URL::asset('js/bootstrap.min.js') !!}"></script>
	<!-- Custom -->
	<script type="text/javascript" src="{!! URL::asset('js/custom.js') !!}"></script>
	@show
	
</body>
</html>