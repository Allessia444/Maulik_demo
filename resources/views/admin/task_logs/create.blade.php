@extends('admin.shared.master')
@section('title','Tasks')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Tasks</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('tasks.index') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('tasks.index') !!}">Tasks</a></li>
							<li class="breadcrumb-item"><a href="{!! route('tasks.task_logs.index',['id'=>$id]) !!}">Task logs</a></li>
							<li class="breadcrumb-item">Add Task Log</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('tasks.index') !!}" role="button" >
							Back
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			{!! Former::open()->route('tasks.task_logs.store',['id'=>$id]) !!}
			@csrf

			
			{!! Former::input('date')->class('form-control date-picker')->id('date') !!}
			<label class="col-sm-12 col-md-2 col-form-label">Start Time</label>
			 {!! Former::text('start_time')->class('timepicker form-control')->label(false)->autocomplete('off')->placeholder('start time')->dataTarget('#end_time')->dataMethod('min') !!}
			 <label class="col-sm-12 col-md-2 col-form-label">End Time</label>
			 {!! Former::text('end_time')->class('timepicker form-control')->label(false)->autocomplete('off')->placeholder('end time')->dataTarget('#start_time')->dataMethod('max') !!}
			{!! Former::textarea('description')->class('form-control') !!}
			<label>Billable</label>
			<input type="checkbox" name="billable" value="1">
			<br>
			{!! Former::submit('Save')->class('form-group') !!}
			{!! Former::close() !!}					
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="{!! asset('unisharp/laravel-ckeditor/ckeditor.js') !!}"></script>
<script src="{!! asset('unisharp/laravel-ckeditor/adapters/jquery.js') !!}"></script>
<script>
	$('textarea').ckeditor();
	$( "#date" ).datepicker({  maxDate: new Date() });
	jQuery('.timepicker').datepicker({
            timepicker: true,
            language: 'en',
            autoClose: true,
            onlyTimepicker: true,
            maxHours: 24,
            timeFormat: 'hh:ii',
            onSelect: function (fd, d, picker) {
                if(jQuery(picker.el).data('method') == "min")
                    $(jQuery(picker.el).data('target')).data('datepicker').update('minDate', d);
                else
                    $(jQuery(picker.el).data('target')).data('datepicker').update('maxDate', d);
                $(jQuery(picker.el).data('target')).focus();
            }
        });
</script>
@endsection
  
