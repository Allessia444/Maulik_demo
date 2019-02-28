@extends('admin.shared.master')
@section('title','Colors')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="min-height-200px">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Color </h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{!! route('home') !!}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Color Form</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<h1>25/02/2019</h1>
			<h1>Give div's all element selected background.</h1>
			<select>
				<option value="orange">Orange</option>
				<option value="pink">Pink</option>
				<option value="blue">Blue</option>
			</select>
			<div>
				<p>Hello</p>
				<p>How are you ?</p>
			</div>
			<div></div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$('select').on('change',function(e){
		e.preventDefault();
		var color=$('select').attr('selected','selected').val();
		$('div p').css('background-color',color);
		console.log($('box-shadow div:last-child').html());
		console.log($('div p:last').parent().next('div').append("<p>"+color+" Background applied.</p>"));
		$('div p:last').css('background-color','white');
		$('div p:last').remove();

		$('div p:last').parent().next('div').append("<p>"+color+" Background applied.</p>")
			setTimeout(function(){
			            $('div p:last').remove();
			            $('div p').css('background-color','white');
			            location.reload();
			            //....and whatever else you need to do
			    }, 3000);

		});
	</script>
	@endsection