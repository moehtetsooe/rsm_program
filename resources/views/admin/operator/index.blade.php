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
	<!-- <ol class="breadcrumb pull-right">
		<li><a href="{{url('admin/operator/create')}}" class="btn btn-success">Create New Member</a></li>
		
	</ol> -->
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Assigned <small>Job Lists</small></h1>
	<div class="row">
		<div class="col-md-12">
			<table  class="table table-striped table-bordered data-table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Assigned Job</th>
						<th>Total Files</th>
						<th>Remaining Files</th>
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
						<td></td>
						<td></td>
						<td>{{ $list->from_date }}</td>
						<td>{{ $list->to_date }}</td>
						<td>
							<a class="btn btn-info btn-xs" href="job-detail/{{$list->id}}"><i class="fa fa-eye"></i> View</a>
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
<script>
	
</script>
@endsection