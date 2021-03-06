@extends('admin.shared.master')
@section('title','Project Categories')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Project_categories </h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('projectcategories.index') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('projectcategories.index') !!}">Project_categories</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Project_category</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('projectcategories.index') !!}" role="button" >
							Back
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="clearfix">
				{!! Former::open()->method('PATCH')->action(route('projectcategories.update',$project_categories->id)) !!}
				@csrf
				{!! Former::select('parent_id')->class('form-control')->options($parent)->placeholder('Select one option...')->select($project_categories->parent_id) !!}
				{!! Former::input('name')->class('form-control') !!}
				{!! Former::submit('Save')->class('form-group') !!}
			</div>	
			{!! Former::close() !!}					
		</div>
	</div>
</div>
@endsection
