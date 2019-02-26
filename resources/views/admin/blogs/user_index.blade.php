@extends('admin.shared.layout')
@section('title','Blogs')
@section('page')

<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="col-md-6 col-sm-12 text-right">
			<div class="dropdown">
				<a class="btn btn-primary " href="{!! route('blogs.create') !!}" role="button" >
					Add Blogs
				</a>
			</div>
		</div>
		<div class="container pd-0">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="title">
							<h4>Blogs</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Blogs</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
			<div class="contact-directory-list">
				<ul class="row">
					@foreach($blogs as $blog)
					<li class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="contact-directory-box">
							<div class="contact-dire-info text-center">
								<div class="contact-avatar">
									<span>
										<img src="{!! $blog->blog_photo_url('list') !!}" alt="">
									</span>
								</div>
								<div class="contact-name">
									<h4>{!! $blog->name !!}</h4>
									<p>{!! $blog->blog_category->name !!}</p>
									<div class="work text-success"><i class="ion-android-person"></i> Freelancer</div>
								</div>
								<div class="contact-skill">
									<span class="badge badge-pill">UI</span>
									<span class="badge badge-pill">UX</span>
									<span class="badge badge-pill">Photoshop</span>
									<span class="badge badge-pill badge-primary">+ 8</span>
								</div>
								<div class="profile-sort-desc">
									{!! $blog->description !!}
								</div>
							</div>
							<div class="btn btn-list ">
								<a href="{!! route('blogs.user_blog_details',['id'=>$blog->id]) !!}" class=" btn btn-outline-primary">View Profile</a>
								<a href="{!! route('blogs.edit',['id'=>$blog->id]) !!}" class=" btn btn-outline-primary">Edit</a>
								<form action="{{route('blogs.destroy',[$blog->id])}}" method="POST">
									@method('DELETE')
									@csrf
									<button class=" btn btn-outline-primary" type="submit">Delete</button>               
								</form>
							</div>
							<!-- <div class="view-contact">
								<a href="{!! route('blogs.edit',['id'=>$blog->id]) !!}">Edit</a>
								<a href="{!! route('blogs.user_blog_details',['id'=>$blog->id]) !!}">View Profile</a>
								<form action="{{route('blogs.destroy',[$blog->id])}}" method="POST">
									@method('DELETE')
									@csrf
									<button class="btn btn-primary" type="submit">Delete</button>               
								</form>
								
							</div> -->
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection('page')