@extends('admin.header')
@section('css')
<style>
	.btn-default.btn-on.active{background-color: #5BB75B;color: white;}
	.btn-default.btn-off.active{background-color: #DA4F49;color: white;}
</style>
@endsection
@section('content')
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="{{url('admin/job-assign/create')}}" class="btn btn-success">Create New Assign</a></li>
		
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Job Asssign Lists <small></small></h1>
	<div class="row">
		<div class="col-md-12">
			<table  class="table table-striped table-bordered data-table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Assigned Job</th>
						<th>From Date</th>
						<th>To Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php
						$i = 1;
					@endphp
					@foreach($jobLists as $list)
					<tr>
						<td>{{ $i }}</td>
						<td>{{ $list->job_code }}</td>
						<td>{{ $list->from_date }}</td>
						<td>{{ $list->to_date }}</td>
						<td>
							<a class="btn btn-info btn-xs" href="{{ route('job-assign.show',$list->id) }}"><i class="fa fa-eye"></i> Show</a>
	                    	<a class="btn btn-warning btn-xs" href="{{ route('job-assign.edit',$list->id) }}"><i class="fa fa-edit"></i> Edit</a>
	                    	<!-- {!! Form::open(['url' => 'admin/job-assign/'.$list->id, 'method' => 'delete', 'style'=>'display:inline;']) !!}
	                    	<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</button>
	                    	{!! Form::close() !!} -->
						</td>
					</tr>
					@php
						$i++;
					@endphp
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@section('js')
@endsection