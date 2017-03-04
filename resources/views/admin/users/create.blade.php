@extends('admin.layouts.master')

@section('body')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-bars"></i>Users</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <label class="float-left">Add User</label>
                        </header>
                        <!-- Div to display success or error message -->
                        <div class="panel-body">
                            <!-- Form starts -->
                            <form action="/admin/users" method="POST" onclick="return validateMsg();">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="full_name">Fullname</label>
                                    <div class="input-div">
                                        <input type="text" name="full_name" id="full_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-div">
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-div">
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password1">Confirm Password</label>
                                    <div class="input-div">
                                        <input type="password" name="password1" id="password1" class="form-control" required>
                                        <span id="validate-status"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password1">Role</label>
                                    <div class="input-div">
                                        <select name="role" class="form-control">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
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