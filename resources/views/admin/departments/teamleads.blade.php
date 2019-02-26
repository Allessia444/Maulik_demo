@extends('admin.shared.master')
@section('title','Departments')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Departments</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('departments.index') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('departments.index') !!}">Departments</a></li>
							<li class="breadcrumb-item active" aria-current="page">Team Lead</li>
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
		@if(!$select_members AND !select_teamleads)
			{!! Former::open()->route('departments.teamleadstore') !!}
			@csrf
				<input type="hidden" name="department_id" value="{!! $department->id !!}">
				{!! Former::select('teamleads')->options($teamleads)->placeholder('plzz select the team lead') !!}
				{!! Former::multiselect('members')->class('selectpicker')->options($members)->placeholder('plzz select the team lead') !!}
			{!! Former::submit('Save')->class('form-group') !!}
			{!! Former::close() !!}
			@else
				{!! Former::open()->route('departments.teamleadstore') !!}
				@csrf
					<input type="hidden" name="department_id" value="{!! $department->id !!}">
					{!! Former::select('teamleads')->options($teamleads)->select($select_teamleads)->placeholder('plzz select the team lead') !!}
					{!! Former::multiselect('members')->class('selectpicker')->options($members)->select($select_members)->placeholder('plzz select the team lead') !!}
				{!! Former::submit('Save')->class('form-group') !!}
				{!! Former::close() !!}
			@endif
		</div>
	</div>
</div>
@endsection