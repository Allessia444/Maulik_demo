@extends('admin.shared.master')
@section('title','Project Categories')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Blog Categories </h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('blogcategories.index') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('blogcategories.index') !!}">Blog_categories</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Blog_category </li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('blogcategories.index') !!}" role="button" >
							Back
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			{!! Former::open()->method('PATCH')->action(route('blogcategories.update',$blog_categories->id)) !!}
			@csrf
			{!! Former::select('parent_id')->class('form-control')->options($parent)->select($blog_categories->parent_id)->placeholder('select the category') !!}
			{!! Former::input('name')->class('form-control') !!}
			{!! Former::submit('Save')->class('form-group') !!}
			{!! Former::close() !!}					
		</div>
	</div>
</div>
@endsection
