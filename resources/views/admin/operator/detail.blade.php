@extends('admin.header')
@section('css')
<style>
	.btn-default.btn-on.active{background-color: #5BB75B;color: white;}
	.btn-default.btn-off.active{background-color: #DA4F49;color: white;}

	.upload-btn-wrapper {
	  position: relative;
	  overflow: hidden;
	  display: inline-block;
	}

	.upload-btn-wrapper input[type=file] {
	  font-size: 100px;
	  position: absolute;
	  left: 0;
	  top: 0;
	  opacity: 0;
	}

	.disabled {
		cursor: no-drop;
	 	pointer-events: none;
	}
</style>
@endsection
@section('content')
<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="{{asset('admin/operator')}}" class="btn btn-warning">Back</a></li>
	</ol>
	<h1 class="page-header">Assigned <small>Job Lists</small></h1>
	<div class="row">
		<div class="col-md-12">
			<table  class="table table-striped table-bordered data-table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Photo Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($jobDetails as $key => $detail)
					<tr>
						<td>
							{{ $key+1 }}
						</td>
						<td>{{ $detail->file_name }}</td>
						<td id="">
							<input type="text" class="imgid{{ $key+1 }}" value="{{ $detail->id }}" hidden="hidden">
							<a download="{{ $detail->file_name }}" href="{{ $detail->file_path }}/{{ $detail->file_name }}" title="ImageName" class="downdisabled btn btn-success download{{ $key }}" style="position: relative;top: -14px;" id="add{{$key}}" value="{{$key}}">
							    Download
							</a>

							<div class="upload-btn-wrapper">
							  	<button class="btn btn-warning upload{{$key}} upbtn" value="{{$key}}">Upload</button>
							  	<input type="file" name="myfile" />
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript" >
	$(document).ready(function(){
		<?php foreach ($jobDetails as $key => $value): ?>
			$('.download<?php echo($key); ?>').on('click', function () {
				var id = $('.imgid<?php echo($key+1); ?>').val();
				var dvalue = $('.download<?php echo $key; ?>').val();
				var uvalue = $('.upload<?php echo $key; ?>').val();
				$.ajax({
					url: "{{url('admin/download')}}",
					type: "GET",
					data: {'id' : id},
					success: function(data){
						$(".downdisabled").attr('class','downdisabled btn btn-danger download{{ $key }} disabled');
						if ( uvalue == dvalue ) {
							$(".upbtn").attr('class','btn btn-warning upload{{$key}} upbtn');
						}
						else{
							$(".upbtn").attr('class','btn btn-warning upload{{$key}} upbtn disabled');
						}
					}
				});
			});
		<?php endforeach ?>
	});
</script>
@endsection