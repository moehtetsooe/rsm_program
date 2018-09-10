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
		<li><a href="{{url('admin/role/create')}}" class="btn btn-success">Create New Role</a></li>
		
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Role <small></small></h1>
	<div class="row">
		<div class="col-md-12">
			<table  class="table table-striped table-bordered data-table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php
						$i = 1;
					@endphp
					@foreach($roles as $role)
						<tr>
							<td>@php echo $i; @endphp</td>
							<td>{{ $role->name }}</td>
							<td>
								@if($role->role == 1)
								Super Admin
								@elseif($role->role == 2)
								Team Leader
								@elseif($role->role == 3)
								Operator
								@else
								Checker
								@endif
							</td>
							<td>
								@if($role->id != 1)
		                    	<a class="btn btn-warning btn-xs" href="{{ route('role.edit',$role->id) }}"><i class="fa fa-edit"></i> Edit</a>
		                    	@endif
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