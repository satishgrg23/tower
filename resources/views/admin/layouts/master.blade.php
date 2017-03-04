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
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font-awesome CSS -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/font-awesome/css/font-awesome.min.css') }}" />
        <!-- Data table Css -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/dataTables.bootstrap.css') }}" />
        <!-- Custom CSS -->
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/style-responsive.css') }}" rel="stylesheet">
    @show

</head>
<body>
    <!-- container section start -->
    <section id="container" class="">
        @include('admin.includes.header')

        @include('admin.includes.sidebar')

        @yield('body')
    </section>
    <!-- container section end -->

<!-- Scripts -->
@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ URL::asset('js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
    <!-- Bootstrap JavaScripts -->
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{!! URL::asset('js/jquery.scrollTo.min.js') !!}"></script>
    <script type="text/javascript" src="{!! URL::asset('js/jquery.nicescroll.js') !!}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/scripts.js') }}"></script>
    @show

</body>
</html>