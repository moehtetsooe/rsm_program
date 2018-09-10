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
		<li><a href="{{url('admin/user/create')}}" class="btn btn-success">Create New Member</a></li>
		
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Members <small></small></h1>
	<div class="row">
		<div class="col-md-12">
			<table  class="table table-striped table-bordered data-table">
				<thead>
					<tr>
						<th>Name</th>
						<th>E-mail</th>
						<th>Role</th>
						@admin
						<th>Action</th>
						@endadmin
					</tr>
				</thead>
				<tbody>
					@foreach($members as $member)
					<tr>
						<td>{{$member->name}}</td>
						<td>{{$member->email}}</td>
						<td>{{ $member->roleName }}</td>
						@admin
						<td>
							@if($member->id != 1)
		                    	<a class="btn btn-warning btn-xs" href="{{ route('user.edit',$member->id) }}"><i class="fa fa-edit"></i> Edit</a>
		                    @endif
						</td>
						@endadmin
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@section('js')
<script>
	$(document).on('click','.change-status-one',function () {
		var id = $(this).data('id');
		var role = 1;
		$.ajax({
			url: "{{url('admin/change/user-status')}}",
			type: "GET",
			data: {'id' : id, 'role' : role},
			success: function(data){
				//console.log(data);
				$('.role-'+data.id).text('Admin');
				$.gritter.add({
	                title: "Successfully Updated!",
	                /*text: "New user have been add!",*/
	                time: 3000,
	                class_name: "my-sticky-class"
	            });
			}
		});
	})
	$(document).on('click','.change-status-zero',function () {
		var id = $(this).data('id');
		var role = null;
		$.ajax({
			url: "{{url('admin/change/user-status')}}",
			type: "GET",
			data: {'id' : id, 'role' : role},
			success: function(data){
				//console.log(data);
				$('.role-'+data.id).text('User');
				$.gritter.add({
	                title: "Successfully Updated!",
	                /*text: "New user have been add!",*/
	                time: 3000,
	                class_name: "my-sticky-class"
	            });
			}
		});
	})

	$(document).ready(function(){
		var success = "{{Session::has('success')}}";
		if (success) {
			$.gritter.add({
                title: "Successfully Created!",
                text: "New user have been add!",
                time: 3000,
                class_name: "my-sticky-class"
            });
		}
	});

</script>
@endsection