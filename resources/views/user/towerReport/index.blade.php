@extends('user.layouts.master')

@section('body')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-bars"></i>Tower Report</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <label class="float-left">User List</label>
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
                            <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tower link</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($towerlink as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->tower_link }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- Edit trekking site button -->
                                                    <a class="btn btn-primary btn-edit" href="{{ URL::to('user/towerReport/'.$data->id) }}">
                                                        <i class="icon-plus"> Add</i>
                                                    </a>
                                                    <a class="btn btn-primary btn-success" href="{{ URL::to('user/towerReport/view/'.$data->id) }}">
                                                        <i class="icon-edit"> View</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
@endsection