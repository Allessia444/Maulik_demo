@extends('admin.shared.master')
@section('title','Task jquery')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Task jquery </h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('home') !!}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Task Form</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<select name="task-category" id="taskcategory" class="form-control">
				<option>Select the task task category</option>}
				option
				@foreach($tasks as $value)
				<option value="{!! route('get-task-details',$value->id) !!}">{!! $value->name !!}</option>
				@endforeach
			</select>

			<div id="task-details">
				
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">

	$(document).on('change','#taskcategory',function(e){
		e.preventDefault();
		var url=$('#taskcategory').val();
		$.get(url,function(data){
			console.log(data);
			// $.each( data.task, function( key, value ) {
			//   alert( key + ": " + value );
			// });
			$('#task-details').html('');
			$('#task-details').append(data);
		});
	});

	$(document).on('change','#task',function(e){
		e.preventDefault();
		var url=$('#task').val();

		$.get(url,function(data){
			console.log(data);
			$('#task-details p').remove();
			$('#task-details').append("<p>Id:"+data.id+"</p><br><p>Name:"+data.name+"</p>");
		});
	});

	
</script>
@endsection