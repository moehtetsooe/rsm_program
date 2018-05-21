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
		<li><a href="{{url('admin/user/create')}}" class="btn btn-success">Create New User</a></li>
		
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Users <small></small></h1>
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
					@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							<span class="role-{{$user->id}}">
								@if($user->role == 1)
								Admin
								@else
								User
								@endif
							</span>
						</td>
						@admin
						<td>
								<div class="btn-group " id="status" data-toggle="buttons">
								<label class="btn btn-default btn-on btn-xs {!! $user->role ? 'active' : '' !!} change-status-one" data-id="{{$user->id}}">
									<input type="radio" value="1" name="multifeatured_module[module_id][status]"  class="check-box">Admin</label>
									<label class="btn btn-default btn-off btn-xs {!! $user->role ? '' : 'active' !!} change-status-zero" data-id="{{$user->id}}">
										<input type="radio" value="0" name="multifeatured_module[module_id][status]"  class="check-box">User</label>
								</div>
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