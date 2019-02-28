{!! Former::open()->id('edit-form') !!}
<input type="hidden" name="id" id="id" value="{!! $blogs->id !!}" placeholder="">
{!! Former::select('blog_category_id')->class('form-control')->options($blog_categories)->select($blogs->blog_category_id)->placeholder('select the blog category') !!}
{!! Former::input('name')->class('form-control') !!}
<div id="container form-group-row">
	<label>Photo</label>
	<img src="{!! $blogs->blog_photo_url() !!}" style="height: 150px; width: 150px;" alt="">
	<input type="hidden"  name="photo" id="file" >
	<a id="browse" href="javascript:;">[Browse...]</a>
	<a id="start-upload" href="javascript:;">[Start Upload]</a>
	<ul id="filelist"></ul>
</div>
{!! Former::textarea('description')->class('form-control') !!}
<input type="hidden" name="status" value="0">
<label>Status</label>
<input type="checkbox" class="status" name="status" value="1" {!! $blogs->status ? 'checked' : '' !!} >
<br>
{!! Former::submit('Save')->class('form-group')->id('submit') !!}
<input type="button" class="form-group btn btn-primary" name="cancel" data-dismiss="modal" aria-hidden="true" id="cancel" value="cancel">
{!! Former::close() !!}	
