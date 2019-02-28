@extends('admin.shared.layout')
@section('title')
Users
@endsection
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Users</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('users.index') !!}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Users</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<div class="btn-list row pull-right">
							<a class="btn btn-primary " href="{!! route('users.create') !!}" role="button" >
								Add User
							</a>
							<div id="container">
								<input type="hidden"  name="import" id="file">
								<a id="import" href="javascript:;" class="btn btn-primary">Import File</a>
								<ul id="attachlist"></ul>
							</div>
							<a class="btn btn-primary " href="{!! route('users.export') !!}" role="button" >
								Export
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="row">
				<table class="data-table stripe hover nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">Id</th>
							<th>First_Name</th>
							<th>Last_Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Active</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td class="table-plus">{!! $user->id !!}</td>
							<td>{!! $user->first_name !!}</td>
							<td>{!! $user->last_name !!}</td>
							<td>{!! $user->email !!}</td>
							<td>{!! $user->phone !!}</td>
							<td>{!! $user->is_active !!}</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="fa fa-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<!-- <a class="dropdown-item" href="#"><i class="fa fa-eye"></i> View</a> -->
										<a class="dropdown-item" href="{!! route('users.show',['id'=>$user->id]) !!}" title="">show</a>
										<a class="dropdown-item" href="{!! route('users.edit',['id'=>$user->id]) !!}" title="">Edit</a>
										<form action="{{route('users.destroy',[$user->id])}}" method="POST">
											@method('DELETE')
											@csrf
											<button class="dropdown-item" type="submit">Delete</button>               
										</form>

									</div>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>
@endsection('page')
@section('script')
<script type="text/javascript" src="{!! asset('js/plupload.full.min.js') !!}"></script>
<script type="text/javascript">
//for attachment upload
var uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',

browse_button : 'import', // you can pass in id...
container: document.getElementById('container'), // ... or DOM Element itself

url : "{{ asset('plupload/upload.php') }}",

filters : {
	max_file_size : '10mb',
	mime_types: [
	{title : "Image files", extensions : "jpg,gif,png,xlsx"},
	{title : "Zip files", extensions : "zip"}
	]
},

// Flash settings
flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",

// Silverlight settings
silverlight_xap_url : "{{ asset('plupload/Moxie.xap') }}",


init: {
	PostInit: function() {
//document.getElementById('filelist').innerHTML = '';
},

FilesAdded: function(up, files) {

	uploader.start();
},

// UploadProgress: function(up, file) {
// document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
// },
UploadFile: function(up, file){
	var tmp_url = '{!! asset('/tmp/') !!}';

	$('#file').val(file.name);
	console.log(file.name);
	alert(file.name);
	$.ajax({
		url:"{!! route('users.import') !!}",
		type: "POST",
		data : {'file': file.name , 
		"_token": "{!! csrf_token() !!}",
	},
	success:function(response) {
		console.log(response);
	},
	error: function(data) {
		console.log(data);
	}
});


/*$('#preview').val(file.name);
$('#previewDiv >img').remove();
$('#previewDiv').append("<img src='"+tmp_url +"/"+ file.name+"' id='preview' height='100px' width='100px'/>");*/

},
UploadComplete: function(up, files){

	var tmp_url = '{!! asset('/tmp/') !!}';
	plupload.each(files, function(file) {
		$('#image').val(file.name);
		$('#previewDiv > img').remove();
		$('#previewDiv').append("<img src='"+"/tmp/"+ file.name+"' id='preview' height='100px' width='100px'/>");
	});
	jQuery('.loader').fadeToggle('medium');
},

Error: function(up, err) {
	document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
}
}
});

uploader.init();
</script>
@endsection