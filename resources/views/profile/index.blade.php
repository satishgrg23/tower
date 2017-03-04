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
    @show

</head>
<body>
    <!-- container section start -->
    <section id="container" class="">
    @if (Sentinel::getUser()->inRole('admin'))
        @include('admin.includes.header')

        @include('admin.includes.sidebar')
    @else
        @include('user.includes.header')

        @include('user.includes.sidebar')
    @endif
        

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-bars"></i>Profile</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <label class="float-left">Profile</label>
                        </header>
                        <!-- Div to display success or error message -->
                        <div class="panel-body">
                            @if (Session::has('flash_msg'))
                                <div class="alert alert-success">
                                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ Session::get('flash_msg') }}
                                </div>
                            @endif
                            
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Fullname:</td>
                                        <td>{{ $user->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Joined date</td>
                                        <td>{{ $user->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <a href="{{ url('/editProfile') }}" class="btn btn-primary" style="margin-right: 20px;">Edit Profile</a> -->
                            <a href="{{ url('/changePassword') }}" class="btn btn-success">Change Password</a>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!--main content end-->
    </section>
    <!-- container section end -->

<!-- Scripts -->
@section('scripts')
    <!-- JQuery -->
    <script type="text/javascript" src="{!! URL::asset('js/jquery-2.2.4.min.js') !!}"></script>
    {{--Datatable JS--}}
    <script src="{{ URL::asset('js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
    <!-- Bootstrap JavaScripts -->
    <script type="text/javascript" src="{!! URL::asset('js/bootstrap.min.js') !!}"></script>
    <!-- Custom -->
    <script type="text/javascript" src="{!! URL::asset('js/custom.js') !!}"></script>
@show

</body>
</html>


