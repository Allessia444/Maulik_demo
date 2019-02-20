@extends('common.master')
@section('title','Dashboard')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Add User </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{!! route('home') !!}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add User Form</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Default Basic Forms</h4>
							<p class="mb-30 font-14">All bootstrap element classies</p>
						</div>
						
					</div>
					<form method="post" action="{!! route('userRegister') !!}">
					@csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">First_Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="first_name" placeholder="Johnny Brown">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Last_Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="last_name" placeholder="Search Here" type="search">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="email" value="bootstrap@example.com" type="email">
							</div>
						</div>
						<!-- <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">URL</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="https://getbootstrap.com" type="url">
							</div>
						</div> -->
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Contact</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="contact" value="1-(111)-111-1111" type="tel">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="password" value="password" type="password">
							</div>
						</div>
						<input type="hidden" name="role" value="user">
						
						<div class="form-group row">
							<input class="col-sm-6 col-md-4" type="submit" name="submit" value="submit">
							
						</div>
					</form>
					
				</div>
				<!-- Default Basic Forms End -->

				
				<!-- Input Validation End -->

			</div>
		</div>
@endsection
