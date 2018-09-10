@extends('admin.header')

@section('content')
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="{{asset('admin/user-lists')}}" class="btn btn-warning">Back</a></li>
		
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Members <small>Update Page</small></h1>
	<div class="row">
		<div class="col-md-12 well">
			<br>
			<div class="row">
				<div class="col-md-8">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/user/'.$member->id) }}">
						{{ csrf_field() }}{{method_field('PUT')}}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Name</label>

							<div class="col-md-8">
								<input id="name" type="text" class="form-control" name="name" value="{{ $member->name }}" autofocus>

								@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail Address</label>

							<div class="col-md-8">
								<input id="email" type="email" class="form-control" name="email" value="{{ $member->email }}">

								@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label for="role" class="col-md-4 control-label">Role</label>
							<div class="col-md-8">
								<select name="role" id="role" class="form-control">
									@foreach($roles as $role)
										@if($role->id == $member->role)
										<option value="{{$role->id}}" selected="selected">{{$role->name}}</option>
										@else
											<option value="{{$role->id}}">{{$role->name}}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
						<div class="col-md-8 col-md-offset-4 text-right">
								<button type="submit" class="btn btn-success">
									Upgate
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
