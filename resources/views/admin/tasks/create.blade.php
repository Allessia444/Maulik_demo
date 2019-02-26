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
							<li class="breadcrumb-item active" aria-current="page">Add Task</li>
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
			{!! Former::open()->route('tasks.store') !!}
			@csrf
			{!! Former::select('task_category_id')->class('form-control')->options($task_categories)->placeholder('Select one option...') !!}
			
			{!! Former::input('name')->class('form-control') !!}
			{!! Former::input('notes')->class('form-control') !!}
			{!! Former::date('start_date')->class('form-control') !!}
			{!! Former::date('end_date')->class('form-control') !!}
			<div class="form-control">
				<label>Priority</label>
				<input type="radio" name="priority" value="none" checked>none
				<input type="radio" name="priority" value="low">low
				<input type="radio" name="priority" value="medium">medium
				<input type="radio" name="priority" value="high">high
			</div>
			{!! Former::submit('Save')->class('form-group') !!}
			{!! Former::close() !!}					
		</div>
	</div>
</div>
@endsection

