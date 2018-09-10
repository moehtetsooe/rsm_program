@extends('admin.header')
@section('css')
<style>
	.btn-default.btn-on.active{background-color: #5BB75B;color: white;}
	.btn-default.btn-off.active{background-color: #DA4F49;color: white;}
	.subject-info-box-1,
	.subject-info-box-2 {
	    float: left;
	    width: 45%;
	    
	    select {
	        height: 400px!important;
	        padding: 0;
	        option {
	            padding: 4px 10px 4px 10px;
	        }
	        option:hover {
	            background: #EEEEEE;
	        }
	    }
	}
	.subject-info-arrows {
	    float: left;
	    width: 10%;
	    input {
	        width: 70%;
	        margin-bottom: 5px;
	    }
	}
</style>
@endsection
@section('content')
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="{{url('admin/job-assign')}}" class="btn btn-success">Back</a></li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Assign <small>New Jobs</small></h1>
	<div class="row">
		<div class="col-md-12 well">
			<br>
			<div class="row">
				<div class="col-md-8">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/job-assign') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<fieldset>
							<div class="form-group">
								<label for="jobTitle" class="col-md-4 control-label">Job Title</label>
								<div class="col-md-6">
									<input id="jobTitle" type="text" class="form-control" name="jobTitle" required="required" autofocus>
								</div>
							</div>
							<div class="form-group">
							    <label for="assignFile" class="col-md-4 control-label">Assign File</label>
							    <div class="col-md-6">
							    	<input type="file" webkitdirectory mozdirectory id="exampleInputFile" name="assignFile[]" class="form-control" required="required" multiple>
							    </div>
							</div>
							<div class="form-group">
								<label for="fromDate" class="col-md-4 control-label">From Date</label>
								<div class="col-md-6">
							        <div class='input-group date' id='datetimepicker1'>
							        	<input type='text' class="form-control" name="fromDate" />
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
							        	<input type='text' class="form-control" name="toDate" />
							          	<span class="input-group-addon">
							            	<span class="glyphicon glyphicon-calendar"></span>
							          	</span>
							        </div>
								</div>
							</div>
							<div class="form-group">
								<label for="estimatedTime" class="col-md-4 control-label">Estimated Completion Time</label>
								<div class="col-md-6">
									<input id="estimatedTime" type="text" class="form-control" name="estimatedTime" required="required" autofocus>
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
									<input type="text" hidden="hidden" name="created_by" value="{{Auth::guard('admin')->user()->id}}">
									<!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Assign</button> -->
									<button type="submit" class="btn btn-success">Assign Job</button>
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
	<!-- <script>
		var inps = document.querySelectorAll('#exampleInputFile');
		[].forEach.call(inps, function(inp) {
		  inp.onchange = function(e) {
		    console.log(this.files);
		  };
		});
		(function () {
		    $('#btnRight').click(function (e) {
		        var selectedOpts = $('#lstBox1 option:selected');
		        if (selectedOpts.length == 0) {
		            alert("Nothing to move.");
		            e.preventDefault();
		        }
		        $('#lstBox2').append($(selectedOpts).clone());
		        $(selectedOpts).remove();
		        e.preventDefault();
		    });
		    $('#btnAllRight').click(function (e) {
		        var selectedOpts = $('#lstBox1 option');
		        if (selectedOpts.length == 0) {
		            alert("Nothing to move.");
		            e.preventDefault();
		        }
		        $('#lstBox2').append($(selectedOpts).clone());
		        $(selectedOpts).remove();
		        e.preventDefault();
		    });
		    $('#btnLeft').click(function (e) {
		        var selectedOpts = $('#lstBox2 option:selected');
		        if (selectedOpts.length == 0) {
		            alert("Nothing to move.");
		            e.preventDefault();
		        }
		        $('#lstBox1').append($(selectedOpts).clone());
		        $(selectedOpts).remove();
		        e.preventDefault();
		    });
		    $('#btnAllLeft').click(function (e) {
		        var selectedOpts = $('#lstBox2 option');
		        if (selectedOpts.length == 0) {
		            alert("Nothing to move.");
		            e.preventDefault();
		        }
		        $('#lstBox1').append($(selectedOpts).clone());
		        $(selectedOpts).remove();
		        e.preventDefault();
		    });
		}(jQuery));
	</script> -->
@endsection