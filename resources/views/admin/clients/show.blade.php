@extends('common.master')
@section('title','Clients')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Users </h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('clients.index') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('clients.index') !!}">Clients</a></li>
							<li class="breadcrumb-item active" aria-current="page"> Client Form</li>
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
			<div class="clearfix">
				<div class="pull-left">
					<h4 class="text-blue">Default Basic Forms</h4>
					<p class="mb-30 font-14">All bootstrap element classies</p>
				</div>
			</div>
			{!! Former::open() !!} 
			{!! Former::select('industry_id')->class('form-control')->options($industrys)->select($client->industry_id) !!}
			{!! Former::input('name')->class('form-control') !!}
			<label>Logo</label>
			<img src="{!! $client->photo_url() !!}" style="height: 100px; width: 150px;" alt="">
			{!! Former::input('email')->class('form-control') !!}
			{!! Former::input('website')->class('form-control') !!}
			{!! Former::input('phone')->class('form-control') !!}
			{!! Former::input('fax')->class('form-control') !!}
			{!! Former::textarea('address1')->class('form-control') !!}
			{!! Former::textarea('address2')->class('form-control') !!}
			{!! Former::input('city')->class('form-control') !!}
			{!! Former::input('state')->class('form-control') !!}
			{!! Former::input('country')->class('form-control') !!}
			{!! Former::input('zipcode')->class('form-control') !!}
			{!! Former::close() !!}
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{!! asset('js/plupload.full.min.js') !!}"></script>
@endsection