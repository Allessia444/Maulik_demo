@extends('admin.shared.master')
@section('title','Site Setting')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Site Settings </h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('home') !!}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Site Settings</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('home') !!}" role="button" >
							Back
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="clearfix">
				{!! Former::open()->method('PATCH')->action(route('site_settings.update',$site_setting->id)) !!}
				@csrf
				{!! Former::input('title')->class('form-control') !!}
				{!! Former::email('email')->class('form-control') !!}
				{!! Former::input('phone_1')->class('form-control') !!}
				{!! Former::input('phone_2')->class('form-control') !!}
				{!! Former::input('copy_right')->class('form-control') !!}
				{!! Former::input('site_visitors')->class('form-control') !!}
				{!! Former::submit('Save')->class('form-group') !!}
			</div>	
			{!! Former::close() !!}					
		</div>
	</div>
</div>
@endsection