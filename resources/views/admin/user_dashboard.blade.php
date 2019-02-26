@extends('admin.shared.master')
@section('title','Dashboard')
@section('page')
<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div class="row clearfix progress-box">
		<div class="col-lg-12 col-md-12 col-sm-12 mb-30">
			<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
				<div class="project-info clearfix">
					<div class="project-info-left">
						<div class="icon box-shadow bg-blue text-white">
							<i class="fa fa-briefcase"></i>
						</div>
					</div>
					<div class="project-info-right">
						<span class="no text-blue weight-500 font-24">{!! $user !!}</span>
						<p class="weight-400 font-18">Blogs</p>
					</div>
				</div>
				<div class="project-info-progress">
					<div class="row clearfix">
						<div class="col-sm-6 text-muted weight-500">Blogs</div>
						<div class="col-sm-6 text-right weight-500 font-14 text-muted">{!! $user !!}</div>
					</div>
					<div class="progress" style="height: 10px;">
						<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
