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
                        <li><i class="fa fa-bars"></i>Downloads</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <label class="float-left">Downloads</label>
                            
                                @if ($user = Sentinel::getUser())
        
                                @if ($user->inRole('admin'))
                                    <a class="float-right" href="{{ URL::to('/downloads/create') }}">
                                        <span class="icon-plus-sign">&nbsp;</span>Add Downloads
                                    </a>
                                @endif

                                @endif
                                
                        </header>
                        <!-- Div to display success or error message -->
                        <div class="panel-body">
                            @if (Session::has('flash_msg'))
                                <div class="alert alert-success">
                                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ Session::get('flash_msg') }}
                                </div>
                            @endif
                            <!-- Data table to display the records of trekking sites -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($downloads as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                <a href="{{ URL::to('/downloadFile/'.$data->file) }}" class="btn btn-primary">Download</a>
                                                @if ($user = Sentinel::getUser())
        
                                                @if ($user->inRole('admin'))
                                                    <form class="form-delete" action="/downloads/{{ $data->id }}" method="post">
                                                        <input type="hidden" name="_method" value="delete">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                            <i class="icon-remove"> Delete</i>
                                                        </button>
                                                    </form>
                                                @endif

                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
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


