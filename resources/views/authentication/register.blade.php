@extends('authentication.layouts.master')


@section('body')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<!-- Panel begins -->
				<div class="panel panel-primary">
					<!-- Panel heading begins-->
					<div class="panel-heading">
						<h3 class="panel-title">Register</h3>
					</div>
					<!-- Panel heading ends -->

					<!-- Panel body starts -->
					<div class="panel-body">
						<!-- Form starts -->
						<form action="/register" method="POST" onclick="return validateMsg();">
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
					<!-- Panel body ends -->

				</div>
				<!-- Panel ends -->
			</div>
		</div>
	</div>
@endsection