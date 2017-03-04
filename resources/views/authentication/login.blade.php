@extends('authentication.layouts.master')


@section('body')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="margin-top: 100px;">
				{{--Error message--}}
				@if (Session::has('flash_msg'))
					<div class="alert alert-danger">
						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ Session::get('flash_msg') }}
					</div>
				@endif
				<!-- Panel begins -->
				<div class="panel panel-primary login-box">
					<!-- Panel heading begins-->
					<div class="panel-heading">
						<h3 class="panel-title">Login</h3>
					</div>
					<!-- Panel heading ends -->

					<!-- Panel body starts -->
					<div class="panel-body">
						<!-- Form starts -->
						<form action="/login" method="POST">
							{{ csrf_field() }}

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
								<input type="submit" value="Login" class="btn btn-primary">
							</div>

						</form>
						<!-- Form ends -->
					</div>
					<!-- Panel body ends -->

				</div>
				<!-- Panel ends -->
			</div>
		</div>
	</div>
@endsection