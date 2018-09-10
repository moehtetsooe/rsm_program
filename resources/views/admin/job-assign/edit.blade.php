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
		<li><a href="{{asset('admin/job-assign')}}" class="btn btn-warning">Back</a></li>
		
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Job Assign <small>{{ $jobAssign->job_code }} Page</small></h1>
	<div class="row">
		<div class="col-md-12 well">
			<br>
			<div class="row">
				<div class="col-md-8">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/job-assign/'.$jobAssign->id) }}" enctype="multipart/form-data">
						{{ csrf_field() }}{{method_field('PUT')}}
						<fieldset>
							<div class="form-group">
								<label for="jobTitle" class="col-md-4 control-label">Job Title</label>
								<div class="col-md-6">
									<input id="jobTitle" type="text" class="form-control" name="jobTitle" required="required" autofocus value="{{ $jobAssign->job_code }}">
								</div>
							</div>
							<div class="form-group">
							    <label for="assignFile" class="col-md-4 control-label">Assign File</label>
							    <div class="col-md-6">
							    	<input type="file" webkitdirectory mozdirectory id="exampleInputFile" name="assignFile[]" class="form-control" multiple>
							    </div>
							</div>
							<div class="form-group">
								<label for="fromDate" class="col-md-4 control-label">From Date</label>
								<div class="col-md-6">
							        <div class='input-group date' id='datetimepicker1'>
							        	<input type='text' class="form-control" name="fromDate" value="{{ $fromdate }}" />
							          	<span class="input-group-addon">
							            	<span class="glyphicon glyphicon-calendar"></span>
							          	</span>
							        </div>
						        </div>
						    </div>
							<div class="form-group">
								<label for="toDate" class="col-md-4 control-label">To Date</label>
								<div class="col-md-6">
									<div class='input-group date' id='datetimepicker2'>
							        	<input type='text' class="form-control" name="toDate" value="{{ $todate }}" />
							          	<span class="input-group-addon">
							            	<span class="glyphicon glyphicon-calendar"></span>
							          	</span>
							        </div>
								</div>
							</div>
							<div class="form-group">
								<label for="estimatedTime" class="col-md-4 control-label">Estimated Completion Time</label>
								<div class="col-md-6">
									<input id="estimatedTime" type="text" class="form-control" name="estimatedTime" required="required" autofocus value="{{ $jobAssign->estimate_complete_time}}">
								</div>
							</div>
							<div class="form-group">
								<label for="assignOperatior" class="col-md-4 control-label">Operatior Assign</label>
								<div class="col-md-6">
									<select multiple="multiple" id='lstBox1' class="form-control" name="assign_operator[]" required="required">
										@foreach($roles as $role)
											<option value="{{ $role->id }}">{{ $role->name }}</option>
										@endforeach
								  	</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4 text-right">
									<input type="text" hidden="hidden" name="updated_by" value="{{Auth::guard('admin')->user()->id}}">
									<button type="submit" class="btn btn-success">Update Assign Job</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
@endsection