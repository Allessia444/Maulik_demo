@extends('common.master')
@section('title','Blogs')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Blogs</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('blogs.index') !!}">Home</a></li>
							<li class="breadcrumb-item"><a href="{!! route('blogs.index') !!}">Blogs</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add Blogs Form</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('blogs.index') !!}" role="button" >
							Back
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			{!! Former::open()->route('blogs.store') !!}
			@csrf
			{!! Former::select('blog_category_id')->class('form-control')->options($blog_categories)->placeholder('Select one option...') !!}
			{!! Former::input('name')->class('form-control') !!}
			<div id="container form-group-row">
				<label>Photo</label>
				<input type="hidden"  name="photo" id="file">
				<a id="browse" href="javascript:;">[Browse...]</a>
				<a id="start-upload" href="javascript:;">[Start Upload]</a>
				<ul id="filelist"></ul>
			</div>
			{!! Former::textarea('description')->class('form-control') !!}
			<input type="hidden" name="status" value="0">
			<label>Status</label>
			<input type="checkbox" name="status" value="1">
			<br>
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