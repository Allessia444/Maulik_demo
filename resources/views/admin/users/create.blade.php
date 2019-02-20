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
							<li class="breadcrumb-item"><a href="{!! route('users.index') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('users.index') !!}">Users</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add User</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			{!! Former::open()->route('users.store') !!}
			@csrf
			{!! Former::input('first_name')->class('form-control') !!}
			{!! Former::input('last_name')->class('form-control') !!}
			{!! Former::input('email')->class('form-control') !!}
			{!! Former::input('phone')->class('form-control') !!}
			{!! Former::password('password')->class('form-control') !!}
			<div id="container form-group-row">
				<input type="hidden"  name="photo" id="file">
				<a id="browse" href="javascript:;">[Browse...]</a>
				<a id="start-upload" href="javascript:;">[Start Upload]</a>
				<ul id="filelist"></ul>
			</div>
			{!! Former::input('mobile')->class('form-control') !!}
			<div class="form-group row">
				<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
				<div class="col-sm-12 col-md-10">
					<input type="radio" name="gender" checked value="male">Male
					<input type="radio" name="gender" value="female">Female
				</div>
			</div>
			{!! Former::select('marrital_status')->options(['single'=>'single','married'=>'married'])->select('single') !!}
			{!! Former::select('designations')->options($designations) !!}
			{!! Former::select('departments')->options($departments) !!}
			{!! Former::input('team_lead')->class('form-control')!!}
			{!! Former::textarea('address1')->class('form-control') !!}
			{!! Former::textarea('address2')->class('form-control') !!}
			{!! Former::input('city')->class('form-control') !!}
			{!! Former::input('state')->class('form-control') !!}
			{!! Former::input('country')->class('form-control') !!}
			{!! Former::input('zipcode')->class('form-control') !!}
			{!! Former::date('dob')->class('form-control') !!}
			{!! Former::input('pan_number')->class('form-control') !!}
			{!! Former::input('management_level')->class('form-control') !!}
			{!! Former::date('join_date')->class('form-control') !!}
			<div id="container form-group-row">
				<label>Attachment</label>
				<input type="hidden"  name="attach" id="attachment">
				<a id="attach" href="javascript:;">[Browse...]</a>
				<a id="attach-upload" href="javascript:;">[Start Upload]</a>
				<ul id="attachlist"></ul>
			</div>
			{!! Former::input('google')->class('form-control') !!}
			{!! Former::input('facebook')->class('form-control') !!}
			{!! Former::input('website')->class('form-control') !!}
			{!! Former::input('skype')->class('form-control') !!}
			{!! Former::input('linkedin')->class('form-control') !!}
			{!! Former::input('twitter')->class('form-control') !!}
			{!! Former::hidden('role')->value('user') !!}
			{!! Former::submit('Save')->class('form-group') !!}
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

//for attachment upload
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