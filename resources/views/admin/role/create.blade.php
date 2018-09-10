@extends('admin.header')
@section('css')
	<style>
		.selectedRole{
			display: none;
		}
	</style>
@endsection
@section('content')
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="{{asset('admin/role')}}" class="btn btn-warning">Back</a></li>
		
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Role <small>Create Page</small></h1>
	<div class="row">
		<div class="col-md-12 well">
			<br>
			<div class="row">
				<div class="col-md-8">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/role') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Role</label>

							<div class="col-md-8">
								<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus required="required">

								@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label for="role" class="col-md-4 control-label">Role</label>
							<div class="col-md-8">
								<select name="role" id="role" class="form-control">
									<option value="1">Super Admin</option>
									<option value="2">Team Leader</option>
									<option value="3">Operator</option>
									<option value="4">Checker</option>
								</select>
							</div>
						</div>

						<div class="form-group">
						<div class="col-md-8 col-md-offset-4 text-right">
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
@section('js')
@endsection