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
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('users.index') !!}" role="button" >
							Back
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<table class="table">
				<tbody>
					<tr>
						<td>First_name </td>
						<td>{!! $user->first_name !!}</td>
					</tr>
					<tr>
						<td>Last_name </td>
						<td>{!! $user->last_name !!}</td>
					</tr>
					<tr>
						<td>Email </td>
						<td>{!! $user->email !!}</td>
					</tr>
					<tr>
						<td>Phone </td>
						<td>{!! $user->phone !!}</td>
					</tr>
					<tr>
						<td>Mobile </td>
						<td>{!! $user_profile->mobile !!}</td>
					</tr>
					<tr>
						<td>Photo </td>
						<td><img src="{!! $user_profile->profile_photo_url() !!}" style="height: 50px; width: 50px;" alt=""></td>
					</tr>
					<tr>
						<td>Gender </td>
						<td>{!! $user_profile->gender !!}</td>
					</tr>
					<tr>
						<td>Marrital_status </td>
						<td>{!! $user_profile->marrital_status !!}</td>
					</tr>
					<tr>
						<td>Designations </td>
						<td>{!! $user->designations->name !!}</td>
					</tr>
					<tr>
						<td>Departments </td>
						<td>{!! $user->departments->name !!}</td>
					</tr>
					<tr>
						<td>Address1 </td>
						<td>{!! $user_profile->address1 !!}</td>
					</tr>
					<tr>
						<td>Address2 </td>
						<td>{!! $user_profile->address2 !!}</td>
					</tr>
					<tr>
						<td>City </td>
						<td>{!! $user_profile->city !!}</td>
					</tr>
					<tr>
						<td>State </td>
						<td>{!! $user_profile->state !!}</td>
					</tr>
					<tr>
						<td>Country </td>
						<td>{!! $user_profile->country !!}</td>
					</tr>
					<tr>
						<td>Zipcode </td>
						<td>{!! $user_profile->zipcode !!}</td>
					</tr>
					<tr>
						<td>Dob </td>
						<td>{!! $user_profile->dob !!}</td>
					</tr>
					<tr>
						<td>Pan_number </td>
						<td>{!! $user_profile->pan_number !!}</td>
					</tr>
					<tr>
						<td>Management_level </td>
						<td>{!! $user_profile->management_level !!}</td>
					</tr>
					<tr>
						<td>Join Date </td>
						<td>{!! $user_profile->join_date !!}</td>
					</tr>
					<tr>
						<td>Google </td>
						<td>{!! $user_profile->google !!}</td>
					</tr>
					<tr>
						<td>Facebook </td>
						<td>{!! $user_profile->facebook !!}</td>
					</tr>
					<tr>
						<td>Website </td>
						<td>{!! $user_profile->website !!}</td>
					</tr>
					<tr>
						<td>Skype </td>
						<td>{!! $user_profile->skype !!}</td>
					</tr>
					<tr>
						<td>Linkedin </td>
						<td>{!! $user_profile->linkedin !!}</td>
					</tr>
					<tr>
						<td>Twitter</td>
						<td>{!! $user_profile->twitter !!}</td>
					</tr>
					
					<td>Blogs</td>
					
					<table class="table" border="1" >
						<th>Id</th>
						<th>Name</th>
						<th>Actions</th>
						<tbody>
							@foreach($blogs as $blog)
							<tr>
								<td>{!! $blog->id !!}</td>
								<td>{!! $blog->name !!}</td>
								<td>
									<a class="" href="{!! route('blogs.show',['id'=>$blog->id,'from'=>'user']) !!}" title="">show</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					
					
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
