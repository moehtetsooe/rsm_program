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
					<div class="row">
						<div class="col-md-4 text-right">
							<b>Job Code :</b>
						</div>
						<div class="col-md-8">{{ $jobAssign->job_code }}</div>
					</div><br>
					<div class="row">
						<div class="col-md-4 text-right">
							<b>Form Date :</b>
						</div>
						<div class="col-md-8">
							{{ Carbon\Carbon::parse($jobAssign->fromDate)->format('d-M-Y h:i:s') }}
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-4 text-right">
							<b>To Date :</b>
						</div>
						<div class="col-md-8">
							{{ Carbon\Carbon::parse($jobAssign->todate)->format('d-M-Y h:i:s') }}
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-4 text-right">
							<b>Estimate Time :</b>
						</div>
						<div class="col-md-8">
							{{ $jobAssign->estimate_complete_time }}
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-4 text-right">
							<b>Assigned Operator :</b>
						</div>
						<div class="col-md-8">
							@foreach($names as $key=>$vale)
								@php
									echo $names[$key].',&nbsp;';
								@endphp
							@endforeach
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-4 text-right">
							<b>Assigned Images :</b>
						</div>
						<div class="col-md-8">
							
						</div>
					</div><br>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
@endsection