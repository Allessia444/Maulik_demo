@extends('admin.shared.layout')
@section('title','Blogs')
@section('css')
<style type="text/css">
	.modal-dialog {
    max-width: 80%;
    margin: 1.75rem auto;
	}
	.login-box {
    	max-width: 80%;
    	width: 100%;
    	margin: 5px auto;
	}
</style>
@endsection
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="col-md-6 col-sm-12 text-right">
			<div class="dropdown">
				<a class="btn btn-primary " href="{!! route('blogs.create') !!}" role="button" >
					Add Blogs
				</a>
			</div>
		</div>
		<div class="container pd-0">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="title">
							<h4>Blogs</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Blogs</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="contact-directory-list">
				<ul class="row" id="blog-data">
					
				</ul>
			</div>
			<div class="modal fade " id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered  ">
					<div class="modal-content">
						<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5 ">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h2 class="text-center mb-30">Edit Blog</h2>
							<div id="edit">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection('page')
@section('script')
<script src="{!! asset('unisharp/laravel-ckeditor/ckeditor.js') !!}"></script>
<script src="{!! asset('unisharp/laravel-ckeditor/adapters/jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/plupload.full.min.js') !!}"></script>
<script type="text/javascript">
	$(document).on('click','#browse',function(e){
		e.preventDefault();
		photo_upload();
	});
	function editor(){
		$('textarea').ckeditor();
	}
	function blogs(){
		$.get("{!! route('blogs-user') !!}",function(data){
			$('#blog-data').html('');
			$('#blog-data').append(data);
		});
	}
	function photo_upload(){
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
				$(document).on('click','#start-upload',function(){
					uploader.start();
				});
				// document.getElementById('start-upload').onclick = function() {
					
				// };
				uploader.bind('FileUploaded', function(up, file, info) {
		  	// var filename=file.name;
		  	alert(file.name);
		  	console.log(document.getElementById('file'));
		  	document.getElementById('file').value =file.name;
		});
	}
	
	$(document).ready(function(){
		blogs();
		$(document).on("click",'.edit',function(e){
			e.preventDefault();
			var blog_id=$(this).data('id');
			$.get("{!! route('edit-blog') !!}",{blog_id},function(data){
				$('#edit').html('');
				$('#edit').append(data);
				editor();
			});
			$('#edit-modal').modal('show');
			
		});
		
	});

	$(document).on('click','#submit',function(e){
		e.preventDefault();
			var data=$('#edit-form').serialize();
			$.post("{!! route('update-blog') !!}",data,function(response){
				// console.log(response);
			})
			.done(function() {
			    alert( "success" );
			    $('#edit-modal').modal('hide');
			    blogs();
			  })
			.fail(function(data) {
				var errors = $.parseJSON(data.responseText);
				jQuery.each(errors, function(key, value){
				$("input[name*="+ key+"]").parent('div').find('p').length ? $("input[name*="+ key+"]").parent('div').find('p').html().replace(value) :  $("input[name*="+ key+"]").parent('div').append("<p>"+ value +"</p>"); 
				});
			});
	});
</script>
@endsection
