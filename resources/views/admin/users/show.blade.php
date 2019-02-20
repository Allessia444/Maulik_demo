@extends('common.master')
@section('title','Users')
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
							<li class="breadcrumb-item"><a href="{!! route('users.store') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('users.index') !!}">Users</a></li>
							<li class="breadcrumb-item active" aria-current="page">Show User</li>
						</ol>
					</nav>
				</div>

			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			{!! Former::open()->method('PATCH')->action(route('users.update',$user->id)) !!} 
			<div class="form-group">
			</div>
			{!! Former::input('first_name')->class('form-control')->value($user->first_name) !!}
			{!! Former::input('last_name')->class('form-control') !!}
			{!! Former::input('email')->class('form-control') !!}
			{!! Former::input('phone')->class('form-control') !!}
			<label>Photo</label>
			<img src="{!! asset('/uploads/photo/'.$user_profile->photo) !!}" style="height: 50px; width: 50px;" alt="">
			{!! Former::input('mobile')->class('form-control')->value($user_profile->mobile) !!}
			<div class="form-group row">
				<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
				<div class="col-sm-12 col-md-10">
					<input type="radio" name="gender" checked value="male">Male
					<input type="radio" name="gender" value="female">Female
				</div>
			</div>
			<div class="form-group row ">
				<label class="col-sm-12 col-md-2 col-form-label">Blogs</label>
				<table class="data-table " border="1">
					<th>Id</th>
					<th>Name</th>
					<th>Actions</th>
					<tbody>
						@foreach($blogs as $blog)
						<tr>
							<td>{!! $blog->id !!}</td>
							<td>{!! $blog->name !!}</td>
							<td>
								<a class="dropdown-item" href="{!! route('blogs.show',['id'=>$blog->id]) !!}" title="">show</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{!! Former::input('marrital_status')->class('form-control')->value($user_profile->marrital_status) !!}
			{!! Former::input('designation')->class('form-control')->value($user->designations->name) !!}
			{!! Former::input('department')->class('form-control')->value($user->departments->name) !!}
			{!! Former::textarea('address1')->class('form-control')->value($user_profile->address1) !!}
			{!! Former::textarea('address2')->class('form-control')->value($user_profile->address2) !!}
			{!! Former::input('city')->class('form-control')->value($user_profile->city) !!}
			{!! Former::input('state')->class('form-control')->value($user_profile->state) !!}
			{!! Former::input('country')->class('form-control')->value($user_profile->country) !!}
			{!! Former::input('zipcode')->class('form-control')->value($user_profile->zipcode) !!}
			{!! Former::date('dob')->class('form-control')->value($user_profile->dob) !!}
			{!! Former::input('pan_number')->class('form-control')->value($user_profile->pan_number) !!}
			{!! Former::input('management_level')->class('form-control')->value($user_profile->management_level) !!}
			{!! Former::date('join_date')->class('form-control')->value($user_profile->join_date) !!}
			{!! Former::input('google')->class('form-control')->value($user_profile->google) !!}
			{!! Former::input('facebook')->class('form-control')->value($user_profile->facebook) !!}
			{!! Former::input('website')->class('form-control')->value($user_profile->website) !!}
			{!! Former::input('skype')->class('form-control')->value($user_profile->skype) !!}
			{!! Former::input('linkedin')->class('form-control')->value($user_profile->linkedin) !!}
			{!! Former::input('twitter')->class('form-control')->value($user_profile->twitter) !!}
			{!! Former::close() !!}
		</div>
	</div>
</div>
@endsection
