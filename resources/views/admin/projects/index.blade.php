@extends('common.layout')
@section('title','Projects')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Projects</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('projects.index') !!}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Projects</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('projects.create') !!}" role="button" >
							Add Project
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
							<th>Name</th>
							<th>Hours</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($projects as $project)
						<tr>
							<td class="table-plus">{!! $project->id !!}</td>
							<td>{!! $project->users->first_name !!}</td>
							<td>{!! $project->name !!}</td>
							<td>{!! $project->confirm_hrs !!}</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="fa fa-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<!-- <a class="dropdown-item" href="#"><i class="fa fa-eye"></i> View</a> -->
										<a class="dropdown-item" href="{!! route('projects.edit',['id'=>$project->id]) !!}" title="">Edit</a>
										<form action="{{route('projects.destroy',[$project->id])}}" method="POST">
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