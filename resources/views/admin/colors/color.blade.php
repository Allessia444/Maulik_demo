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
			<div class="clearfix">
				<div class="pull-left">
					<h4 class="text-blue">Default Basic Forms</h4>
					<p class="mb-30 font-14">All bootstrap element classies</p>
				</div>
			</div>
			<div id="foo">
				<div id="me">Please give me some orange colour.</div>
				<div class="section-div">Please give me some orange colour.</div>
				<ul>
					<li>Please give me some orange colour.</li>
					<li></li>
					<li></li>
					<li>Please give me some orange colour.</li>
					<li></li>
					<li>Please give me some orange colour.</li>
				</ul>
				<section>
					<p>Treacherous HTML ahead!</p>
					<div id="section-div">
						----- Please give me some orange colour. -----
					</div>
					<div></div>
					<div>----- Please give me some orange colour.</div> -----
				</section>
				<section>
					<p>Can you make this span orange too? <span>----- Please give me some orange -----colour.</span></p>
					<p>But not <span>this one!</span></p>
					<div></div>
					<p>Yes, I know, HTML can be mean sometimes. But it is not on purpose! 
						<span>Or is <i>it?</i> <i>----- Please give me some orange colour.</i></span></p> -----
						<div><div>----- Please give me some orange colour.</div></div> -----
					</section>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function(){
	$("#foo:contains('orange')").css('color','orange');
            // var text = 'orange' ;
            // var  context = $("#foo").html();
            // $("#foo").html(context.replace(text,'<span style="color:orange;">'+text+'</span>'));
            // $("#foo:contains('orange')").each(function () {
            //     $(this).html($(this).html().replace("orange", '<span style="color:orange">orange</span>'));
            // });
     });
</script>
@endsection