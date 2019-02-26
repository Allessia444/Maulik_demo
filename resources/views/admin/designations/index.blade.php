@extends('admin.shared.layout')
@section('title','Designations')
@section('page')

<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Designations</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('designations.index') !!}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Designations</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary " href="{!! route('designations.create') !!}" role="button" >
							Add Designation
						</a>
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
							<th>Name</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($designations as $designation)
						<tr>
							<td class="table-plus">{!! $designation->id !!}</td>
							<td>{!! $designation->name !!}</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="fa fa-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="{!! route('designations.show',['id'=>$designation->id]) !!}" title="">Show</a>
										<a class="dropdown-item" href="{!! route('designations.edit',['id'=>$designation->id]) !!}" title="">Edit</a>
										<form action="{{route('designations.destroy',[$designation->id])}}" method="POST">
											@method('DELETE')
											@csrf
											<button class="dropdown-item" type="submit">Delete</button>               
										</form>
										<!-- <a href="{!!route('designations.destroy',['id'=>$designation->id])!!}" data-toggle="tooltip" title="delete" class="btn btn-sm btn-danger" data-confirm="Are you sure want to delete?"><i class="fa fa-trash"></i></a> -->
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
@endsection
@section('script')
<!-- <script type="text/javascript">
jQuery(function(){
	jQuery("[data-confirm]").bind("click",function(e){        
		e.preventDefault();    
		var message = jQuery(this).data('confirm')? jQuery(this).data('confirm') : 'Are you sure?';    
		if(confirm(message))    
			{        
				var form = jQuery('<form />').attr('method','post').attr('action',jQuery(this).attr('href'));      
				message != "Are you sure want to logout?" ? jQuery('<input />').attr('type','hidden').attr('name','_method').attr('value','delete').appendTo(form) : "";      
				jQuery('<input />').attr('type','hidden').attr('name','_token').attr('value',jQuery('meta[name="_token"]').attr('content')).appendTo(form);      
				// jQuery('body').append(form);      
				form.submit();    
			}  
		});
});
</script> -->
@endsection