@extends('common.layout')
@section('title','Users')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Users</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('users.index') !!}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Users</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('users.create') !!}" role="button" >
							Add Users
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
							<th>First_Name</th>
							<th>Last_Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Active</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td class="table-plus">{!! $user->id !!}</td>
							<td>{!! $user->first_name !!}</td>
							<td>{!! $user->last_name !!}</td>
							<td>{!! $user->email !!}</td>
							<td>{!! $user->phone !!}</td>
							<td>{!! $user->is_active !!}</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="fa fa-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<!-- <a class="dropdown-item" href="#"><i class="fa fa-eye"></i> View</a> -->
										<a class="dropdown-item" href="{!! route('users.show',['id'=>$user->id]) !!}" title="">show</a>
										<a class="dropdown-item" href="{!! route('users.edit',['id'=>$user->id]) !!}" title="">Edit</a>
										<form action="{{route('users.destroy',[$user->id])}}" method="POST">
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