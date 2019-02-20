@extends('common.master')
@section('title','Clients')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Clients </h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('clients.index') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('clients.index') !!}">Clients</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add Client</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('clients.index') !!}" role="button" >
							Back
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			{!! Former::open()->route('clients.store') !!}
			@csrf
			{!! Former::select('industry_id')->class('form-control')->options($industrys) !!}
			{!! Former::input('name')->class('form-control') !!}
			<div id="container form-group-row">
				<label>Logo</label>
				<input type="hidden"  name="logo" id="file">
				<a id="browse" href="javascript:;">[Browse...]</a>
				<a id="start-upload" href="javascript:;">[Start Upload]</a>
				<ul id="filelist"></ul>
			</div>
			{!! Former::input('email')->class('form-control') !!}
			{!! Former::input('website')->class('form-control') !!}
			{!! Former::input('phone')->class('form-control') !!}
			{!! Former::input('fax')->class('form-control') !!}
			{!! Former::textarea('address1')->class('form-control') !!}
			{!! Former::textarea('address2')->class('form-control') !!}
			{!! Former::input('city')->class('form-control') !!}
			{!! Former::input('state')->class('form-control') !!}
			{!! Former::input('country')->class('form-control') !!}
			{!! Former::input('zipcode')->class('form-control') !!}
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
</script>
@endsection