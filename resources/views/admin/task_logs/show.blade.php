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
							<li class="breadcrumb-item"><a href="{!! route('tasks.task_logs.index',['id'=>$id]) !!}">Task logs</a></li>


						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('tasks.task_logs.index',['id'=>$id]) !!}" role="button" >
							Back
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="row">
				<table class="table">
					<thead>
					<tbody>
						<tr>
							<td>Id</td><td class="table-plus">{!! $task_log->id !!}</td>
						</tr>
						<tr>
							<td>User</td><td>{!! $task_log->users->first_name !!}</td>
						</tr>
						<tr>
							<td>Task</td><td>{!! $task_log->tasks->name !!}</td>
						</tr>
						<tr>
							<td>Date</td>
							<td>{!! $task_log->date !!}</td>
						</tr>
						<tr>
							<td>Start time</td><td>{!! $task_log->start_time !!}</td>
						</tr>
						<tr>
							<td>End time</td>
							<td>{!! $task_log->end_time !!}</td>
						</tr>
						<tr>
							<td>Spent time</td><td>{!! $task_log->spent_time !!}</td>
						</tr>
						<tr>
							<td>Description</td><td>{!! $task_log->description !!}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
</div>
@endsection('page')