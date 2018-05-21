@extends('admin.header')

@section('content')
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="{{asset('admin/user-lists')}}" class="btn btn-warning">Back</a></li>
		
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Users <small>Create Page</small></h1>
	<div class="row">
		<div class="col-md-12 well">
			<br>
			<div class="row">
				<div class="col-md-8">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/user/create') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Name</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

								@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail Address</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

								@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Password</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password">

								@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation">

								@if ($errors->has('password_confirmation'))
								<span class="help-block">
									<strong>{{ $errors->first('password_confirmation') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
						<div class="col-md-6 col-md-offset-4 text-right">
								<button type="submit" class="btn btn-success">
									Create
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
