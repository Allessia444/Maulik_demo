@extends('admin.shared.master')
@section('title','Departments')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Departments </h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('departments.index') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('departments.index') !!}">Departments</a></li>
							<li class="breadcrumb-item active" aria-current="page">Show Department </li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('departments.index') !!}" role="button" >
							Back
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<table class="table">
				<tbody>
					<tr>
						<td>Id</td>
						<td>{!! $departments->id !!}</td>
					</tr>
					<tr>
						<td>Name</td>
						<td>{!! $departments->name !!}</td>
					</tr>
				</tbody>
			</table>					
		</div>
	</div>
</div>
@endsection
