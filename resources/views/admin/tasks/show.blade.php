@extends('admin.shared.layout')
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
							<li class="breadcrumb-item active" aria-current="page">Show Task</li>
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
			<div class="row">
				<table class="table">
					<tbody>
						
						<tr>
							<td>Id</td>
							<td>{!! $task->id !!}</td>							
						</tr>
						<tr>	
							<td>Task_category</td>
							<td>{!! $task->task_category->name !!}</td>
						</tr>
						<tr>
							<td>user</td>
							<td>{!! $task->users->first_name !!}</td>
						</tr>
						<tr>
							<td>Name</td>
							<td>{!! $task->name !!}</td>
						</tr>
						<tr>
							<td>Start date</td>
							<td>{!! $task->start_date !!}</td>
						</tr>
						<tr>
							<td>End date</td>
							<td>{!! $task->end_date !!}</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>
@endsection('page')