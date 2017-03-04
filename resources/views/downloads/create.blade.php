@extends('admin.layouts.master')

@section('body')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li><i class="fa fa-bars"></i>Downloads</li>
                        <li><i class="fa fa-bars"></i>Add Downloads</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <label class="float-left">Add Downloads</label>
                        </header>
                        <!-- Div to display success or error message -->
                        <div class="panel-body">
                            <!-- Form starts -->
                            <form action="/downloads" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <div class="input-div">
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="download_file">File</label>
                                    <div class="input-div">
                                        <input type="file" name="download_file" class="form-control">
                                    </div>
                                    
                                </div>


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