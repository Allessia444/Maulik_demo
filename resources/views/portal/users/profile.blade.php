@extends('common.master')
@section('title','User')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>User </h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('home') !!}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">User Profile</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			{!! Former::open()->method('PATCH')->action(route('updateprofile',$user->id)) !!} 
			<div class="form-group">
			</div>
			{!! Former::input('first_name')->class('form-control') !!}
			{!! Former::input('last_name')->class('form-control') !!}
			{!! Former::input('email')->class('form-control') !!}
			{!! Former::input('phone')->class('form-control') !!}
			<div id="container form-group-row">
				<label>Photo</label>
				<img src="{!! asset('/profile/'.$user_profile->photo) !!}" style="height: 50px; width: 50px;" alt="">	<input type="hidden"  name="photo" id="file">
				<a id="browse" href="javascript:;">[Browse...]</a>
				<a id="start-upload" href="javascript:;">[Start Upload]</a>
				<ul id="filelist"></ul>
			</div>
			{!! Former::input('mobile')->class('form-control')->value($user_profile->mobile) !!}
			<div class="form-group row">
				<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
				<div class="col-sm-12 col-md-10">
					<input type="radio" name="gender" checked value="male">Male
					<input type="radio" name="gender" value="female">Female
				</div>
			</div>
			{!! Former::select('marrital_status')->options(['single'=>'single','married'=>'married'])->select($user_profile->marrital_status) !!}
			{!! Former::textarea('address1')->class('form-control')->value($user_profile->address1)->populate() !!}
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
	</div>
</div>
@endsection
@section('script')

<script type="text/javascript" src="{!! asset('js/plupload.full.min.js') !!}"></script>
<script type="text/javascript">
	var uploader = new plupload.Uploader({
  browse_button: 'browse', // this can be an id of a DOM element or the DOM element itself
  url: "{!! asset('plupload/upload.php') !!}",
flash_swf_url : '../js/Moxie.swf',
silverlight_xap_url : '../js/Moxie.xap',
});
	 uploader.init();

	uploader.bind('FilesAdded', function(up, files) {
		var html = '';
		plupload.each(files, function(file) {
			html += '<li id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></li>';
		});
		document.getElementById('filelist').innerHTML += html;
	});

	uploader.bind('UploadProgress', function(up, file) {
		document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
	});

	uploader.bind('Error', function(up, err) {
		document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
	});

	document.getElementById('start-upload').onclick = function() {
		uploader.start();
	};
	uploader.bind('FileUploaded', function(up, file, info) {
  	// var filename=file.name;
  	alert(file.name);
  	console.log(document.getElementById('file'));
  	document.getElementById('file').value =file.name;
  });

// for attachment upload
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