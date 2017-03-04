@extends('admin.layouts.master')

@section('body')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li><i class="fa fa-bars"></i>Tower Link</li>
                        <li><i class="fa fa-bars"></i>Edit Tower Link</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <label class="float-left">Edit Tower Link</label>
                        </header>
                        <!-- Div to display success or error message -->
                        <div class="panel-body">
                            <!-- Form starts -->
                            <form action="/admin/towerlink/{{ $towerlink->id }}" method="POST">

                                <div class="form-group">
                                    <label for="tower_link">Tower Link</label>
                                    <div class="input-div">
                                        <input type="text" name="tower_link" id="tower_link" class="form-control" value="{{ $towerlink->tower_link }}" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="password1">Assign User</label>
                                    <div class="input-div">
                                        <select name="user_id" class="form-control">
                                            <option value="{{ $towerlink->user_id }}" selected="selected">{{ $towerlink->user->full_name }}</option>
                                            @foreach($user as $users)
                                                <option value="{{ $users->id }}">{{ $users->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>

                            </form>
                            <!-- Form ends -->
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
@endsection