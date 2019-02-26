@extends('admin.shared.layout')
@section('title','Clients')
@section('page')

<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Clients</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('clients.index') !!}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Clients</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('clients.create') !!}" role="button" >
							Add client
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
							<th>IndustrtyName</th>
							<th>ClientName</th>
							<th>Email</th>
							<th>Phone</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($clients as $client)
						<tr>
							<td class="table-plus">{!! $client->id !!}</td>
							<td>{!! $client->industrys->name !!}</td>
							<td>{!! $client->name !!}</td>
							<td>{!! $client->email !!}</td>
							<td>{!! $client->phone !!}</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="fa fa-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="{!! route('clients.show',['id'=>$client->id]) !!}" title="">show</a>
										<a class="dropdown-item" href="{!! route('clients.edit',['id'=>$client->id]) !!}" title="">Edit</a>
										<form action="{{route('clients.destroy',[$client->id])}}" method="POST">
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