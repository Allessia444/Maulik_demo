@extends('admin.shared.layout')
@section('title','Blogs')
@section('page')


<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Blogs</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('blogs.index') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('blogs.index') !!}">Blogs</a></li>
							<li class="breadcrumb-item active" aria-current="page">Show Blog </li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						@if($key)
						<a class="btn btn-primary " href="{{ route('users.index') }}" role="button" >
							Back
						</a>
						@else
						<a class="btn btn-primary " href="{{ route('blogs.index') }}" role="button" >
							Back
						</a>
						@endif

					</div>
				</div>
			</div>
		</div>
		<!-- <div class="pd-20 bg-white border-radius-4 box-shadow mb-30"> -->
		<!-- <div class="row"> -->
		<table class="table">
			<thead>
				
			</thead>
			<tbody>
				<tr>
					<td>Id</td>	<td >{!! $blogs->id !!}</td>
				</tr>
				<tr>
					<td>Blog category</td>	<td>{!! $blogs->blog_category->name !!}</td></tr>
					<tr><td>Name</td><td>{!! $blogs->name !!}</td></tr>
					<tr><td>Image</td><td><img src="{!! $blogs->blog_photo_url() !!}" style="height: 150px; width: 150px;" alt=""></td></tr>
					<tr><td>Description</td><td>{!! $blogs->description !!}</td></tr>
					<tr><td>Author</td><td>{!! $blogs->users->first_name !!}</td></tr>
					<tr><td>Status</td><td>{!! $blogs->status !!}</td></tr>
					
				</tr>
			</tbody>
		</table>
		<!-- </div> -->
		<!-- </div> -->
		
	</div>
</div>
@endsection('page')