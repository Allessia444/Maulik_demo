@extends('common.blogs')
@section('title','Blogs')
@section('page')

<div class="pd-ltr-20 height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Blog</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{!! route('login') !!}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blog</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="blog-wrap">
					<div class="container pd-0">
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<div class="blog-list">
									<ul>
									@foreach($blogs as $blog)
										<li>
											<div class="row no-gutters">
												<div class="col-lg-4 col-md-12 col-sm-12">
													<div class="blog-img">
														<img src="{!! $blog->blog_photo_url('front') !!}" alt="" class="bg_img">
													</div>
												</div>
												<div class="col-lg-8 col-md-12 col-sm-12">
													<div class="blog-caption">
														<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
														<div class="blog-by">
															<p>Author: {!! $blog->users->first_name !!}</p>
															<p>{!! $blog->description !!}</p>
															<div class="pt-10">
																<a href="{!! route('blogs.blog_details',['id'=>$blog->id]) !!}" class="btn btn-outline-primary">Read More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									@endforeach
									</ul>
								</div>
								<div class="blog-pagination">
									<div class="btn-toolbar justify-content-center mb-15">
										<div class="btn-group">
											<a href="#" class="btn btn-outline-primary prev"><i class="fa fa-angle-double-left"></i></a>
											<a href="#" class="btn btn-outline-primary">1</a>
											<a href="#" class="btn btn-outline-primary">2</a>
											<span class="btn btn-primary current">3</span>
											<a href="#" class="btn btn-outline-primary">4</a>
											<a href="#" class="btn btn-outline-primary">5</a>
											<a href="#" class="btn btn-outline-primary next"><i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="bg-white border-radius-4 box-shadow mb-30">
									<h5 class="pd-20">Categories</h5>
									<div class="list-group">
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">HTML <span class="badge badge-primary badge-pill">7</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">Css <span class="badge badge-primary badge-pill">10</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between active">Bootstrap <span class="badge badge-primary badge-pill">8</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">jQuery <span class="badge badge-primary badge-pill">15</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">Design <span class="badge badge-primary badge-pill">5</span></a>
									</div>
								</div>
								<div class="bg-white border-radius-4 box-shadow mb-30">
									<h5 class="pd-20">Latest Post</h5>
									<div class="latest-post">
										<ul>
											<li>
												<h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></h4>
												<span>HTML</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Css</span>
											</li>
											<li>
												<h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></h4>
												<span>jQuery</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Bootstrap</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Design</span>
											</li>
										</ul>
									</div>
								</div>
								<div class="bg-white border-radius-4 box-shadow">
									<h5 class="pd-20">Archives</h5>
									<div class="list-group">
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">January 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">February 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">March 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">April 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">May 2018</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="container pd-0">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="title">
							<h4>Blogs</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{!! route('login') !!}">Home</a></li>
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
									<img src="{!! $blog->blog_photo_url('front') !!}" alt="">
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
							<div class="view-contact">
								<a href="{!! route('blogs.blog_details',['id'=>$blog->id]) !!}">View Profile</a>
								
								
							</div>
						</div>
					</li>
				@endforeach
				</ul>
			</div>
		</div>
	</div>
</div> -->
@endsection