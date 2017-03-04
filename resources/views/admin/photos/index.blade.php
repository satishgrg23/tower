@extends('admin.layouts.master')

@section('stylesheets')
    @parent
    <link href="{{ URL::asset('css/lightbox.css') }}" rel="stylesheet">
@endsection

@section('body')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-bars"></i>Tower Report Photos</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <label class="float-left">Tower Report Photos</label>
                            <a href="{{ URL::to('admin/towerReport') }}" class="btn btn-success" style="float: right;">back</a>
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
                                <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Folder</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0; $i<count($folder); $i++)
                                            <tr>
                                                <td>{{ $folder[$i]['filename'] }}</td>
                                                <td>
                                                    <a href="{{ URL::to('admin/exportSpecificPhoto/'.$folder[$i]['filename']) }}" class="btn btn-primary">Download</a>
                                                </td>
                                            </tr>
                                        @endfor
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
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/jquery-2.2.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/lightbox.min.js') }}"></script>
    
    <script src="{{ URL::asset('js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
    <!-- Bootstrap JavaScripts -->
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script>
        lightbox.option({
          'resizeDuration': 200,
          'wrapAround': true
        })
    </script>
@endsection