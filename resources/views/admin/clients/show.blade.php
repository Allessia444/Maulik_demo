@extends('admin.shared.master')
@section('title','Clients')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Clients </h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('clients.index') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('clients.index') !!}">Clients</a></li>
							<li class="breadcrumb-item active" aria-current="page">Show Client</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('clients.index') !!}" role="button" >
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
						<td>{!! $client->id !!}</td>
					</tr>
					<tr>
						<td>Industry Id</td>
						<td>{!! $client->industrys->name !!}</td>
					</tr>
					<tr>
						<td>Name</td>
						<td>{!! $client->name !!}</td>
					</tr>
					<tr>
						<td>Logo</td>
						<td><img src="{!! $client->photo_url() !!}" style="height: 150px; width: 150px;" alt=""></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>{!! $client->email !!}</td>
					</tr>
					<tr>
						<td>Website</td>
						<td>{!! $client->website !!}</td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>{!! $client->phone !!}</td>
					</tr>
					<tr>
						<td>Fax</td>
						<td>{!! $client->fax !!}</td>
					</tr>
					<tr>
						<td>Address1</td>
						<td>{!! $client->address1 !!}</td>
					</tr>
					<tr>
						<td>Address2</td>
						<td>{!! $client->address2 !!}</td>
					</tr>
					<tr>
						<td>City</td>
						<td>{!! $client->city !!}</td>
					</tr>
					<tr>
						<td>State</td>
						<td>{!! $client->state !!}</td>
					</tr>
					<tr>
						<td>Country</td>
						<td>{!! $client->country !!}</td>
					</tr>
					<tr>
						<td>Zipcode</td>
						<td>{!! $client->zipcode !!}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
