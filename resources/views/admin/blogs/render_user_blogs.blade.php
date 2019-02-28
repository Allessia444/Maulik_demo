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
			<a href="{!! route('blogs.edit',['id'=>$blog->id]) !!}" data-id="{!! $blog->id !!}" class=" btn btn-outline-primary edit">Edit</a>
			<form action="{{route('blogs.destroy',[$blog->id])}}" method="POST">
				@method('DELETE')
				@csrf
				<button class=" btn btn-outline-primary" type="submit">Delete</button>               
			</form>
		</div>
	</div>
</li>
@endforeach