@extends('portal.shared.master')
@section('title','User')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header" id="header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{!! route('home') !!}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
					<div id="message">
						
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 bg-white border-radius-4 box-shadow">
							<div class="profile-photo">
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								<img src="{!! Auth::user()->user_profile->profile_photo_url() !!}" alt="" class="avatar-photo">
								<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body pd-5">
												<div class="img-container">
													<img id="image" src="{!! Auth::user()->user_profile->profile_photo_url() !!}"  alt="Picture">
												</div>
											</div>
											<div class="modal-footer">
												<input type="hidden"  name="photo" id="profilephoto">
												<div id="container">
												<a href="javascript:;" class="btn btn-primary" id="uploader">Upload</a>
												</div>
												<input type="button" id="updateuserprofile" class="btn btn-default" name="update" value="update">
												<button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<h5 class="text-center">{!! $user->first_name." " .$user->last_name !!}</h5>
							<div class="profile-info">
								<h5 class="mb-20 weight-500">Contact Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										{!! $user->email !!}
									</li>
									<li>
										<span>Phone Number:</span>
										{!! $user->phone !!}
									</li>
									<li>
										<span>Country:</span>
										{!! $user_profile->country !!}
									</li>
									<li>
										<span>Address:</span>
										{!! $user_profile->address1 !!}<br>
										{!! $user_profile->address2 !!}
									</li>
								</ul>
							</div>
							<div class="profile-social">
								<h5 class="mb-20 weight-500">Social Links</h5>
								<ul class="clearfix">
									<li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i class="fa fa-dropbox"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-vine"></i></a></li>
								</ul>
							</div>
							<div class="profile-skills">
								<h5 class="mb-20 weight-500">Key Skills</h5>
								<h6 class="mb-5">HTML</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5">Css</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5">jQuery</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5">Bootstrap</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="bg-white border-radius-4 box-shadow height-100-p">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Timeline Tab start -->
										<div class="tab-pane fade show active" id="timeline" role="tabpanel">
											{!! Former::open()->method('PATCH')->action(route('updateprofile',$user->id)) !!} 
			<div class="form-group">
			</div>
			{!! Former::input('first_name')->class('form-control') !!}
			{!! Former::input('last_name')->class('form-control') !!}
			{!! Former::input('email')->class('form-control') !!}
			{!! Former::input('phone')->class('form-control') !!}
			
			{!! Former::input('mobile')->class('form-control')->value($user_profile->mobile) !!}
			<div class="form-group row">
				<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
				<div class="col-sm-12 col-md-10">
					<input type="radio" name="gender" checked value="male">Male
					<input type="radio" name="gender" value="female">Female
				</div>
			</div>
			{!! Former::select('marrital_status')->options(['single'=>'single','married'=>'married'])->select($user_profile->marrital_status) !!}
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
			<div id="container form-group-row">
				<label>Attachment</label>
				<input type="hidden"  name="attach" id="attachment">
				<a id="attach" href="javascript:;">[Browse...]</a>
				<a id="attach-upload" href="javascript:;">[Start Upload]</a>
				<ul id="attachlist"></ul>
			</div>
			{!! Former::input('google')->class('form-control')->value($user_profile->google) !!}
			{!! Former::input('facebook')->class('form-control')->value($user_profile->facebook) !!}
			{!! Former::input('website')->class('form-control')->value($user_profile->website) !!}
			{!! Former::input('skype')->class('form-control')->value($user_profile->skype) !!}
			{!! Former::input('linkedin')->class('form-control')->value($user_profile->linkedin) !!}
			{!! Former::input('twitter')->class('form-control')->value($user_profile->twitter) !!}
			<div class="form-group">
				{!! Former::submit('Save') !!}
			</div>
			{!! Former::close() !!}
										</div>
										<!-- Timeline Tab End -->
										<!-- Tasks Tab start -->

										<!-- Tasks Tab End -->
										<!-- Setting Tab start -->
										
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
@section('script')
<script type="text/javascript" src="{!! asset('js/plupload.full.min.js') !!}"></script>
<script type="text/javascript">
	var uploader = new plupload.Uploader({
		runtimes : 'html5,flash,silverlight,html4',

		browse_button : 'uploader', // you can pass in id...
		container: document.getElementById('container'), // ... or DOM Element itself

		url : "{!! asset('plupload/upload.php') !!}",

		filters : {
		max_file_size : '10mb',
		mime_types: [
		{title : "Image files", extensions : "jpg,gif,png"},
		{title : "Zip files", extensions : "zip"}
		]
		},

		// Flash settings
		flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",

		// Silverlight settings
		silverlight_xap_url : "{{ asset('plupload/Moxie.xap') }}",


		init: {
		PostInit: function() {
		document.getElementById('filelist').innerHTML = '';
		},

		FilesAdded: function(up, files) {

		uploader.start();
		},

		// UploadProgress: function(up, file) {
		// document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
		// },
		UploadFile: function(up, file){
		var tmp_url = '{!! asset('/tmp/') !!}';
		$('#profilephoto').val(file.name);
		console.log(file);
		$('.img-container >img').remove();
		$('.img-container').append("<img src='"+tmp_url +"/"+ file.name+"' alt='Picture' />");
		},
		UploadComplete: function(up, files){

		var tmp_url = '{!! asset('/tmp/') !!}';
		console.log(files);
		plupload.each(files, function(file) {
		$('#image').val(file.name);
		$('#previewDiv > img').remove();
		$('#previewDiv').append("<img src='"+"/tmp/"+ file.name+"' id='preview' height='100px' width='100px'/>");
		});
		jQuery('.loader').fadeToggle('medium');
		},

		// Error: function(up, err) {
		// document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
		// }
		}
		});
		uploader.init();
		$(document).on('click','#updateuserprofile',function(e){
			e.preventDefault();
			var image=$('#profilephoto').val();
			$.ajax({
				type:'post',
				data:{profile:image,
					"_token": "{{ csrf_token() }}",
				 },
				url:"{!! route('userprofileupload') !!}",
				success:function(data){
						var profile=data.profile;
						console.log(profile);
						$('#close').click();
						$('#message').append('<div class="alert alert-success">Profile updated successfully.!!!</div>');
						$('.avatar-photo').attr('src','/uploads/photo/'+profile);
				},
				error:function(data) {
					console.log(data);
				}
			});
		});

		var uploader1 = new plupload.Uploader({
		  browse_button: 'attach', // this can be an id of a DOM element or the DOM element itself
		  url: "{!! asset('plupload/upload.php') !!}",
		flash_swf_url : '../js/Moxie.swf',
		silverlight_xap_url : '../js/Moxie.xap',
		});
		 uploader1.init();

		uploader1.bind('FilesAdded', function(up, files) {
			var html = '';
			plupload.each(files, function(file) {
				html += '<li id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></li>';
			});
			document.getElementById('attachlist').innerHTML += html;
		});

		uploader1.bind('UploadProgress', function(up, file) {
			document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
		});

		uploader1.bind('Error', function(up, err) {
			document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
		});

		document.getElementById('attach-upload').onclick = function() {
			uploader1.start();
		};
		uploader1.bind('FileUploaded', function(up, file, info) {
		  	// var filename=file.name;
		  	alert(file.name);
		  	console.log(document.getElementById('file'));
		  	document.getElementById('attachment').value =file.name;
		  });

</script>
@endsection
