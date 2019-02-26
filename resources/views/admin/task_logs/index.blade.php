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
						<a class="btn btn-primary " href="{!! route('tasks.task_logs.create',['id'=>$id]) !!}" role="button" >
							Add Task log
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="row">
				<table class="data-table stripe hover nowrap">
					<thead>
						<tr>

							<th class="table-plus datatable-nosort">Id</th>
							<th>User</th>
							<th>Task</th>
							<th>Date</th>
							<th>Start time</th>
							<th>End time</th>
							<th>Spent time</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($task_logs as $task_log)
						<tr>
							<td class="table-plus">{!! $task_log->id !!}</td>
							<td>{!! $task_log->users->first_name !!}</td>
							<td>{!! $task_log->tasks->name !!}</td>
							<td>{!! $task_log->date !!}</td>
							<th>{!! $task_log->start_time !!}</th>
							<th>{!! $task_log->end_time !!}</th>
							<th>{!! $task_log->spent_time !!}</th>
							<td>
								<div class="dropdown">
									<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="fa fa-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="{!! route('tasks.task_logs.show',['log_id'=>$task_log->id,'task_id'=>$id]) !!}" title="">Show</a>
										<a class="dropdown-item" href="{!! route('tasks.task_logs.edit',['log_id'=>$task_log->id,'task_id'=>$id]) !!}" title="">Edit</a>
										<form action="{{route('tasks.task_logs.destroy',[$task_log->id,'id'=>$id])}}" method="POST">
											@method('DELETE')
											@csrf
											<button class="dropdown-item" type="submit">Delete</button>               
										</form>

									</div>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
</div>
@endsection('page')