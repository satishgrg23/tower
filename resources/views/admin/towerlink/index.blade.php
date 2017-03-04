
@extends('admin.layouts.master')

@section('body')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-bars"></i>Tower Link</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <label class="float-left">Tower Link List</label>
                            <!-- link to add trekking sites -->
                            <a class="float-right" href="{{ URL::to('admin/towerlink/create') }}">
                                <span class="icon-plus-sign">&nbsp;</span>Add Tower Link
                            </a>
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
                                    <th>Id</th>
                                    <th>Tower Link</th>
                                    <th>Assigned user</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($tower as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->tower_link }}</td>
                                            <td>{{ $data->user->full_name }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- Edit trekking site button -->
                                                    <a class="btn btn-primary btn-edit" href="{{ URL::to('admin/towerlink/'.$data->id) }}">
                                                        <i class="icon-desktop"> View Report</i>
                                                    </a>
                                                    <a class="btn btn-success btn-edit" href="{{ URL::to('admin/towerlink/'.$data->id.'/edit') }}">
                                                        <i class="icon-edit"> Edit Link</i>
                                                    </a>
                                                    <form class="form-delete" action="/admin/towerlink/{{ $data->id }}" method="post">
													    <input type="hidden" name="_method" value="delete">
													    <input type="hidden" name="_token" value="{{ csrf_token() }}">
													    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
													    	<i class="icon-remove"> Delete Link</i>
													    </button>
													</form>
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